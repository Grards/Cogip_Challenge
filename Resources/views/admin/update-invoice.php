
<?php
    use App\Core\DatabaseManager;

    include VIEWS.'includes/admin/header_admin.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    include VIEWS.'includes/admin/sidebar_admin.php';
?>  

<main class="dash_main">
    <!-- dashboard aside container -->
    <?php
     include VIEWS.'includes/admin/sidebar_admin.php';
    ?>
    <!-- dashboard main container -->
    <div class="dashboard-main-container">
    <?php 
        if($crud === 'update_invoice' && $idInvoice > 0 && $idInvoice <= $countOfInvoices && isset($invoice['invoices_id'])){
            $invoice_id = filter_var(htmlspecialchars($idInvoice), FILTER_SANITIZE_NUMBER_INT);
            $invoice_ref = htmlspecialchars($invoice['invoices_ref']);
            $invoice_company = htmlspecialchars($invoice['companies_name']);
            $invoice_due_date = htmlspecialchars($invoice['invoices_due_date']);
            $invoice_price = filter_var(htmlspecialchars($invoice['invoices_price']),FILTER_SANITIZE_NUMBER_FLOAT,
            FILTER_FLAG_ALLOW_FRACTION);
            $invoice_created_at = htmlspecialchars($invoice['invoices_created_at']);
            $invoice_updated_at = htmlspecialchars($invoice['invoices_updated_at']);
    ?>
            <p>Creation date : <?= $invoice_created_at; ?> </p>
            <p>Last update : <?= $invoice_updated_at; ?> </p>

            <form id="update-invoice" action="<?php echo htmlspecialchars(BASE_URL.'dashboard/treatment')?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="update-invoice" value="update-invoice-value">
                <input type="hidden" name="update-invoice__id" value="<?= $idInvoice ?>">

                <fieldset class="crud-password">
                    <label for="update-invoice__password">Password : </label>
                    <input type="text" name="update-invoice__password" tabindex="-1" autocomplete="off">
                </fieldset>

                <label for="update-invoice__ref"> Reference : </label>
                <input type="text" id="update-invoice__ref" name="update-invoice__ref" min=6 max=50 value="<?= $invoice_ref ?>>

                <label for="update-invoice__company">Company : </label>
                <select name="update-invoice__company" id="update-invoice__company" required>
                    <option value="">-- Please choose a company --</option>
                    <?php 
                        foreach($companiesNames as $company){
                            if("$company[companies_name]" == $invoice_company){
                                echo "<option value='$company[companies_name]' selected=selected>$company[companies_name]</option>";
                            }else{
                                echo "<option value='$company[companies_name]'>$company[companies_name]</option>";
                            }
                        }
                    ?>
                </select>

                <label for="update-invoice__due_date">Due date : </label>
                <input type="date" id="update-invoice__due_date" name="update-invoice__due_date" max=50 value="<?= $invoice_due_date ?>" required>

                <label for="update-invoice__price">Price : </label>
                <input type="tel" id="update-invoice__price" name="update-invoice__price" min=3 max=50 value="<?= $invoice_price ?>" required>

                <input type="submit" id="update-invoice__submit" value="Send update invoice" onclick="return confirm('Is the encoded information correct ?')">
            </form>
    <?php
        }else{
            echo "<p>".NO_ENTRY." Contact the administrator.</p>";
            echo "<p><a href='".BASE_URL."dashboard'>Return to Dashboard</a></p>";
        }
    ?>
    </div>
</main>