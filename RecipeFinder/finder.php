<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="css/main.css" rel="stylesheet">
    </head>

    <body>
        <form name="form" action="" method="post">
            <label>
                <p>Please enter three ingredients:</p>
                <input type="text" name="ingredient1" minlength="3" maxlength="20" required>
                <input type="text" name="ingredient2" minlength="3" maxlength="20" required>
                <input type="text" name="ingredient3" minlength="3" maxlength="20" required>
                <br><br>
                <p>Please enter the number of people to serve:</p>
                <input type="text" name="serves">
                <p>Please select any dietary requirements:</p>
                <input type="radio" id="glutenFree" name="dietReq" value="Gluten Free">
                <label for="glutenFree">Gluten Free</label><br>
                <input type="radio" id="vegan" name="dietReq" value="Vegan">
                <label for="vegan">Vegan</label><br>
                <input type="radio" id="vegetarian" name="dietReq" value="Vegetarian">
                <label for="vegetarian">Vegetarian</label><br>
                <input type="radio" id="dairyFree" name="dietReq" value="Dairy Free">
                <label for="dairyFree">Dairy Free</label><br>
            </label>

            <br>
            <button type="submit" name="submitBtn">Submit</button>
            <br>
        </form>

        <?php

            if (isset($_POST['submitBtn'])) {
                
                $ing1 = $_POST['ingredient1'];
                $ing2 = $_POST['ingredient2'];
                $ing3 = $_POST['ingredient3'];
                $serves = $_POST['serves'];
                $dietReq = $_POST['dietReq'];
    
                
                if ($serves == "" && $dietReq == "") {
                    $sql = "SELECT * FROM recipe WHERE Ingredients LIKE '%$ing1%' AND Ingredients LIKE '%$ing2%' AND Ingredients LIKE '%$ing3%';";
                }
                else if ($serves == "") {
                    $sql = "SELECT * FROM recipe WHERE Ingredients LIKE '%$ing1%' AND Ingredients LIKE '%$ing2%' AND Ingredients LIKE '%$ing3%'
                    AND Dietary = '$dietReq';";
                }
                else if ($dietReq == "") {
                    $sql = "SELECT * FROM recipe WHERE Ingredients LIKE '%$ing1%' AND Ingredients LIKE '%$ing2%' AND Ingredients LIKE '%$ing3%'
                    AND Serves = '$serves';";
                }
                else {
                    $sql = "SELECT * FROM recipe WHERE Ingredients LIKE '%$ing1%' AND Ingredients LIKE '%$ing2%' AND Ingredients LIKE '%$ing3%'
                    AND Serves = '$serves'
                    AND Dietary = '$dietReq';";
                }
                
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
    
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['recipeName'] . "<br>";
                        ?>
                        <html><img src ="<?php echo $row['recipeImage']; ?>" style="width:300px;height:300px;"/><br></html>
                        <?php
                        echo "Serves: " . $row['serves'] . "<br>";
                        echo $row['ingredientsList'] . "<br>";
                        echo $row['recipeMethod'] . "<br>";
                    }
                }
    
                else {
                    echo "No recipes found";
                }
            }

        ?>

    </body>
</html>