<?php 

class requete
{
    // Propriétés de la classe pour la connexion et les requêtes
    protected $_conn;
    private $_selectall;
    private $_select;

    //set la connection avec la base de donnees
    public function setConnection($servername,$dbname,$username,$password){
        try {
            // Création de la connexion PDO
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // configurer le mode d'erreur PDO pour générer des exceptions
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_conn = $conn;
        } catch(PDOException $e) {
            // Afficher l'erreur en cas de problème de connexion
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
        }
    }

    // Méthodes set
   // Méthode pour sélectionner toutes les lignes d'une table sans condition
    public function setSelectall($table){
        // Préparation de la requête en fonction de la table spécifiée
        if($table == 'plat'){
        $this->_select = $this->_conn->prepare("SELECT * FROM plat WHERE active = 'Yes';");
        } elseif ($table == 'categorie') {
            $this->_select = $this->_conn->prepare("SELECT * FROM categorie WHERE active = 'Yes';");
        } elseif ($table == 'commande')  {
            $this->_select = $this->_conn->prepare("SELECT * FROM commande;");
        } else {
             // Message d'erreur si la table n'est pas trouvée
            echo 'table introuvable';
        }
        }

        //function pour la barre de recherche(merci chatgpt pour la requete pdo avec un nombre d'id indeterminer);
        public function setRecherche($ids){
            //creer un tableaux avec des '?' et les separe pas des ',' en fonction de la taille du tableaux ids
            $placeholders = implode(',', array_fill(0, count($ids), '?'));

            
            //creer un requete avec le nombre de '?' que contient le tableaux $placeholders
            $sql = "SELECT plat.libelle AS platnom, plat.image, plat.description, plat.id, plat.prix FROM plat WHERE id IN ($placeholders)";
            
            //prepare la requete sql;
            $this->_select = $this->_conn->prepare($sql);

            //Lier les paramètres pour chaque ID
            foreach ($ids as $index => $id) {
                // Remplacer les '?' par les valeurs du tableau $ids, en commençant par 1 (PDO est 1-based)
                $this->_select->bindValue($index + 1, $id, PDO::PARAM_INT);
            }}

        //Méthode pour sélectionner une ligne d'une table avec une condition sur l'ID
        public function setSelectone($table,$id){
            // Préparation de la requête en fonction de la table spécifiée
            if($table == 'plat'){

            $this->_select = $this->_conn->prepare("SELECT * FROM plat WHERE id = :id;");
            
            } elseif ($table == 'categorie') {
            
                $this->_select = $this->_conn->prepare("SELECT * FROM categorie WHERE id = :id;");
            
            } elseif ($table == 'commande')  {
            
                $this->_select = $this->_conn->prepare("SELECT * FROM commande WHERE id = :id;");
            
            } else {
                // Message d'erreur si la table n'est pas trouvée
                echo 'table introuvable';
            
            }
            // Lier le paramètre :id à la valeur de l'ID
            $this->_select->bindParam(':id' , $id);
            }


        // Méthode pour sélectionner des lignes d'une table avec des conditions spécifiques
        public function setSelectcondition($table,$condition){
            // Préparation de la requête en fonction de la table et de la condition spécifiées
            if($table == 'plat' && $condition == 'plusvendue'){
                $this->_select = $this->_conn->prepare("SELECT p.id,p.id_categorie,c.id_plat,SUM(quantite) as quantite_vendue,SUM(quantite)*prix as rentabilite,p.libelle,p.description,p.prix,p.image 
                                                    FROM commande c LEFT JOIN plat p ON c.id_plat =p.id 
                                                        WHERE c.etat != 'Annulée'  GROUP BY c.id_plat 
                                                            ORDER BY rentabilite DESC;");

                } elseif($table == 'plat' && is_int($condition)) {
                    $this->_select = $this->_conn->prepare("SELECT plat.libelle AS platnom, plat.image, plat.description, categorie.libelle AS catnom ,plat.id ,id_categorie, prix
                                                         FROM plat LEFT JOIN categorie on plat.id_categorie = categorie.id
                                                             WHERE id_categorie = :id
                                                                 ORDER BY categorie.libelle DESC");

                    // Lier le paramètre :id à la valeur de la condition
                    $this->_select->bindParam(':id' , $condition);

                } elseif ($table == 'plat' && $condition == 'toutlesplat') {
                    $this->_select = $this->_conn->prepare("SELECT plat.libelle AS platnom, plat.prix, plat.image, plat.description, categorie.libelle AS catnom ,plat.id
                                                FROM plat LEFT JOIN categorie on plat.id_categorie = categorie.id
                                                    ORDER BY categorie.libelle DESC");
                } else {
                    // Message d'erreur si la table ou la condition n'est pas trouvée
                    echo 'table introuvable';
                }
        }

    public function setSelectcommandeclient($email){
            $this->_select = $this->_conn->prepare("SELECT * FROM commande 
                                                        LEFT JOIN plat on commande.id_plat = plat.id
                                                            WHERE email_client = :email 
                                                                ORDER BY date_commande DESC");

            $this->_select->bindParam(':email' , $email);
    }


    // Méthode pour exécuter la requête et récupérer les résultats
    public function getSelectall($allforone) {
    
        // Récupérer les résultats en fonction du mode (tous les résultats ou un seul) j'aurais pus le faire dans le try chose qui m'aurait fait gagner de la place
        if ($allforone == 'all'){
            try {
                
                $this->_select->execute();
                $this->_selectall = $this->_select->fetchAll();
                // Fermer le curseur
                $this->_select->closeCursor();
                
            } catch (PDOException $e) {
                
                // Afficher l'erreur en cas de problème d'exécution de la requête
                echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
    
            };
        } else {
            try {
                
                $this->_select->execute();
                $this->_selectall = $this->_select->fetch();
                // Fermer le curseur
                $this->_select->closeCursor();
                
            } catch (PDOException $e) {
                
                // Afficher l'erreur en cas de problème d'exécution de la requête
                echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
    
            };
        }

        // Retourner les résultats de la requête
        return $this->_selectall;

    }

    public function nettoyerChaine($string) {
        //filtre pour les caractere speciaux merci blackboxAI
        $filtrecaracteresSpeciaux = ["\x00","\n","\r","\\","'","\"","\x1a","\t","\f","\r\n","?","!",".",",",
                                    ":",";","-","_","=","+","*","/","\\","^","$","#","%","&","|","~","`","´",
                                    "^","¨","¸","˛","ˇ","˘","¯","¨","°","²","³","⁴","⁵","⁶","⁷","⁸","⁹","¹⁰","(",")","[","]","{","}","¿","¡"];

        //tableau avec tout les accents associer a leur lettre sans accent
        $lettresAccentuees = [
          'a' => ['à', 'á', 'â', 'ä', 'ã', 'å', 'ā'],
          'e' => ['è', 'é', 'ê', 'ë', 'ē'],
          'i' => ['ì', 'í', 'î', 'ï', 'ī'],
          'o' => ['ò', 'ó', 'ô', 'ö', 'õ', 'ō'],
          'u' => ['ù', 'ú', 'û', 'ü', 'ũ', 'ū'],
          'c' => ['ç'],
          'n' => ['ñ'],
          'y' => ['ý', 'ÿ'],
          'A' => ['À', 'Á', 'Â', 'Ä', 'Ã', 'Å', 'Ā'],
          'E' => ['È', 'É', 'Ê', 'Ë', 'Ē'],
          'I' => ['Ì', 'Í', 'Î', 'Ï', 'Ī'],
          'O' => ['Ò', 'Ó', 'Ô', 'Ö', 'Õ', 'Ō'],
          'U' => ['Ù', 'Ú', 'Û', 'Ü', 'Ũ', 'Ū'],
          'C' => ['Ç'],
          'N' => ['Ñ'],
          'Y' => ['Ý', 'Ÿ']
      ];

      //remplace tout les accents par la lettre sans accent
      foreach($lettresAccentuees as $lettre => $value){
        foreach($value as $accent){
            $string = str_replace($accent,$lettre,$string);
            }     
        }
        
        //remplace tout les caractere speciaux par un espace
        $string = str_replace($filtrecaracteresSpeciaux, ' ', $string);
        return $string;
        }
}

//class enfant pour ajouter dans la table commande
class Ajoutcommande extends requete
{   
    // Propriétés de la classe pour les détails de la commande
    private $_id_plat;
    private $_quantite;
    private $_total;
    private $_etat;
    private $_nom_client;
    private $_telephone_client;
    private $_email_client;
    private $_adresse_client;

    // Constructeur pour initialiser les propriétés de la commande
    public function __construct ($id_plat,$quantite,$total,$etat,$nom_client,$telephone_client,$email_client,$adresse_client) {

        $this->_id_plat = $id_plat;
        $this->_quantite = $quantite;
        $this->_total = $total;
        $this->_etat = $etat;
        $this->_nom_client = $nom_client;
        $this->_telephone_client = $telephone_client;
        $this->_email_client = $email_client;
        $this->_adresse_client = $adresse_client;
    }

    // Méthode pour ajouter une commande dans la base de données
    public function setAjout(){

        // Préparation de la requête d'insertion
        $stmt = $this->_conn->prepare("INSERT INTO commande ( id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client) 
                                         VALUES (:id_plat, :quantite, :total, NOW(), :etat, :nom_client, :telephone_client, :email_client, :adresse_client); ");
        
        // Lier les paramètres aux valeurs nettoyées
        $stmt->bindParam(':id_plat', parent::nettoyerChaine($this->_id_plat));
        $stmt->bindParam(':quantite', parent::nettoyerChaine($this->_quantite));
        $stmt->bindParam(':total', parent::nettoyerChaine($this->_total));
        $stmt->bindParam(':etat',parent::nettoyerChaine($this->_etat)); 
        $stmt->bindParam(':nom_client', parent::nettoyerChaine($this->_nom_client)); 
        $stmt->bindParam(':telephone_client', parent::nettoyerChaine($this->_telephone_client)); 
        $stmt->bindParam(':email_client', $this->_email_client);
        $stmt->bindParam(':adresse_client', parent::nettoyerChaine($this->_adresse_client)); 

        try {
                
            // Exécuter la requête d'insertion
            $stmt->execute();

             // Fermer le curseur
            $stmt->closeCursor();
            
        } catch (PDOException $e) {

            // Afficher l'erreur en cas de problème d'exécution de la requête
            echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();

        };
    }
}

// Définir la classe Ajoututilisateur qui étend la classe requete
class Ajoututilisateur extends requete{
    // Propriétés de la classe pour les détails de l'utilisateur
    private $_nom_prenom;
    private $_email;
    private $_password;
    
    // Constructeur pour initialiser les propriétés de la commande
    public function __construct ($nom_prenom,$email,$password) {
        
        $this->_nom_prenom = $nom_prenom;
        $this->_email = $email;
        $this->_password = $password;
    }

    // Méthode pour ajouter un utilisateur à la base de données
    public function setAjoutuser(){
        $stmt = $this->_conn->prepare("SELECT * FROM utilisateur WHERE email = :email;");
        $stmt -> bindParam(':email',$this->_email);
        try {
                
            // Exécuter la requête d'insertion
            $stmt->execute();
            $checkexist = $stmt->fetch();
            var_dump($checkexist);

             // Fermer le curseur
            $stmt->closeCursor();
            
        } catch (PDOException $e) {

            // Afficher l'erreur en cas de problème d'exécution de la requête
            echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
            return false;
        };
        if($checkexist == false){
            // Préparation de la requête d'insertion
            $stmt = $this->_conn->prepare("INSERT INTO utilisateur (nom_prenom, email ,password) 
                                                VALUES (:nom_prenom, :email, :password);");
            
            // Lier les paramètres aux valeurs nettoyées
            $stmt->bindParam(':nom_prenom', parent::nettoyerChaine($this->_nom_prenom));
            $stmt->bindParam(':email', $this->_email);
            $stmt->bindParam(':password', $this->setHashage($this->_password)); 
    
            try {
                    
                // Exécuter la requête d'insertion
                $stmt->execute();
    
                 // Fermer le curseur
                $stmt->closeCursor();
                
            } catch (PDOException $e) {
    
                // Afficher l'erreur en cas de problème d'exécution de la requête
                echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
    
            };
    
            return $this->_user;
        }
    }

    // Méthode pour hacher le mot de passe
    public function setHashage($password){
        $passwordhashbrown = password_hash($password, PASSWORD_DEFAULT);
        return $passwordhashbrown;
    }
}

class verifyutilisateur extends requete{
    // Propriétés de la classe pour les détails de l'utilisateur
    private $_nom_prenom;
    private $_email;
    private $_password;
    private $_passwordverify;
    private $_user;

    //Methode pdo pour recuperer les infos user
    public function setUser($email){
        $stmt = $this->_conn->prepare("SELECT * FROM utilisateur WHERE email = :email;");
        $stmt -> bindParam(':email',$email);
        
        try {
                
            // Exécuter la requête d'insertion
            $stmt->execute();
            $this->_user = $stmt->fetch();

             // Fermer le curseur
            $stmt->closeCursor();
            
        } catch (PDOException $e) {

            // Afficher l'erreur en cas de problème d'exécution de la requête
            echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();

        };
    }

    //Methode pour verifier si le mode passe entrer est correcte
    public function setPasswordverify($password){
        $this->_passwordverify = password_verify($password, $this->_user['password']);
        return $this->_passwordverify;
    }

    //setting des proprieté
    public function setNom_prenom(){
        $this->_nom_prenom = $this->_user['nom_prenom'];
        }

    public function setEmail(){
        $this->_email = $this->_user['email'];
        }

    public function setPassword(){
        $this->_password = $this->_user['password'];
        }

    //get des proprieté
    public function getNom_prenom(){
        return $this->_nom_prenom;
        }

    public function getEmail(){
        return $this->_email;
        }

    public function getPassword(){
        return $this->_password;
        }

    public function getUser(){
            return $this->_user;
        }
}

//exemple pour creer un requete
 
//creer l'object requete:
//     $p = new requete();


//set la connection avec la base de donnée:
//     $p->setConnection($servername,$dbname,$username,$password);

//Selectionne la requete souhaiter:
//     $p->setSelectall('categorie');

//resort le resultat de la requete dans la variable $req:
//    $req = $p->getSelectall('all');
?>