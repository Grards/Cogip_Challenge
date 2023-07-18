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
    <div class="company-details">
    <div class="table-title">
            <h2>Contact people</h2>
        </div>
        <?php
        if (isset($company)) {
            echo "<h1>$company[companies_name]</h1>";
            echo "<p> Name : " . $company['companies_name'] . "</p>";
            echo "<p> TVA : " . $company['tva'] . "</p>";
            echo "<p> Country : " . $company['country'] . "</p>";
            echo "<p> Type : " . $company['types_name'] . "</p>";
        } else {
            echo "<p>Company details not found.</p>";
        }
        ?>
    </div>
    <div class="contact-people-picture">
        <?php
        // TODO: Add picture of the contacts working in this company
        // echo "<img class='contact-picture' src='" . IMG."contacts/$contact[contacts_picture]' alt=' . $contact[contacts_name] .'s picture>";
        // echo "<img class='contact-picture' src='" . IMG."contacts/$contact[contacts_picture]' alt=' . $contact[contacts_name] .'s picture>";
        ?>
    </div>
    <div class="table-container">
        <div class="table-title">
            <h2>Last invoices</h2>
        </div>
        <table class="table">
            <thead class="tableHead">
                <th>Invoice Number</th>
                <th>Dates</th>
                <th>Company</th>
                <th>Created at</th>
            </thead>
        </table>
    </div>
            <!-- TODO : Add last invoices of this specific company -->

</main>

<?php
include VIEWS . 'includes/footer.php';
?>
</body>

</html>