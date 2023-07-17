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
        <table class="invoice-details">
            <thead class="tableHead">
                <th>Ref</th>
                <th>Due Date</th>
                <th>Company</th>
                <th>Price</th>
                <th>Created at</th>
            </thead>
            <?php
            if (isset($invoice['created_at'])) {
                $dateFormated_created = dateFormat($invoice['created_at']);
                $dateFormated_due = dateFormat($invoice['due_date']);
                echo "<tr>";
                echo "<td>$invoice[ref]</td>";
                echo "<td>$dateFormated_due</td>";
                echo "<td>$invoice[companies_name]</td>";
                echo "<td>$invoice[price]</td>";
                echo "<td>$dateFormated_created</td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='5'>Invoice details not found.</td></tr>";
            }
            ?>
        </table>
</main>

<?php
include VIEWS . 'includes/footer.php';
?>
</body>

</html>