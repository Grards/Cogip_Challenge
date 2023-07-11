<?php

use App\Core\DatabaseManager;

    include '../Resources/views/includes/header.php';
    include VIEWS.'includes/pagination.php'; 
    include VIEWS.'includes/errors.php';
    include 'includes/dateFormat.php';
?> 
    <main>
        <div class="table-container withoutSlogan">
            <div id="test-clip">
            </div>
            <div class="table-title">
                <h2>All contacts</h2>
            </div>
            <table class="table">
                <thead class="tableHead">
                <th>Name</th>
                <th>Type</th>
                <th>Country</th>
                <th>Tva</th>
                <th>Created at</th>
                </thead>
                <?php
                foreach($companiesLimitedPerPage as $company){
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

        <form action="contacts" method="GET">
            <input type="text" name="search" placeholder="Search company name">
            <input type="submit" id="submit_btn">
        </form>

        <?php if (!is_null($companiesLimitedPerPage) && (is_array($companiesLimitedPerPage) || $companiesLimitedPerPage instanceof Countable) && count($companiesLimitedPerPage) > 1): ?>
        <ul>
            <?php foreach ($companiesLimitedPerPage as $result): ?>
                <li>
                    <p><?php echo $result['companies_name']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    </main>
    <footer id="footer">
    </footer>
    </body>
</html>