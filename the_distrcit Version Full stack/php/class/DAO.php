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
            $this->_select = $this->_conn->prepare("SELECT * FROM categorie WHERE active = 'Yes';;");
        } elseif ($table == 'commande')  {
            $this->_select = $this->_conn->prepare("SELECT * FROM commande;");
        } else {
             // Message d'erreur si la table n'est pas trouvée
            echo 'table introuvable';
        }
        }

        // Méthode pour sélectionner une ligne d'une table avec une condition sur l'ID
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
                    $this->_select = $this->_conn->prepare("SELECT plat.libelle AS platnom, plat.image, plat.description, categorie.libelle AS catnom ,plat.id ,id_categorie
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

    }}

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

    // Méthode pour ajouter une commande dans la base de données
    public function setAjout(){

        // Préparation de la requête d'insertion
        $stmt = $this->_conn->prepare("INSERT INTO commande ( id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client) 
                                         VALUES (:id_plat, :quantite, :total, NOW(), :etat, :nom_client, :telephone_client, :email_client, :adresse_client); ");
        
        // Lier les paramètres aux valeurs nettoyées
        $stmt->bindParam(':id_plat', $this->nettoyerChaine($this->_id_plat));
        $stmt->bindParam(':quantite', $this->nettoyerChaine($this->_quantite));
        $stmt->bindParam(':total', $this->nettoyerChaine($this->_total));
        $stmt->bindParam(':etat', $this->nettoyerChaine($this->_etat)); 
        $stmt->bindParam(':nom_client', $this->nettoyerChaine($this->_nom_client)); 
        $stmt->bindParam(':telephone_client', $this->nettoyerChaine($this->_telephone_client)); 
        $stmt->bindParam(':email_client', $this->_email_client);
        $stmt->bindParam(':adresse_client', $this->nettoyerChaine($this->_adresse_client)); 

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