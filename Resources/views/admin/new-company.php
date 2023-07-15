<?php 

    use App\Core\DatabaseManager;

    include VIEWS.'includes/admin/header_admin.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    include VIEWS.'includes/admin/aside_admin.php';
    include VIEWS.'includes/countriesList.php';
?>  

<main>
    <form id="new-company" action="<?php echo BASE_URL.'dashboard/treatment'?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="new-company" value="new-company-value">

        <label for="new-company__ref">Name : </label>
        <input type="text" id="new-company__name" name="new-company__name" required>

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
        <input type="text" id="new-company__tva" name="new-company__tva" required>

        <input type="submit" id="new-company__submit" value="Send new company" onclick="return confirm('Is the encoded information correct ?')">
    </form>
</main>

<?php 
    include VIEWS.'includes/footer.php';
?>