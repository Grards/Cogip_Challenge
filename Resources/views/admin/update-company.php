
<?php
    use App\Core\DatabaseManager;

    include VIEWS.'includes/admin/header_admin.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    include VIEWS.'includes/admin/sidebar_admin.php';
    include VIEWS.'includes/countriesList.php';
?>  

<main>
    <?php 
        if($crud === 'update_company' && $idCompany > 0 && $idCompany <= $countOfCompanies && isset($company['companies_id'])){
            $company_id = filter_var(htmlspecialchars($idCompany), FILTER_SANITIZE_NUMBER_INT);
            $company_name = htmlspecialchars($company['companies_name']);
            $company_type = htmlspecialchars($company['types_name']);
            $company_country = htmlspecialchars($company['companies_country']);
            $company_tva = htmlspecialchars($company['companies_tva']);
            $company_created_at = htmlspecialchars($company['companies_created_at']);
            $company_updated_at = htmlspecialchars($company['companies_updated_at']);
    ?>
            <p>Creation date : <?= $company_created_at; ?> </p>
            <p>Last update : <?= $company_updated_at; ?> </p>

            <form id="update-company" action="<?php echo htmlspecialchars(BASE_URL.'dashboard/treatment')?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="update-company" value="update-company-value">
                <input type="hidden" name="update-company__id" value="<?= $idCompany ?>">

                <!-- TODO FOR FRONT : put position absolute and left: -99999px for .crud-password -->
                <fieldset class="crud-password">
                    <label for="update-company__password">Password : </label>
                    <input type="text" name="update-company__password" tabindex="-1" autocomplete="off">
                </fieldset>

                <label for="update-company__name">Name : </label>
                <input type="text" id="update-company__name" name="update-company__name" min=3 max=50 value="<?= $company_name ?>" required>

                <label for="update-company__type">Type : </label>
                <select name="update-company__type" id="update-company__type" required>
                    <option value="">-- Please choose a type of company --</option>
                    <?php 
                        foreach($typesNames as $type){
                            if("$type[types_name]" == $company_type){
                                echo "<option value='$type[types_name]' selected=selected>$type[types_name]</option>";
                            }else{
                                echo "<option value='$type[types_name]'>$type[types_name]</option>";
                            }
                        }
                    ?>
                </select>

                <select name="update-company__country" id="update-company__country" required>
                    <option value="">-- Please choose a country for the company --</option>
                    <?php 
                        foreach($country_list as $iso => $country){
                            if("$company[companies_country]" == $country){
                                echo "<option value='$country' selected=selected>$iso - $country</option>";
                            }else{
                                echo "<option value='$country'>$iso - $country</option>";
                            }
                        }
                    ?>
                </select>

                <label for="update-company__tva">Tva : </label>
                <input type="text" id="update-company__tva" name="update-company__tva" min=10 max=50 value="<?= $company_tva ?>" required>

                <input type="submit" id="update-company__submit" value="Send update company" onclick="return confirm('Is the encoded information correct ?')">
            </form>
    <?php
        }else{
            echo "<p>".NO_ENTRY." Contact the administrator.</p>";
            echo "<p><a href='".BASE_URL."dashboard'>Return to Dashboard</a></p>";
        }
    ?>

</main>