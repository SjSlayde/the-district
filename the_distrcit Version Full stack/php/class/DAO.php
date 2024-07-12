<?php 

class requete
{
    // Propriétés de la classe
    private $_selectall;
    private $_conn;
    private $_select;

    //set la connection avec la base de donnees
    public function setConnection($servername,$dbname,$username,$password){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // configurer le mode d'erreur PDO pour générer des exceptions
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_conn = $conn;
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
        }
    }

    // Méthodes set
    //Select sans condition 
    public function setSelectall($table){
        if($table == 'plat'){
        $this->_select = $this->_conn->prepare("SELECT * FROM plat WHERE active = 'Yes';");
        } elseif ($table == 'categorie') {
            $this->_select = $this->_conn->prepare("SELECT * FROM categorie WHERE active = 'Yes';;");
        } elseif ($table == 'commande')  {
            $this->_select = $this->_conn->prepare("SELECT * FROM commande;");
        } else {
            echo 'table introuvable';
        }
        }

        //Select avec condition pour une seule recurrence
        public function setSelectone($table,$id){
            if($table == 'plat'){

            $this->_select = $this->_conn->prepare("SELECT * FROM plat WHERE id = :id;");
            
            } elseif ($table == 'categorie') {
            
                $this->_select = $this->_conn->prepare("SELECT * FROM categorie WHERE id = :id;");
            
            } elseif ($table == 'commande')  {
            
                $this->_select = $this->_conn->prepare("SELECT * FROM commande WHERE id = :id;");
            
            } else {

                echo 'table introuvable';
            
            }

            $this->_select->bindParam(':id' , $id);
            }


            //Select avec condition 
        public function setSelectcondition($table,$condition){
            if($table == 'plat' && $condition == 'plusvendue'){
                $this->_select = $this->_conn->prepare("SELECT p.id,p.id_categorie,c.id_plat,SUM(quantite) as quantite_vendue,SUM(quantite)*prix as rentabilite,p.libelle,p.description,p.prix,p.image 
                                                    FROM commande c LEFT JOIN plat p ON c.id_plat =p.id 
                                                        WHERE c.etat != 'Annulée'  GROUP BY c.id_plat 
                                                            ORDER BY rentabilite DESC;");

                } elseif($table == 'plat' && is_int($condition)) {
                    echo'hello';
                    $this->_select = $this->_conn->prepare("SELECT plat.libelle AS platnom, plat.image, plat.description, categorie.libelle AS catnom ,plat.id ,id_categorie
                                                         FROM plat LEFT JOIN categorie on plat.id_categorie = categorie.id
                                                             WHERE id_categorie = :id
                                                                 ORDER BY categorie.libelle DESC");
                    $this->_select->bindParam(':id' , $condition);

                } elseif ($table == 'plat' && $condition == 'toutlesplat') {
                    $this->_select = $this->_conn->prepare("SELECT plat.libelle AS platnom, plat.image, plat.description, categorie.libelle AS catnom ,plat.id
                                                FROM plat LEFT JOIN categorie on plat.id_categorie = categorie.id
                                                    ORDER BY categorie.libelle DESC");
                } else {
                    echo 'table introuvable';
                }
        }


    // Méthodes get
    public function getSelectall($allforone) {
        if ($allforone == 'all'){
            try {
                
                $this->_select->execute();
                $this->_selectall = $this->_select->fetchAll();
                $this->_select->closeCursor();
                
            } catch (PDOException $e) {
                
                echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
    
            };
        } else {
            try {
                
                $this->_select->execute();
                $this->_selectall = $this->_select->fetch();
                $this->_select->closeCursor();
                
            } catch (PDOException $e) {
                
                echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
    
            };
        }

        return $this->_selectall;

    }}

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