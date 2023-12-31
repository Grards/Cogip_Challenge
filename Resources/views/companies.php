<?php

use App\Core\DatabaseManager;

include VIEWS . 'includes/header.php';
include VIEWS . 'includes/errors.php';
include VIEWS . 'includes/dateFormat.php';
include VIEWS . 'includes/columnSort.php';
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
                    <a href="?search=<?php echo $searchQuery ?>&sort_field=companies.name&sort_order=<?php echo ($sortField === 'companies.name' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Name <?php echo ($sortField === 'companies.name') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery ?>&sort_field=type_id&sort_order=<?php echo ($sortField === 'type_id' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Type <?php echo ($sortField === 'type_id') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery ?>&sort_field=country&sort_order=<?php echo ($sortField === 'country' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Country <?php echo ($sortField === 'country') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery ?>&sort_field=tva&sort_order=<?php echo ($sortField === 'tva' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        TVA <?php echo ($sortField === 'tva') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery ?>&sort_field=companies.created_at&sort_order=<?php echo ($sortField === 'companies.created_at' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Created at <?php echo ($sortField === 'companies.created_at') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>

            </thead>
            </thead>
            <?php
            foreach ($companiesLimitedPerPage as $company) {
                $dateFormated = dateFormat($company['companies_created_at']);
                echo "<tr>";
                echo "<td><a href='" . BASE_URL . "companies/details?id=" . ($company['companies_id'] ?? '') . "'>" . $company['companies_name'] . "</a></td>";
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
<?php
include 'includes/footer.php';
?>
</body>

</html>