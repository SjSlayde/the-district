<?php 

class requete// a faire fonctionner 
{
    // Propriétés de la classe
    private $_selectall;
    private $_conn;


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
        $stmt = $this->_conn->prepare("SELECT * FROM plat WHERE active = 'Yes';");
        } elseif ($table == 'categorie') {
            $stmt = $this->_conn->prepare("SELECT * FROM categorie;");
        } elseif ($table == 'commande')  {
            $stmt = $this->_conn->prepare("SELECT * FROM commande;");
        } else {
            echo 'table introuvable';
        }

        try {
                
            $stmt->execute();
            $this->_selectall = $stmt->fetchAll();
            $stmt->closeCursor();
            
        } catch (PDOException $e) {
            
            echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();

        };
        }

        //Select avec condition 
        public function setSelectallcondition($table,$condition){
            if($table == 'plat'){
            $stmt = $this->_conn->prepare("SELECT * FROM plat WHERE active = 'Yes';");
            } elseif ($table == 'categorie') {
                $stmt = $this->_conn->prepare("SELECT * FROM categorie;");
            } elseif ($table == 'commande')  {
                $stmt = $this->_conn->prepare("SELECT * FROM commande;");
            } else {
                echo 'table introuvable';
            }
    
            try {
                    
                $stmt->execute();
                $this->_selectall = $stmt->fetchAll();
                $stmt->closeCursor();
                
            } catch (PDOException $e) {
                
                echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
    
            };
            }

        public function setSelectcondition($table,$condition){
            if($table == 'plat' && $condition == 'plusvendue'){
                $stmt = $this->_conn->prepare("SELECT p.id,p.id_categorie,c.id_plat,SUM(quantite) as quantite_vendue,SUM(quantite)*prix as rentabilite,p.libelle,p.description,p.prix,p.image FROM commande c LEFT JOIN plat p ON c.id_plat =p.id WHERE c.etat != 'Annulée'  GROUP BY c.id_plat ORDER BY rentabilite DESC;");
                } else {
                    echo 'table introuvable';
                }

                try {
                
                    $stmt->execute();
                    $this->_selectall = $stmt->fetchAll();
                    $stmt->closeCursor();
                    
                } catch (PDOException $e) {
                    
                    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
        
                };
        }


    // Méthodes get
    public function getSelectall() {

        return $this->_selectall;

    }

    // public function setClosecon(){
       
    //     $stmt->closeCursor();
    //     $this->_conn = closeCursor();
    
    // }

    }
?>