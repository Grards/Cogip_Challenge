<?php
    include VIEWS.'includes/header.php';
?>  
<head>
    <link href="<?php echo BASE_URL.'assets/css/style.css'?>" rel="stylesheet" type="text/css">
    <script src="<?php echo BASE_URL.'assets/js/script.js'?>" type="module"></script>
    <meta name="viewport" content="width=device-width" />

</head>
    <main id="main">
        <img src="<?php echo BASE_URL.'assets/img/404.svg'?>" alt="A robot who says 'error 404'" 
         style="width:300px; height:300px;">
        <p class="button"> <a href="<?php echo BASE_URL?>">Return to home</a></p>
    </main>
    <span></span>
<?php
    include 'includes/footer.php';
?> 