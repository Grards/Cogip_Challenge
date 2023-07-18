<?php 

    use App\Core\DatabaseManager;

    include VIEWS.'includes/admin/header_admin.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    // include VIEWS.'includes/admin/aside_admin.php';
?>  

<main class="dash-main">
    <!-- dashboard aside container -->
    <?php
        include VIEWS.'includes/admin/sidebar_admin.php';
    ?>
    <form id="new-invoice" action="<?php echo htmlspecialchars(BASE_URL.'dashboard/treatment')?>" method="POST" enctype="multipart/form-data">
    <div class="form-title">
        <p>New Invoice</p>
    </div>
        <input type="hidden" name="new-invoice" value="new-invoice-value">

        <!-- TODO FOR FRONT : put position absolute and left: -99999px for .crud-password -->
        <fieldset class="crud-password">
            <label for="new-invoice__password">Password : </label>
            <input type="text" name="new-invoice__password" tabindex="-1" autocomplete="off">
        </fieldset>

        <label for="new-invoice__ref">Reference : </label>
        <input type="text" id="new-invoice__ref" name="new-invoice__ref"
        placeholder="Reference" required>

        <label for="new-invoice__company">Company : </label>
        <select name="new-invoice__company" id="new-invoice__company" required>
            <option value="">-- Please choose a company --</option>
            <?php 
                foreach($companiesNames as $company){
                    echo "<option value='$company[companies_name]'>$company[companies_name]</option>";
                }
            ?>
        </select>

        <label for="new-invoice__due_date">Due Date : </label>
        <input type="date" id="new-invoice__due_date" name="new-invoice__due_date" required>

        <label for="new-invoice__price">Price ($) : </label>
        <input type="number" id="new-invoice__price" name="new-invoice__price"
        placeholder="Price" 
        required>

        <input type="submit" id="new-invoice__submit" value="Send new invoice" onclick="return confirm('Is the encoded information correct ?')">
    </form>

    <div class="table-container withoutSlogan">
        <div id="test-clip">
        </div>
        <div class="table-title underlined">
            <h2>All invoices</h2>
        </div>
        <form action="<?php echo htmlentities('invoices#dash_invoices_table'); ?>" method="GET">
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

        <table id="dash_invoices_table" class="table">
            <thead class="tableHead">
                <th>
                    Update
                </th>
                <th>
                    Delete
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery?>&sort_field=ref&sort_order=<?php echo ($sortField === 'ref' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Ref <?php echo ($sortField === 'ref') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery?>&sort_field=due_date&sort_order=<?php echo ($sortField === 'due_date' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Due Date <?php echo ($sortField === 'due_date') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery?>&sort_field=companies_name&sort_order=<?php echo ($sortField === 'companies_name' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Company <?php echo ($sortField === 'companies_name') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery?>&sort_field=price&sort_order=<?php echo ($sortField === 'price' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Price <?php echo ($sortField === 'price') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
                <th>
                    <a href="?search=<?php echo $searchQuery?>&sort_field=invoices.created_at&sort_order=<?php echo ($sortField === 'invoices.created_at' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                        Created at <?php echo ($sortField === 'invoices.created_at') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                    </a>
                </th>
            </thead>
            <?php
            foreach ($invoicesLimitedPerPage as $invoice) {
                $dateFormated_created = dateFormat($invoice['invoices_created_at']);
                $dateFormated_due = dateFormat($invoice['invoices_due_date']);
                echo "<tr>";
                    echo "<td><a href='".BASE_URL.'dashboard/update-invoice?id='."$invoice[invoices_id]'><img src='".IMG."dashboard/icons8-create-24.png' alt='Update logo'><a></td>";
                    echo "<td><a href='".BASE_URL.'dashboard/update-invoice?id='."$invoice[invoices_id]'><img src='".IMG."dashboard/icons8-trash-24.png' alt='Update logo'><a></td>";
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