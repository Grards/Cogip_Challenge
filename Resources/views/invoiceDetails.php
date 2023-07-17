<?php 

use App\Core\DatabaseManager;

include VIEWS.'includes/header.php';
include VIEWS.'includes/errors.php';
include VIEWS.'includes/dateFormat.php';

?>

<main>
    
    <h1>Invoice details</h1>
    <div class="invoice-details">

    <?php
        // $dateFormated = dateFormat($invoice['created_at']);
    
        echo "<p>ID: " . $invoice['id'] . "</p>";
        echo "<p>Ref: " . $invoice['ref'] . "</p>";
        echo "<p>Due Date: " . $invoice['due_date'] . "</p>";
        echo "<p>Company: " . $invoice['companies_name'] . "</p>";
        echo "<p>Price: " . $invoice['invoices_price'] . "</p>";
        echo "<p>Created at: " . $dateFormated . "</p>";
    ?>
    </div>

    <a href="{{ BASE_URL }}invoices">Back to Invoices List</a>
</main>

<?php
include VIEWS . 'includes/footer.php';
?>
</body>
</html>