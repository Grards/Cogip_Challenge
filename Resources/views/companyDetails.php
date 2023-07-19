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
    <div class="company-details-container main">
        <div class="company-title">
            <?php
                echo "<h2>$company[companies_name]</h2>";
            ?>
        </div>
        <?php
        if (isset($company)) {
            echo "<p><span>Name :</span> " . $company['companies_name'] . "</p>";
            echo "<p> TVA : " . $company['tva'] . "</p>";
            echo "<p><span>Country : </span>" . $company['country'] . "</p>";
            echo "<p><span> Type : </span>" . $company['types_name'] . "</p>";
        } else {
            echo "<p>Company details not found.</p>";
        }
        ?>
    </div>
    <div class="company-details-container contact">
        <div class="contact-title">
            <h2>Contact people</h2>
        </div>
        <?php
        foreach ($contacts as $contact) {
            if (!empty($contact['contacts_picture'])) {
                echo "<img class='contact-picture' src='" . IMG . "contacts/$contact[contacts_picture]' alt=' . $contact[contacts_name] .'s picture>";
            } else {
                echo "<p>No picture available for this contact</p>";
            }
        }
        ?>
    </div>
    <div class="company-details-container table">
        <div class="invoice-title">
            <h2>Last invoices</h2>
        </div>
        <table class="table">
            <thead class="tableHead">
                <th>Invoice Number</th>
                <th>Due Date</th>
                <th>Company</th>
                <th>Created at</th>
            </thead>
            <?php

            foreach ($invoices as $invoice) {
                $dateFormated_due = dateFormat($invoice['invoices_due_date']);
                $dateFormated_created = dateFormat($invoice['invoices_created_at']);
                echo "<tr>";
                echo "<td>$invoice[invoices_ref]</td>";
                echo "<td>$dateFormated_due</td>";
                echo "<td>$invoice[companies_name]</td>";
                echo "<td>$dateFormated_created</td>";
                echo "</tr>";
            }

            ?>

        </table>
    </div>
</main>

<?php
include VIEWS . 'includes/footer.php';
?>
</body>

</html>