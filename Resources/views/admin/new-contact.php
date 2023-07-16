<?php 

    use App\Core\DatabaseManager;

    include VIEWS.'includes/admin/header_admin.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    // include VIEWS.'includes/admin/aside_admin.php';
?>  

<main>
    <!-- dashboard aside container -->
        <?php
             include VIEWS.'includes/admin/sidebar_admin.php';
        ?>
    <form id="new-contact" action="<?php echo htmlspecialchars(BASE_URL.'dashboard/treatment')?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="new-contact" value="new-contact-value">

        <!-- TODO FOR FRONT : put position absolute and left: -99999px for .crud-password -->
        <fieldset class="crud-password">
            <label for="new-contact__password">Password : </label>
            <input type="text" name="new-contact__password" tabindex="-1" autocomplete="off">
        </fieldset>

        <label for="new-contact__picture">Picture : </label>
        <input type="file" id="new-contact__picture" name="new-contact__picture" max=255>

        <label for="new-contact__name">Complete name : </label>
        <input type="text" id="new-contact__name" name="new-contact__name" min=3 max=50 required>

        <label for="new-contact__company">Company : </label>
        <select name="new-contact__company" id="new-contact__company" min=3 max=50 required>
            <option value="">-- Please choose a company --</option>
            <?php 
                foreach($companiesNames as $company){
                    echo "<option value='$company[companies_name]'>$company[companies_name]</option>";
                }
            ?>
        </select>

        <label for="email">Email : </label>
        <input type="email" id="new-contact__email" name="new-contact__email" min=8 max=50 required>

        <label for="new-contact__phone">Phone : </label>
        <input type="tel" id="new-contact__phone" name="new-contact__phone" min=10 max=50 required>

        <input type="submit" id="new-contact__submit" value="Send new contact" onclick="return confirm('Is the encoded information correct ?')">
    </form>
</main>

<?php 
    include VIEWS.'includes/footer.php';
?>