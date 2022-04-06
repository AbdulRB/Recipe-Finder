 <!DOCTYPE html>

    <html lang="en" dir="ltr">
        <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- style page css--> 
               <link rel="stylesheet" type="text/css" href="css/stylepage.css">


<!-- font-awesome -->
<link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
   />

    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

         <title>Recipe Finder - Recipe page</title>
            
            <a href="RecipePage.php">

            <!-- Header, Logo and Navigation section -->

    <!-- Navigation -->

     <nav class = "navbar">
         <div class = "nav-center">
             <!--Header--> 
             <div class = "nav-header">
                 <a href = "TestWebsite/index.php" class ="nav-logo">
                 <img id="Logo" src="Images/RFlogo2.jpg" alt="Recipe Finder logo">
            </a>
            <button type = "button" class = "btn nav-btn"> 
                <i class = "fas fa-align-justify"></i> 
        </button> 
             </div>

             <!-- Links to pages --> 
             <div class = "nav-links">
                 <a href = "TestWebsite/index.php" class ="nav-link">Home</a> 
                 <a href = "RecipePage.php" class ="nav-link">Recipes</a> 
                 <a href = "#Contact us" class ="nav-link">Contact Us</a> 
                 <a href = "#About us" class ="nav-link">About Us</a> 
             
                 
             </div>
         </div>
     </nav> 
        
     <!-- Main --> 

     <main class = "page">

        <!--Recipe Section/Columns-->

               <!--Recipe Page -->

               <div class="recipe-page">
        <section class="recipe-hero">
          <img src="Images/FettuccineA.jpg" class="img recipe-hero-img" a/>
          <article class="recipe-info">
            <h2>Name of Recipe</h2>
            <p>
            Recipe Description 
            </p>
            <div class="icons">
              <article>
                <i class="fas fa-clock"></i>
                <h5>prep time</h5>
                <p>5 min.</p>
              </article>
              <article>
                <i class="far fa-clock"></i>
                <h5>cook time</h5>
                <p>15 min.</p>
              </article>
              <article>
                <i class="fas fa-user-friends"></i>
                <h5>serving</h5>
                <p>2 servings</p>
              </article>
            </div>

             <!-- Recipe Content -->
        <section class="recipe-content">
          <article>
            <h4>instructions</h4>
            <!-- Recipe Method -->
            <div class="recipe-method">
              <header>
                <p>step 1</p>
                <div></div>
              </header>
              <p>
                First step of Recipe 
              </p>
            </div>
            <!-- end of Recipe Method -->
            <!-- Recipe Method -->
            <div class="recipe-method">
              <header>
                <p>step 2</p>
                <div></div>
              </header>
              <p>
                Second step of Recipe 
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="recipe-method">
              <header>
                <p>step 3</p>
                <div></div>
              </header>
              <p>
                Third step of Recipe 
              </p>
            </div>
            <!-- end of Recipe Method -->

          </article>
          <article class="second-column">
            <div>
              <h4>Ingredients</h4>
              <p class="recipe-method">Cheese</p>
              <p class="recipe-method">Parsely</p>
              <p class="recipe-method">Pasta</p>
            </div>
            <div>

            </main> 

                         <!-- Footer -->

                         <footer class="page-footer">
      <p>
        &copy; <span id="date"></span>
        <span class="footer-logo">RecipeFinder</span> 
      </p>
    </footer>
    <script src="js/response.js"></script>
  </body>
</html>
