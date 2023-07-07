<?php

?>
<div id="invoices-container">
<div id="test-clip">
        dfsdfsdfsdfsd
</div>
    <div id="invoices-title">
        <h2>Last invoices</h2>
    </div>
        <table id="invoices-table">
                <thead>
                    <th>Invoice Number</th>
                    <th>Dates due</th>
                    <th>Company</th>
                    <th>Created at</th>
                </thead>
                <?php
                    foreach($invoices as $invoice){
                        echo "<tr>";
                        echo "<td>$invoice[ref]</td>";
                        echo "<td>$invoice[due_date]</td>";
                        echo "<td>$invoice[id_company]</td>";
                        echo "<td>$invoice[created_at]</td>";
                        echo "</tr>";
                    }
                ?>
        </table> 
</div>