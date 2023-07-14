<?php 

    use App\Core\DatabaseManager;

    include VIEWS.'includes/admin/header_admin.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    include VIEWS.'includes/admin/aside_admin.php';
?>  

<main>
    <form id="new-contact" action="<?php echo BASE_URL.'dashboard/treatment'?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="new-contact" value="new-contact-value">

        <label for="new-contact__picture">Picture : </label>
        <input type="file" id="new-contact__picture" name="new-contact__picture">

        <label for="new-contact__name">Complete name : </label>
        <input type="text" id="new-contact__name" name="new-contact__name" required>

        <label for="new-contact__company">Company : </label>
        <select name="new-contact__company" id="new-contact__company" required>
            <option value="">-- Please choose a company --</option>
            <?php 
                foreach($companiesNames as $company){
                    echo "<option value='$company[companies_name]'>$company[companies_name]</option>";
                }
            ?>
        </select>

        <label for="email">Email : </label>
        <input type="email" id="new-contact__email" name="new-contact__email" required>

        <label for="new-contact__phone">Phone : </label>
        <input type="tel" id="new-contact__phone" name="new-contact__phone" required>

        <input type="submit" id="new-contact__submit" value="Send new contact" onclick="return confirm('Is the encoded information correct ?')">
    </form>
</main>

<?php 
    include VIEWS.'includes/footer.php';
?>