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
        <div class="table-title underlined">
            <h1>Invoice details</h1>
        </div>
        <div class="invoice-details">
            <?php
            if (isset($invoice['created_at'])) {
                $dateFormated_created = dateFormat($invoice['created_at']);
                $dateFormated_due = dateFormat($invoice['due_date']);
                echo "<h1> Reference : " . $invoice['ref'] . "</h1>";
                echo "<p>Due date : " . $dateFormated_due ."</p>";
                echo "<p>Company : " . $invoice['companies_name'] . "</p>";
                echo "<p>Price : " . $invoice['price'] . "</p>";
                echo "<p>Created at : " . $dateFormated_created . "</p>";
            } else {
                echo "<p>Invoice details not found.</p>";
            }
            ?>
        </div>
</main>

<?php
include VIEWS . 'includes/footer.php';
?>
</body>

</html>