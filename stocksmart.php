<?php
    include_once dbh-inc.php;

    //insert_grocery variables
    $food = $_POST['food'];
    $foodgroup = $_POST['foodgroup'];
    $bought = $_POST['bought'];

    if(isset($_POST['insert_grocery'])) {
        $sql_insert_grocery = "INSERT INTO grocery (food_name, food_group, username, bought);
        VALUES ($food, '$foodgroup', $bought, 'TBA');";
        $stmt = $dbconn->query($sql2);
        $prod_arr = $stmt->fetchAll();
        header("Location: grocery.html?insert_grocery=success");
    }

?>