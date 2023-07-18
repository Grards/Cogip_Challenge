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
    echo"<div class='detail-container'>";
    echo "<h2>$contact[contacts_name]</h2>";
    echo "<img class='contact-picture' src='" . IMG."contacts/$contact[contacts_picture]' alt=' . $contact[contacts_name] .'s picture>";
    echo "<p><span>Contact : </span>" . $contact['contacts_name'] . "</p>";
    echo "<p><span>Phone : </span>" . $contact['contacts_phone'] . "</p>";
    echo "<p><span>Mail : </span>" . $contact['contacts_email'] . "</p>";
    echo "<p><span>Company : </span>" . $contact['companies_name'] ."</p>";
    echo "</div>"; 
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