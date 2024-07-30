

<?php

require_once('database.php'); // Include the database.php file

class DAO
{
  private $conn;

  public function __construct(PDO $conn)
  {
    $this->conn = $conn;
  }



  public function search($searchQuery)
  {
    var_dump($searchQuery); // Add this line
    $sql = "SELECT * FROM plat WHERE libelle LIKE :searchQuery";
    $stmt = $this->conn->prepare($sql);
    $searchQuery = '%' . $searchQuery . '%'; // add wildcards
    $stmt->bindParam(':searchQuery', $searchQuery);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }
  /*
public function getCategoryById($id){
  $stmt = $this->pdo->prepare('SELECT * FROM categorie WHERE Id = :id');
  $stmt->execute(['id' => $id]);
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function getPlatsByCategory($categoryId){
  $stmt = $this->pdo->prepare('SELECT * FROM plat WHERE id_categorie = :id_categorie);
  $stmt->execute(['category_id' =>categoryId]);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getPlatById($id){
  $stmt = $this->pdo->prepare('SELECT * FROM plat WHERE id =:id');
  $stmt->execute(['id' => $id]);
  return $stmt->fetch(PDO::FETCH_ASSOC);
}*/


  public function insertCommande($plat_id, $quantite, $total_prix)
  {
    $query = "INSERT INTO commande (plat_id, quantite, total_prix) VALUES (:plat_id, :quantite, :total_prix)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':plat_id', $plat_id);
    $stmt->bindParam(':quantite', $quantite);
    $stmt->bindParam(':total_prix', $total_prix);
    $stmt->execute();
  }






  // categorie page accueil
  public function getPopularCategories()
  {
    // Requête SQL pour récupérer les 6 catégories les plus populaires
    $sql = "SELECT c.id, c.libelle, c.image FROM categorie c JOIN plat p ON c.id = p.id_categorie GROUP BY c.id ORDER BY COUNT(p.id) DESC LIMIT 6";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // plat page accueil
  public function getBestSellingDishes()
  {
    // Requête SQL pour récupérer les 3 plats les plus vendus
    $sql = "SELECT p.id, p.libelle, p.image FROM plat p JOIN commande cp ON p.id = cp.id_plat GROUP BY p.id ORDER BY SUM(cp.quantite) DESC LIMIT 3";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // categorie page categorie
  public function getCategories()
  {
    // Requête SQL pour récupérer toutes les catégories actives
    $sql = "SELECT * FROM categorie WHERE categorie.active = 'Yes'";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Get 6 dishes from plat table
  public function getAllDishes()
  {
    // Requête SQL pour récupérer les 6 plats
    $sql = "SELECT * FROM plat LIMIT 12"; //now i need 12 dishes
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Get dish by ID
  public function getDishById($id)
  {
    $query = "SELECT * FROM plat WHERE id =?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $dish = $stmt->fetch(PDO::FETCH_ASSOC);
    return $dish;
  }


  // Get categories with dishes count
  public function getCategoriesWithDishesCount()
  {
    $sql = "SELECT c.id, c.libelle, COUNT(p.id) as dishes_count FROM categorie c LEFT JOIN plat p ON c.id = p.id_categorie GROUP BY c.id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  public function getDishesByCategory($category_id)
  {
    $sql = "SELECT * FROM plat WHERE id_categorie = :category_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function getCategoryById($id)
  {
    $sql = "SELECT * FROM categorie WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch();
  }
  public function searchAllTables($searchQuery)
  {
    $results = array();
    $tables = array(
      'plat' => array('libelle', 'description', 'prix', 'id_categorie'),
    );

    foreach ($tables as $table => $columns) {
      $sql = "SELECT * FROM $table WHERE ";
      $params = array();
      foreach ($columns as $i => $column) {
        $sql .= "$column LIKE? ";
        $params[] = "%$searchQuery%";
        if ($i < count($columns) - 1) {
          $sql .= " OR "; // use OR instead of AND
        }
      }
      $stmt = $this->conn->prepare($sql);
      foreach ($params as $i => $param) {
        $stmt->bindParam($i + 1, $param, PDO::PARAM_STR);
      }
      $stmt->execute();
      $results[$table] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
  }
}


    
    
    // <--- Add this closing brace to close the DAO class

     // Closing brace for the class
    
    // No need for at the end of the file
// // Instancier le DAO
// $dao = new DAO($conn);
// // Récupérer les catégories populaires
// $categories = $dao->getPopularCategories();

// // Récupérer les plats les plus vendus
// $bestSellingDishes = $dao->getBestSellingDishes();

// // Récupérer toutes les catégories
// $allCategories = $dao->getCategories();

// // Récupérer les 6 plats
// $sixDishes = $dao->getSixDishes();
