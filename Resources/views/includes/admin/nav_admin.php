<?php
    include VIEWS.'includes/breadcrumb.php';
?>

<nav class="breadcrumb">
    <h2>Dashboard</h2>
    <span>
        <?php echo breadcrumb(); ?>
    </span>
</nav>
<!-- Placer ici l'image du Dashboard -->
<div class="dash-welcome-container">
        <article class="dash-welcome">
            <h2>Welcome back <?php echo "$user[users_first_name]"; ?> !</h2>
            <p>You can here add here an invoice, a company, and some contacts</p>
        </article>
        <img src="assets/img/sidebar_logo/scene_dashboard.png" alt="Administrator who work on his desk" class="img-dashboard">
</div>
