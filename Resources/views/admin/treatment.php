<?php 

    use App\Core\DatabaseManager;

    // include VIEWS.'includes/admin/header_admin.php';
    // include VIEWS.'includes/errors.php';
    // include VIEWS.'includes/dateFormat.php';
    // include VIEWS.'includes/admin/aside_admin.php';
?>  

<main class="dash_main">
    <h2>Is the encoded information correct ?</h2>

<?php
    echo "<p>Name : " . $contact_name . "</p>";
    echo "<p>Company : " . $contact_company . "</p>";
    echo "<p>Email : " . $contact_email . "</p>";
    echo "<p>Phone : " . $contact_phone . "</p>";
    echo "<p>Creation date : " . $contact_created_at . "</p>";
?>

</main>