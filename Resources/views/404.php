<?php
   include VIEWS.'includes/header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Erreur 404 - Page introuvable</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'assets/css/error_404.css'?>">
    <link rel="stylesheet" type="text/css" href="../../scss/layout/_404.scss">
</head>
<body>
    <main id="main">
        <img src="<?php echo BASE_URL.'assets/img/404.svg'?>" alt="A robot who says 'error 404'">
        <div class="button">
            <p><a href="<?php echo BASE_URL?>">Retour à l'accueil</a></p>
        </div>


    </main>
</body> 
</html>
<?php
    // include 'includes/footer.php';
?>
