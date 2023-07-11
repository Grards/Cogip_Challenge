<?php

use App\Core\DatabaseManager;

    include VIEWS.'includes/header.php';
    include VIEWS.'includes/pagination.php'; 
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
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
                <th>Invoice number</th>
                <th>Due date</th>
                <th>Company</th>
                <th>Price</th>
                <th>Created at</th>
                </thead>
                <?php
                foreach($invoicesLimitedPerPage as $invoice){
                    $dateFormated = dateFormat($invoice['invoices_created_at']);
                    echo "<tr>";
                    echo "<td>$invoice[invoices_ref]</td>";
                    echo "<td>$invoice[invoices_due_date]</td>";
                    echo "<td>$invoice[companies_name]</td>";
                    echo "<td>$invoice[invoices_price]</td>";
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

        <?php if (!is_null($invoicesLimitedPerPage) && (is_array($invoicesLimitedPerPage) || $invoicesLimitedPerPage instanceof Countable) && count($invoicesLimitedPerPage) > 1): ?>
        <ul>
            <?php foreach ($invoicesLimitedPerPage as $result): ?>
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