<?php
    include 'db.include.php';
    $conn = getDatabaseConnection(); //gets database connection

    $varquery = $_GET["var"]; // Testing purposes
    switch ($varquery) {
      case "red_fruit":
        $sql = "SELECT red_fruit FROM aromas WHERE color_key = 0 AND LENGTH(red_fruit) > 0";
      break;
      case "black_fruit":
        $sql = "SELECT black_fruit FROM aromas WHERE color_key = 0 AND LENGTH(black_fruit) > 0";
      break;
        case "blue_fruit":
      $sql = "SELECT  blue_fruit FROM aromas WHERE color_key = 0 AND LENGTH(black_fruit) > 0";
      break;
      case "fruit_type":
        $sql = "SELECT fruit_type FROM aromas WHERE color_key = 0 AND LENGTH(fruit_type) > 0";
      break;
      case "flowers":
        $sql = "SELECT flowers FROM aromas WHERE color_key = 0 AND LENGTH(flowers) > 0";
      break;
      case "herbs":
        $sql = "SELECT herbs FROM aromas WHERE color_key = 0 AND LENGTH(herbs) > 0";
      break;
      case "vegetal":
        $sql = "SELECT vegetal FROM aromas WHERE color_key = 0 AND LENGTH(vegetal) > 0";
      break;
      case "mint_eucalyptus":
        $sql = "SELECT  mint_eucalyptus FROM aromas WHERE color_key = 0 AND LENGTH(mint_eucalyptus) > 0";
      break;
      case "pepper_spice":
        $sql = "SELECT pepper_spice FROM aromas WHERE color_key = 0 AND LENGTH(pepper_spice) > 0";
      break;
      case "cocoa_coffee":
        $sql = "SELECT cocoa_coffee FROM aromas WHERE color_key = 0 AND LENGTH(cocoa_coffee) > 0";
      break;
      case "meat_leather":
        $sql = "SELECT meat_leather FROM aromas WHERE color_key = 0 AND LENGTH(meat_leather) > 0";
      break;
      case "tobacco_tar":
        $sql = "SELECT tobacco_tar FROM aromas WHERE color_key = 0 AND LENGTH(tobacco_tar) > 0";
      break;
      case "earth_leaves_mushrooms":
        $sql = "SELECT earth_leaves_mushrooms FROM aromas WHERE color_key = 0 AND LENGTH(earth_leaves_mushrooms) > 0";
        break;
      case "mineral_stone_sulfur":
        $sql = "SELECT mineral_stone_sulfur FROM aromas WHERE color_key = 0 AND LENGTH(mineral_stone_sulfur) > 0";
      break;
      case "oak_vanilla_toast_smoke_coconut":
      $sql = "SELECT oak_vanilla_toast_smoke_coconut FROM aromas WHERE color_key = 0 AND LENGTH(oak_vanilla_toast_smoke_coconut) > 0";
      break;

    }

    $statement = $conn->prepare($sql);
    $statement->execute();
    $record = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    header('Content-type: application/json');
    echo json_encode($record);
?>
