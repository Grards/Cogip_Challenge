<?php
    include 'includes/header.php';
?> 
    <main id="main">
<?php

    foreach($invoices as $invoice){
          echo "<li>$invoice[ref]</li>";
        //   echo "<li>$invoice[due_date]</li>";
          echo "<li>$invoice[company]</li>";
          echo "<li>$invoice[created_at]</li>";
        }
?>

    </main>
    <footer id="footer">
    </footer>
</body>
</html>