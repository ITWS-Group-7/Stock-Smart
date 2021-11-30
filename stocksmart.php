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
        $today = date("Y-m-d H:i:s");
      
        foreach ($prod_arr as $row){
            $date = $row['expiration date'];
           $print= "<tr id=\"hvr-grow-shadow\"> .
           '<td>' . $row['food_name'] . '</td>' .
           '<td>' . $row['purchase_date'] . '</td>' .
           '<td>'. $row['expiration_date'] . '</td>' .
           '<td>'$row['item_opened'] . '</td>";
           if ($row['expiration date'] - $today) >= 5){
            $print . "'<td>'. '<button type=\"button\" class=\"btn btn-danger\"  data-toggle=\"modal\" data-target=\"#warning_modal\">VIEW MORE</button>' + '</td>'";
           }
           else{
           $print . "'<td>'+ '<button type=\"button\" class=\"btn btn-success\" data-toggle = \"modal\" data-target = \"#success_modal\">VIEW MORE</button>' + '</td>'";
         }
         $print . "'</tr>'";
        }
        echo $print;
// save string to session super global and check


        header("Location: grocery.html?print_dairy=success");
    }

?>