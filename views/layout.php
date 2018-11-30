<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="styles/styles.css">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        </head>
        <body>
            <header>
                <a href='/M07UF2/Exemples/blog_php_mvc'>Home</a>
                <a href='?controller=posts&action=index'>Posts</a>
                <a href='?controller=categories&action=index'>Categoties</a>
            </header>

            <?php require_once('routes.php'); ?>

            <footer>
                Copyright
            </footer>
        </body>
    </html>