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
            <h2>All invoices</h2>
        </div>
        <form action="invoices" method="GET">
            <input type="text" name="search" placeholder="Search company">
            <input type="submit" id="submit_btn">
        </form>

        <?php if (!is_null($invoicesLimitedPerPage) && count($invoicesLimitedPerPage) > 0) : ?>
            <?php foreach ($invoicesLimitedPerPage as $result) : ?>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No results found.</p>
        <?php endif; ?>

        <table class="table">
            <thead class="tableHead">
                <th>
                <!----------------------------------- Enlever le style des liens ci dessous en CSS please :) --------------------------->
            <a href="?sort_field=ref&sort_order=<?php echo ($sortField === 'ref' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Ref <?php echo ($sortField === 'ref') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
        <th>
            <a href="?sort_field=due_date&sort_order=<?php echo ($sortField === 'due_date' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Due Date <?php echo ($sortField === 'due_date') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
        <th>
            <a href="?sort_field=companies_name&sort_order=<?php echo ($sortField === 'companies_name' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Company <?php echo ($sortField === 'companies_name') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
        <th>
            <a href="?sort_field=price&sort_order=<?php echo ($sortField === 'price' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Price <?php echo ($sortField === 'price') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
        <th>
            <a href="?sort_field=invoices.created_at&sort_order=<?php echo ($sortField === 'invoices.created_at' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Created at <?php echo ($sortField === 'invoices.created_at') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
            </thead>
            <?php
            foreach ($invoicesLimitedPerPage as $invoice) {
                $dateFormated_created = dateFormat($invoice['invoices_created_at']);
                $dateFormated_due = dateFormat($invoice['invoices_due_date']);
                echo "<tr>";
                echo "<td>$invoice[invoices_ref]</td>";
                echo "<td>$dateFormated_due</td>";
                echo "<td>$invoice[companies_name]</td>";
                echo "<td>$invoice[invoices_price]</td>";
                echo "<td>$dateFormated_created</td>";
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