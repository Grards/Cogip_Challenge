  <?php
    include 'includes/header.php';
    include 'includes/slogan.php';
  ?>  
    <main id="main">
    
    <!-- Last Invoices -->
    <div class="table-container top">
        <div id="test-clip">
        </div>
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
    
    <!-- Last Contacts -->
    <div class="table-container">
        <div id="test-clip">
        </div>
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
              echo "<tr>";
              echo "<td>$contact[name]</td>";
              echo "<td>$contact[phone]</td>";
              echo "<td>$contact[email]</td>";
              echo "<td>$contact[company_id]</td>";
              echo "<td>$contact[created_at]</td>";
              echo "</tr>";
            }
          ?>
        </table>
    </div>

    <!-- Last companies -->
    <div class="table-container">
        <div id="test-clip">
        </div>
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
              echo "<tr>";
              echo "<td>$company[name]</td>";
              echo "<td>$company[tva]</td>";
              echo "<td>$company[country]</td>";
              echo "<td>$company[type_id]</td>";
              echo "<td>$company[created_at]</td>";
              echo "</tr>";
            }
          ?>
        </table>
    </div>  
      


      
      
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
include 'includes/footer.php';
?>

