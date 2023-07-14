<?php 

    use App\Core\DatabaseManager;

    include VIEWS.'includes/admin/header_admin.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    include VIEWS.'includes/admin/aside_admin.php';
?>  

<main>
    <form id="new-invoice" action="<?php echo BASE_URL.'dashboard/treatment'?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="new-invoice" value="new-invoice-value">

        <label for="new-invoice__ref">Reference : </label>
        <input type="text" id="new-invoice__ref" name="new-invoice__ref" required>

        <label for="new-invoice__company">Company : </label>
        <select name="new-invoice__company" id="new-invoice__company" required>
            <option value="">-- Please choose a company --</option>
            <?php 
                foreach($companiesNames as $company){
                    echo "<option value='$company[companies_name]'>$company[companies_name]</option>";
                }
            ?>
        </select>

        <label for="new-invoice__due_date">Due Date : </label>
        <input type="date" id="new-invoice__due_date" name="new-invoice__due_date" required>

        <label for="new-invoice__price">Price ($) : </label>
        <input type="number" id="new-invoice__price" name="new-invoice__price" required>

        <input type="submit" id="new-invoice__submit" value="Send new invoice" onclick="return confirm('Is the encoded information correct ?')">
    </form>
</main>

<?php 
    include VIEWS.'includes/footer.php';
?>