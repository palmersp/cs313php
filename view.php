<!DOCTYPE html>
<html>
    <head lang="en">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
    </head>
    <body>
        <div class="site_container">
        <header role="banner">
            <div class="container header">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>

                <nav class="main_nav" role="navigation">
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/main_nav.php'; ?>
                </nav>
            </div>
        </header>
        <main role="main">
            <div class="container main">
              <!-- <img src="/media/images/maldives1920.jpg"> -->
                <?php if(isset($mainAbove)){
                   echo $mainAbove;
                   } ?>

                <?php include $_SERVER['DOCUMENT_ROOT'] . $main; ?>

                <?php if(isset($mainBelow)){
                  echo $mainBelow;
                  } ?>
            </div>
         </main>


            <footer role="contentinfo">
            <div class=" container footer">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
            </div>
        </footer>
        </div>
    </body>
</html>
