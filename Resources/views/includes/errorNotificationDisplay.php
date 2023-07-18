<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur notification display</title>
    <link href="<?php echo BASE_URL.'assets/css/style.css'?>" rel="stylesheet" type="text/css">
    <script src="<?php echo BASE_URL.'assets/js/script.js'?>" type="module"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</head>
<body>
    <button>Show alert</button>
    <div class="alert hide">
        <span class="fas fa-exclamation-circle"> </span>
        <span class="msg">Warning: This is a warning alert</span>
        <span class="close-btn">
            <span class=" fas fa-times"></span>
        </span>
    </div>
</body>
</html>
