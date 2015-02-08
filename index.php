<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Home</title>
        <meta name="author" content="Spencer Palmer">
        <meta name="description" content="Personal portfolio website of Spencer Palmer">
        <link href="/css/screen.css" type="text/css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
    </head>
    <body>
        <div class="site_container">
        <header class="clearfix" role="banner">
            <div class="container header">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>

                <nav class="main_nav" role="navigation">
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/main_nav.php'; ?>
                </nav>
            </div>
        </header>
        <main role="main">
            <div class="container main">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/main.php'; ?>
                <h2>Welcome</h2>
            </div>
         </main>


            <footer class="clearfix" role="contentinfo">
            <div class=" container footer">
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
