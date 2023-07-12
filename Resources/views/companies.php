<?php

use App\Core\DatabaseManager;

    include VIEWS.'includes/header.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    include VIEWS.'includes/columnSort.php';
?>
<main>
    <div class="table-container withoutSlogan">
        <div id="test-clip">
        </div>
        <div class="table-title">
            <h2>All companies</h2>
        </div>
        <form action="companies" method="GET">
            <input type="text" name="search" placeholder="Search company name">
            <input type="submit" id="submit_btn">
            <!-- Bouton submit à cacher en CSS -->
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
                    <a href="?sort=name&order=asc">Name ▲</a>
                    <a href="?sort=name&order=desc">Name ▼</a>
                </th>
                <!-- Enlever le style des liens en CSS -->
                <th>
                    <a href="?sort=type&order=asc">Type ▲</a>
                    <a href="?sort=type&order=desc">Type ▼</a>
                </th>
                <!-- Enlever le style des liens en CSS -->
                <th>
                    <a href="?sort=country=asc">Country ▲</a>
                    <a href="?sort=country=desc">Country ▼</a>
                </th>
                <!-- Enlever le style des liens en CSS -->
                <th>
                    <a href="?sort=tva=asc">Tva ▲</a>
                    <a href="?sort=tva=desc">Tva ▼</a>
                </th>
                <!-- Enlever le style des liens en CSS -->
                <th>
                    <a href="?sort=created_at=asc">Created at ▲</a>
                    <a href="?sort=created_at=desc">Created at ▼</a>
                </th>
                <!-- Enlever le style des liens en CSS -->
            </thead>
            </thead>
            <?php
            foreach ($companiesLimitedPerPage as $company) {
                $dateFormated = dateFormat($company['companies_created_at']);
                echo "<tr>";
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
<footer id="footer">
</footer>
</body>

</html>