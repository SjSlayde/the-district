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
    public function setSelectall($table){
        $stmt = $this->_conn->prepare("SELECT * FROM :tab;");
        $stmt->bindValue(':tab', $table);
        try {
                
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->_selectall = $result;
            
        } catch (PDOException $e) {
            
            echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
        };
        }


    // Méthodes get
    public function getSelectall() {

        return $this->_selectall;

    }

    }
?>