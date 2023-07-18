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
    <?php
    if(isset($contact)){
    echo"<div class='detail-container'>";
    echo "<h2>$contact[contacts_name]</h2>";
    echo "<p><span>Contact : </span>" . $contact['contacts_name'] . "</p>";
    echo "<p><span>Phone : </span>" . $contact['contacts_phone'] . "</p>";
    echo "<p><span>Mail : </span>" . $contact['contacts_email'] . "</p>";
    echo "<p><span>Company : </span>" . $contact['companies_name'] ."</p>";
    echo "</div>"; 
    } else {
        echo "Contact details not found.";
    }
    ?>
</main>

<?php
include VIEWS . 'includes/footer.php';
?>
</body>

</html>