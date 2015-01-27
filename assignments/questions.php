<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Survey</title>
        <meta name="author" content="Spencer Palmer">
        <meta name="description" content="Personal portfolio website of Spencer Palmer">
        <link href="/css/screen.css" type="text/css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
    </head>
    <body>
        <div class="site_container clearfix">
        <header class="clearfix" role="banner">
            <div class="container header">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>
              
                <nav class="main_nav clearfix" role="navigation">
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/main_nav.php'; ?>
                </nav>
            </div>
        </header>
        <main role="main">
            <div class="container main clearfix">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/main.php'; ?>
        <h2>Survey</h2>
        <form action="results.php" method="post" id="surveyForm">

            <h2>What is your favorite flavor of ice cream?</h2>
            <input type="radio" name="iceCream" value="Chocolate">
            <label for="chocolate">Chocolate</label><br>
            <input type="radio" name="iceCream" value="Vanilla">
            <label for="vanilla">Vanilla</label><br>
            <input type="radio" name="iceCream" value="Strawberry">
            <label for="strawberry">Strawberry</label><br>


            <h2>What is your favorite season</h2>
            <input type="radio" name="seasons" value="Spring">
            <label for="spring">Spring</label><br>
            <input type="radio" name="seasons" value="Summer">
            <label for="summer">Summer</label><br>
            <input type="radio" name="seasons" value="Fall">
            <label for="fall">Fall</label><br>
            <input type="radio" name="seasons" value="Winter">
            <label for="winter">Winter</label><br>

            <h2>What is your favorite building?</h2>
            <input type="radio" name="building" value="Austin">
            <label for="austin">Austin</label><br>
            <input type="radio" name="building" value="Taylor">
            <label for="mc">Taylor</label><br>
            <input type="radio" name="building" value="Smith">
            <label for="smith">Smith</label><br>
            <input type="radio" name="building" value="Romney">
            <label for="romney">Romney</label><br>

            <h2>Least favorite subject?</h2>
            <input type="radio" name="subject" value="Math">
            <label for="math">Math</label><br>
            <input type="radio" name="subject" value="English">
            <label for="english">English</label><br>
            <input type="radio" name="subject" value="Science">
            <label for="Science">Science</label><br>
            <input type="radio" name="subject" value="History">
            <label for="history">History</label><br>

            <input type="submit" name="action" value="Submit"><br><br>

        </form>
            </div>   
         </main>
        
        
            <footer class="clearfix" role="contentinfo">
            <div class=" container footer clearfix">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
            
                <?php
                // outputs e.g. 'Last modified: March 04 1998 20:43:59.'
                echo "Last modified: " . date ("F d Y H:i:s.", getlastmod());
                ?>
            </div>
        </footer>
        </div>
    </body>
</html>
