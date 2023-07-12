<?php 

    use App\Core\DatabaseManager;

    include VIEWS.'includes/header.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    include VIEWS.'includes/breadcrumb.php';
?>  


<nav class="breadcrumb">
    <?php echo breadcrumb(); ?>
</nav>

<?php 
    include VIEWS.'includes/footer.php';
?>