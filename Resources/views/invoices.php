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
            <h2>All invoices</h2>
        </div>
        <form action="invoices" method="GET">
            <input type="text" name="search" placeholder="Search company" class="submit_input">
            <input type="hidden" name="sort" value="<?php echo $_GET['sort_field'] ?? ''; ?>">
            <input type="hidden" name="order" value="<?php echo $_GET['sort_order'] ?? ''; ?>">
            <input type="submit" class="submit_btn">
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
                    <a href="?search=<?php echo $searchQuery ?>&sort_field=ref&sort_order=<?php echo ($sortField === 'ref' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Ref <?php echo ($sortField === 'ref') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery ?>&sort_field=due_date&sort_order=<?php echo ($sortField === 'due_date' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Due Date <?php echo ($sortField === 'due_date') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery ?>&sort_field=companies_name&sort_order=<?php echo ($sortField === 'companies_name' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Company <?php echo ($sortField === 'companies_name') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery ?>&sort_field=price&sort_order=<?php echo ($sortField === 'price' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Price <?php echo ($sortField === 'price') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery ?>&sort_field=invoices.created_at&sort_order=<?php echo ($sortField === 'invoices.created_at' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Created at <?php echo ($sortField === 'invoices.created_at') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
            </thead>
            <?php
            foreach ($invoicesLimitedPerPage as $invoice) {
                $dateFormated_created = dateFormat($invoice['invoices_created_at']);
                $dateFormated_due = dateFormat($invoice['invoices_due_date']);
                echo "<tr>";
                echo "<td><a href='" . BASE_URL . "invoices/details?id=" . ($invoice['invoices_id'] ?? '') . "'>" . $invoice['invoices_ref'] . "</a></td>";
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
<?php
include 'includes/footer.php';
?>
</body>