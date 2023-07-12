  <?php
    include VIEWS.'includes/header.php';
    include VIEWS.'includes/slogan.php';
    include VIEWS.'includes/dateFormat.php';
  ?>  
    <main id="main">
    
    <!-- Last Invoices -->
    <div class="table-container top">
      <div class="table-title">
          <h2>Last invoices</h2>
      </div>
        <table class="table">
          <thead class="tableHead">
            <th>Invoice Number</th>
            <th>Dates due</th>
            <th>Company</th>
            <th>Created at</th>
          </thead>
          <?php

            foreach($invoices as $invoice){
              $dateFormated_due = dateFormat($invoice['invoices_due_date']);
              $dateFormated_created = dateFormat($invoice['invoices_created_at']);
              echo "<tr>";
              echo "<td>$invoice[invoices_ref]</td>";
              echo "<td>$dateFormated_due</td>";
              echo "<td>$invoice[companies_name]</td>";
              echo "<td>$dateFormated_created</td>";
              echo "</tr>";
            }
          ?>
        </table>
    </div>  
    
    <!-- Last Contacts -->
    <div class="table-container">
      <div class="table-title">
          <h2>Last contacts</h2>
      </div>
        <table class="table">
          <thead class="tableHead">
            <th>Name</th>
            <th>Phone</th>
            <th>Mail</th>
            <th>Company</th>
            <th>Created at</th>
          </thead>
          <?php
            foreach($contacts as $contact){
              $dateFormated = dateFormat($contact['contacts_created_at']);
              echo "<tr>";
              echo "<td>$contact[contacts_name]</td>";
              echo "<td>$contact[contacts_phone]</td>";
              echo "<td>$contact[contacts_email]</td>";
              echo "<td>$contact[companies_name]</td>";
              echo "<td>$dateFormated</td>";
              echo "</tr>";
            }
          ?>
        </table>
    </div>

    <!-- Last companies -->
    <div class="table-container">
      <div class="table-title">
          <h2>Last companies</h2>
      </div>
        <table class="table">
          <thead class="tableHead">
            <th>Name</th>
            <th>TVA</th>
            <th>Country</th>
            <th>Type</th>
            <th>Created at</th>
          </thead>
          <?php
            foreach($companies as $company){
              $dateFormated = dateFormat($company['companies_created_at']);
              echo "<tr>";
              echo "<td>$company[companies_name]</td>";
              echo "<td>$company[companies_tva]</td>";
              echo "<td>$company[companies_country]</td>";
              echo "<td>$company[types_name]</td>";
              echo "<td>$dateFormated</td>";
              echo "</tr>";
            }
          ?>
        </table>
    </div>  
      


      
      
      <?php 
        // Accès autorisé pour invoices : id, ref, id_company, created_at, updated_at, due_date, price

        // Accès autorisé pour contacts : id, name, company_id, email, phone, created_at, updated_at

        // Accès autorisé pour companies : id, name, type_id, country, tva, created_at, updated_at
      ?>
    </main>
</body>
<?php
include 'includes/footer.php';
?>

