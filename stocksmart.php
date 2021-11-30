<?php
    include_once dbh-inc.php;

    //insert_grocery variables
    $food = $_POST['food'];
    $foodgroup = $_POST['foodgroup'];
    $bought = $_POST['bought'];

    if(isset($_POST['insert_grocery'])) {
        $sql_insert_grocery = "INSERT INTO grocery (food_name, food_group, username, bought);
        VALUES ($food, '$foodgroup', $bought, 'TBA');";
        $stmt = $conn->query($sql_insert_grocery);
        $prod_arr = $stmt->fetch();
        header("Location: grocery.html?insert_grocery=success");
    }

    if (isset($_GET['action']) && $_GET['action'] == 'dairy') {
        $sql_print_grocery = "SELECT food_name, food_group, expiration_date, item_opened from food_items WHERE food_group='Dairy';";        
        $stmt = $dbconn->query($sql_print_grocery);
        $prod_arr = $stmt->fetchAll();
        foreach ($prod_arr as $row){
            echo "<tr><td><a href=" . $row['name']> print $row['name'] . "</a>".
           "</td><td>" . $row['country'] . "</td></tr>". "</td><td>" . $row['sex']. "</td><td>" .
           $row['color']. "</td><td>". "</td><td>" .
            $row['pattern'] . $row['coat']. "</td><td>" . $row['breeders'];
            //are we reading from json file or database and are we dynamically loading in table from javascript or php file

           }
        header("Location: grocery.html?print_dairy=success");
    }

?>