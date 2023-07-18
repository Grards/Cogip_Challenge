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
    <div class="form-title">
        <p>New Company</p>
    </div>    
    <input type="hidden" name="new-company" value="new-company-value">

        <!-- TODO FOR FRONT : put position absolute and left: -99999px for .crud-password -->
        <fieldset class="crud-password">
            <label for="new-company__password">Password : </label>
            <input type="text" name="new-company__password" tabindex="-1" autocomplete="off">
        </fieldset>

        <label for="new-company__name">Name : </label>
        <input type="text" id="new-company__name" name="new-company__name" min=3 max=50 placeholder="Name " required>

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
        <input type="text" id="new-company__tva" name="new-company__tva" min=8 max=50 placeholder="TVA "required>

        <input type="submit" id="new-company__submit" value="Send new company" onclick="return confirm('Is the encoded information correct ?')">
    </form>

    <div class="table-container withoutSlogan">
        <div id="test-clip">
        </div>
        <div class="table-title underlined">
            <h2>All companies</h2>
        </div>
        <form action="companies" method="GET">
            <input type="text" name="search" placeholder="Search company name" class="submit_input">
            <input type="hidden" name="sort" value="<?php echo $_GET['sort_field'] ?? ''; ?>">
            <input type="hidden" name="order" value="<?php echo $_GET['sort_order'] ?? ''; ?>">
            <input type="submit" class="submit_btn">
        </form>

        <?php if (!is_null($companiesLimitedPerPage) && count($companiesLimitedPerPage) > 0) : ?>
            <?php foreach ($companiesLimitedPerPage as $result) : ?>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No results found.</p>
        <?php endif; ?>

        <table class="table">
            <thead class="tableHead"> 
                <th>
                    Update
                </th> 
                <th>
                    Delete
                </th>
                <th>
                <a href="?search=<?php echo $searchQuery?>&sort_field=companies.name&sort_order=<?php echo ($sortField === 'companies.name' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                    Name <?php echo ($sortField === 'companies.name') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery?>&sort_field=type_id&sort_order=<?php echo ($sortField === 'type_id' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Type <?php echo ($sortField === 'type_id') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery?>&sort_field=country&sort_order=<?php echo ($sortField === 'country' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Country <?php echo ($sortField === 'country') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>    
                    <a href="?search=<?php echo $searchQuery?>&sort_field=tva&sort_order=<?php echo ($sortField === 'tva' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        TVA <?php echo ($sortField === 'tva') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery?>&sort_field=companies.created_at&sort_order=<?php echo ($sortField === 'companies.created_at' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Created at <?php echo ($sortField === 'companies.created_at') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
            </thead>
            <?php
            foreach ($companiesLimitedPerPage as $company) {
                $dateFormated = dateFormat($company['companies_created_at']);
                echo "<tr>";
                    echo "<td><a href='".BASE_URL.'dashboard/update-company?id='."$company[companies_id]'><img src='".IMG."dashboard/icons8-create-24.png' alt='Update logo'><a></td>";
                    echo "<td><a href='".BASE_URL.'dashboard/delete-company?id='."$company[companies_id]'><img src='".IMG."dashboard/icons8-trash-24.png' alt='Delete logo' onclick=\"return confirm('Are you sure you want to delete this entry?')\"><a></td>";
                    echo "<td>$company[companies_name]</td>";
                    echo "<td>$company[types_name]</td>";
                    echo "<td>$company[companies_country]</td>";
                    echo "<td>$company[companies_tva]</td>";
                    echo "<td>$dateFormated</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <?php
    include VIEWS . 'includes/pagination.php';
    ?>
</main>