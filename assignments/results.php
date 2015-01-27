<?php 

    session_start();
    $_SESSION['vote'] = TRUE;


 ?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Results</title>
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
                
                <?php 


                    echo $_POST['iceCream'] . '<br>';
                    echo $_POST['seasons'] . '<br>';
                    echo $_POST['building'] . '<br>';
                    echo $_POST['subject'] . '<br>';

                    if (isset($_SESSION['vote'])) {
                         echo "Thanks for taking the survey!";
                    }

                ?>
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
