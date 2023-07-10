<?php
    include '../Resources/views/includes/header.php';
    include VIEWS.'includes/errors.php';
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
            <th>Name</th>
            <th>Phone</th>
            <th>Mail</th>
            <th>Company</th>
            <th>Created at</th>
          </thead>
          <?php
            foreach($contactsLimitedPerPage as $contact){
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
    <?php
      include VIEWS.'includes/pagination.php'; 
    ?>







        <?php 
            // include VIEWS.'includes/errors.php';

            // foreach($contactsLimitedPerPage as $contact){
            //     echo "<ul>";
            //         echo "<li>$contact[name]</li>";
            //         echo "<li>$contact[company_id]</li>";
            //         echo "<li>$contact[email]</li>";
            //         echo "<li>$contact[phone]</li>";
            //         echo "<li>$contact[created_at]</li>";
            //         echo "<li>$contact[updated_at]</li>";
            //     echo "</ul>";
            // }
            // // Accès autorisé pour contacts : id, name, company_id, email, phone, created_at, updated_at
            
            // include VIEWS.'includes/pagination.php';           
        ?>
    </main>
    <footer id="footer">
    </footer>
</body>
</html>