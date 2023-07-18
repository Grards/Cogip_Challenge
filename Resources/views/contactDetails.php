<?php

use App\Core\DatabaseManager;

include VIEWS . 'includes/header.php';
include VIEWS . 'includes/errors.php';
include VIEWS . 'includes/dateFormat.php';

?>

<main>
    <div class="table-shape">
        <div class="test-clip">
        </div>
    </div>
    <div class="table-container withoutSlogan">
        <div id="test-clip">
        </div>
    </div>
    <div class="contacts-details">
    <?php
    if(isset($contact)){
    echo "<h1>$contact[contacts_name]</h1>";
    echo "<img class='contact-picture' src='" . IMG."contacts/$contact[contacts_picture]' alt=' . $contact[contacts_name] .'s picture>";
    echo "<p>Contact : " . $contact['contacts_name'] . "</p>";
    echo "<p>Phone : " . $contact['contacts_phone'] . "</p>";
    echo "<p>Mail : " . $contact['contacts_email'] . "</p>";
    echo "<p>Company : " . $contact['companies_name'] ."</p>";
    } else {
        echo "<p>Contact details not found.</p>";
    }
    ?>
    </div>
</main>

<?php
include VIEWS . 'includes/footer.php';
?>
</body>

</html>