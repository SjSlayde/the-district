<?php
session_start();
require_once('header.php');
//function pour gerer les plats

//insert plat
function insert_plat($new_plat,$checkpict){
    
    if($checkpict == 1){
        $stock = 'plat';
        stock_image($new_plat['image'],$stock);
    }

    $stmt = $conn->prepare("INSERT INTO plat (libelle,description,prix,image,id_categorie,active) 
                                        VALUES (:libelle, :description, :prix, :image, :id_categorie, :active);");
        
        $stmt->bindParam(':libelle', $new_plat['libelle']);
        $stmt->bindParam(':description', $new_plat['description']);
        $stmt->bindParam(':prix', $new_plat['prix']);
        $stmt->bindParam(':image', $new_plat['image']);
        $stmt->bindParam(':id_ctaegorie', $new_plat['id_ctaegorie']);
        $stmt->bindParam(':active', $new_plat['active']);
        
        try {

    $stmt->execute();

} catch (PDOException $e) {

    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
}
}

//update plat
function update_plat($upd_plat,$checkpict){
   
    if($checkpict == 1){
        $stock = 'plat';
        stock_image($upd_plat['image'],$stock);
    }

    $stmt = $conn->prepare("UPDATE plat 
                                    SET (libelle = :libelle,description = :description,prix = :prix,image = :image,id_categorie = :id_categorie,active = :active)
                                        WHERE id_plat = :id_plat;");
   
        $stmt->bindParam(':libelle', $upd_plat['libelle']);
        $stmt->bindParam(':description', $upd_plat['description']);
        $stmt->bindParam(':prix', $upd_plat['prix']);
        $stmt->bindParam(':image', $upd_plat['image']);
        $stmt->bindParam(':id_ctaegorie', $upd_plat['id_ctaegorie']);
        $stmt->bindParam(':active', $upd_plat['active']);
       
        try {

    $stmt->execute();

} catch (PDOException $e) {

    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
}
}

//delete plat
function delete_plat($del_plat){
    $stmt = $conn->prepare('DELETE 
    FROM plat
    WHERE id = :id');
    $stmt->bindValue(':id', $del_plat);
    try {

        $stmt->execute();
    
    } catch (PDOException $e) {
    
        echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
    }
}

//function pour gerer les categories

//insert plat
function insert_categorie($new_categorie,$checkpict){
    if($checkpict == 1){
        $stock = 'category';
        stock_image($new_categorie['image'],$stock);
    }

   $stmt = $conn->prepare("INSERT INTO categorie 
                                        SET (libelle = :libelle,image = :image,active = :active)
                                            WHERE id_categorie = :id_categorie;");

        $stmt->bindParam(':libelle', $new_categorie['libelle']);
        $stmt->bindParam(':image', $new_categorie['image']);
        $stmt->bindParam(':active', $new_categorie['active']);
        
        try {

    $stmt->execute();

} catch (PDOException $e) {

    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
}
}

//update categorie
function update_categorie($upd_categorie,$checkpict){
    $stmt = $conn->prepare("UPDATE categorie (libelle = :libelle,image = :image,active = :active) 
                                    VALUES (:libelle, :image, :active)
                                        WHERE id_categorie = :id_categorie;");

        if($checkpict == 1){
            $stock = 'category';
            stock_image($upd_categorie['image'],$stock);
        }
    
        $stmt->bindParam(':libelle', $upd_categorie['libelle']);
        $stmt->bindParam(':image', $upd_categorie['image']);
        $stmt->bindParam(':active', $upd_categorie['active']);
        
        try {

    $stmt->execute();

} catch (PDOException $e) {

    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
}
}

//delete categorie
function delete_categorie(){

}

//function pour gerer l'image
function stock_image($IMAGE,$direction){
    $file = $IMAGE;
    $tmp_name = $file['tmp_name'];
    $name = $file['name'];
    $type = $file['type'];
    $size = $file['size'];

    // Vérification du type de fichier et de la taille

    if ($type != 'image/jpeg' && $type != 'image/png') {
        echo 'Erreur : seul les fichiers JPEG et PNG sont autorisés.';
        exit;
    }

    if ($size > 1024 * 1024) { // 1Mo
        echo 'Erreur : le fichier est trop volumineux.';
        exit;
    }


    // Définition du chemin de destination sécurisé
   
    $cheminimage = uniqid() . '_' . $name;
   
    if($direction=='food') {
        $destination = '../img/food/' . $cheminimage;
    } elseif($direction=='categorie') {
        $destination = '../img/category/' . $cheminimage;
    } else {
        $destination = '../img/erreur/' . $cheminimage;
    }


    // Déplacement du fichier uploadé

    if (move_uploaded_file($tmp_name, $destination)) {

        echo 'Fichier uploadé avec succès !';
        $IMAGE = $cheminimage;
        return $cheminimage;

    } else {

        echo 'Erreur lors de l\'upload du fichier.';

        return FALSE;

    }
}

//select
//Select category
function select_category(){
    $stmt = $conn->prepare("SELECT * FROM categorie");

    try {

        $stmt->execute();
    
    } catch (PDOException $e) {
    
        echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
    }
};


//Select plat en fonction de la category souhaiter
function select_plat($sel_cat){
    
    $stmt = $conn->prepare("SELECT * FROM plat LEFT JOIN category ON plat.id.category=category.id.category where lebelle = :libelle");
    $stmt->bindParam(':libelle', $sel_cat);
    
    try {

        $stmt->execute();
    
    } catch (PDOException $e) {
    
        echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
    }
}
?>