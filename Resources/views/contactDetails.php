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
    echo"<img src='./public/assets/img/background-title.png' alt='background yellow title'>";
    echo "<p>Contact : " . $contact['contacts_name'] . "</p>";
    echo "<p>Phone : " . $contact['contacts_phone'] . "</p>";
    echo "<p>Mail : " . $contact['contacts_email'] . "</p>";
    echo "<p>Company : " . $contact['companies_name'] ."</p>";
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