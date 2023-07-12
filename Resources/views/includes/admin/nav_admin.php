<?php
    include VIEWS.'includes/breadcrumb.php';
?>

<nav class="breadcrumb">
    <h2>Dashboard</h2>
    <?php echo breadcrumb(); ?>
</nav>
<!-- Placer ici l'image du Dashboard -->
<img src="" alt="Administrator who work on his desk">

<article class="dash-welcome">
    <h2>Welcome back <?php echo "$user[users_first_name]"; ?> !</h2>
    <p>You can here add here an invoice, a company, and some contacts</p>
</article>