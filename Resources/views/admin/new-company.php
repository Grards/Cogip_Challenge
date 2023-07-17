<?php 

    use App\Core\DatabaseManager;

    include VIEWS.'includes/admin/header_admin.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    // include VIEWS.'includes/admin/aside_admin.php';
    include VIEWS.'includes/countriesList.php';
?>  

<main>
        <!-- dashboard aside container -->
        <?php
             include VIEWS.'includes/admin/sidebar_admin.php';
        ?>
    <form id="new-company" action="<?php echo htmlspecialchars(BASE_URL.'dashboard/treatment')?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="new-company" value="new-company-value">

        <!-- TODO FOR FRONT : put position absolute and left: -99999px for .crud-password -->
        <fieldset class="crud-password">
            <label for="new-company__password">Password : </label>
            <input type="text" name="new-company__password" tabindex="-1" autocomplete="off">
        </fieldset>

        <label for="new-company__name">Name : </label>
        <input type="text" id="new-company__name" name="new-company__name" min=3 max=50 required>

        <label for="new-company__company">Type : </label>
        <select name="new-company__type_name" id="new-company__type_name" required>
            <option value="">-- Please choose a type of company --</option>
            <?php 
                foreach($typesNames as $type){
                    echo "<option value='$type[types_name]'>$type[types_name]</option>";
                }
            ?>
        </select>

        <select name="new-company__country" id="new-company__country" required>
            <option value="">-- Please choose a country for the company --</option>
            <?php 
                foreach($country_list as $iso => $country){
                    echo "<option value='$country'>$iso - $country</option>";
                }
            ?>
        </select>

        <label for="new-company__tva">Tva : </label>
        <input type="text" id="new-company__tva" name="new-company__tva" min=8 max=50 required>

        <input type="submit" id="new-company__submit" value="Send new company" onclick="return confirm('Is the encoded information correct ?')">
    </form>
</main>

<?php 
    include VIEWS.'includes/footer.php';
?>