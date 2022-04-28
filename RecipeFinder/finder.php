<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recipe Finder</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,700|IBM+Plex+Sans:600" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>

<body class="is-boxed has-animations">
    <div class="body-wrap boxed-container">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
                            <a href="index.html">
								<img class="header-logo-image asset-light" src="dist/images/logo.jpeg" alt="Logo" width="170" height ="170">
								<img class="header-logo-image asset-dark" src="dist/images/logo.jpeg" alt="Logo" width="170" height ="170">
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </header>

    <main>
        <div class="container">
            <article class="recipeFinderBox">
                <form name="form" action="" method="post" id="recipeFinderForm">
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
            </article>
        </div>

        <?php

            if (isset($_POST['submitBtn'])) {
               
                ?>

                <div class="container">
                <section name="recipeDisplay" id='recipeDisplay'>    

                <?php 
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
                        <html><img src ="<?php echo $row['recipeImage']; ?>" id="recipeImage"/><br></html>
                        <?php
                        echo "Serves: " . $row['serves'] . "<br>";
                        echo $row['ingredients'] . "<br>";
                        echo $row['timeTaken'] . "<br>";
                    }
                }
    
                else {
                    echo "No recipes found";
                }
            }

        ?>
        </section>
        </div>
        </main>

        <footer class="site-footer has-top-divider">
            <div class="container">
                <div class="site-footer-inner">
                    <div class="brand footer-brand">
                        <a href="#">
                            <img class="asset-light" src="dist/images/logo.jpeg" alt="Logo" width="50" height ="50">
							<img class="asset-dark" src="dist/images/logo.jpeg" alt="Logo" width="50" height ="50">
                        </a>
                    </div>
                    <ul class="footer-links list-reset">
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="#">About us</a>
                        </li>
                        <li>
                            <a href="#">FAQ's</a>
                        </li>
                        <li>
                            <a href="#">Support</a>
                        </li>
                    </ul>
                    <ul class="footer-social-links list-reset">
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Facebook</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z" fill="#FFF"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Twitter</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z" fill="#FFF"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Google</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z" fill="#FFF"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="footer-copyright">&copy; 2018 Switch, all rights reserved</div>
                </div>
            </div>
        </footer>
    </div>

    <script src="dist/js/main.min.js"></script>
</body>
</html>