  <?php
    include 'includes/header.php';
    include 'includes/slogan.php';
  ?>  
    <main id="main">
      <?php 

      foreach($invoices as $invoice){
          echo "<li>$invoice[ref]</li>";
        }

        // Accès autorisé pour invoices : id, ref, id_company, created_at, updated_at

        foreach($contacts as $contact){
          echo "<li>$contact[name]</li>";
        }

        // Accès autorisé pour contacts : id, name, company_id, email, phone, created_at, updated_at

        foreach($companies as $company){
          echo "<li>$company[name]</li>";
        }

        // Accès autorisé pour companies : id, name, type_id, country, tva, created_at, updated_at

      ?>
    </main>
    <footer id="footer">
    </footer>
</body>
<?php
include 'includes/footer.php';
?>
</html>

