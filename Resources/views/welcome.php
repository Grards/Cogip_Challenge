  <?php
    include 'includes/header.php';
    include 'includes/slogan.php';
    include 'includes/displayArray.php';
  ?>  
    <main id="main">
      <?php
        foreach($invoices as $invoice){
          // echo "<li>$invoice[ref]</li>";
          // echo "<li>$invoice[updated_at]</li>";
          // echo "<li>$invoice[id_company]</li>";
          // echo "<li>$invoice[created_at]</li>";
        }
        // Accès autorisé pour invoices : id, ref, id_company, created_at, updated_at, due_date, price

        foreach($contacts as $contact){
          // echo "<li>$contact[name]</li>";
        }

        // Accès autorisé pour contacts : id, name, company_id, email, phone, created_at, updated_at

        foreach($companies as $company){
          // echo "<li>$company[name]</li>";
        }

        // Accès autorisé pour companies : id, name, type_id, country, tva, created_at, updated_at
      ?>
    </main>
</body>
<?php
// include 'includes/footer.php';
?>

