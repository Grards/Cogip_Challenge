<?php

use App\Core\DatabaseManager;

    include VIEWS.'includes/header.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
?>
<main>
    <div class="table-shape">
        <div class="test-clip">
        </div>
    </div>
    <div class="table-container withoutSlogan">
        <div id="test-clip">
        </div>
        <div class="table-title">
            <h2>All companies</h2>
        </div>
        <form action="invoices" method="GET">
            <input type="text" name="search" placeholder="Search company" id="submit_input">
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
                <th>Name</th>
                <th>Type</th>
                <th>Country</th>
                <th>Tva</th>
                <th>Created at</th>
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
    <?php
        include 'includes/footer.php';
    ?>
</body>

</html>