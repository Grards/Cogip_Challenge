<?php 

    use App\Core\DatabaseManager;

    // include VIEWS.'includes/admin/header_admin.php';
    // include VIEWS.'includes/errors.php';
    // include VIEWS.'includes/dateFormat.php';
    // include VIEWS.'includes/admin/aside_admin.php';
?>  

<main class="dash_main">
    <h2>Y a quelqu'un ?</h2>

<?php
    echo "<p>" . $name . "</p>";
    echo "<p>" . $company . "</p>";
    echo "<p>" . $email . "</p>";
    echo "<p>" . $phone . "</p>";
    echo "<p>" . $created_at . "</p>";
?>

</main>