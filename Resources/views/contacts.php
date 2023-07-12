<?php

use App\Core\DatabaseManager;

  include VIEWS.'includes/header.php';
  include VIEWS.'includes/errors.php';
  include VIEWS.'includes/dateFormat.php';
?>
<main>
      <div class="table-shape">
        <div class="test-clip">
        </div>
      </div>
  <div class="table-container withoutSlogan">
    <div class="table-title">
      <h2>All contacts</h2>
    </div>
    <form action="invoices" method="GET">
            <input type="text" name="search" placeholder="Search company" id="submit_input">
            <input type="submit" id="submit_btn">
            <!-- Bouton submit à cacher en CSS -->
    </form>
    
    <?php if (!is_null($contactsLimitedPerPage) && count($contactsLimitedPerPage) > 0) : ?>
        <?php foreach ($contactsLimitedPerPage as $result) : ?>
        <?php endforeach; ?>
    <?php else : ?>
      <p>No results found.</p>
    <?php endif; ?>

    <table class="table">
      <thead class="tableHead">
        <th>Name</th>
        <th>Phone</th>
        <th>Mail</th>
        <th>Company</th>
        <th>Created at</th>
      </thead>
      <?php
      foreach ($contactsLimitedPerPage as $contact) {
        $dateFormated = dateFormat($contact['created_at']);
        echo "<tr>";
        echo "<td>$contact[name]</td>";
        echo "<td>$contact[phone]</td>";
        echo "<td>$contact[email]</td>";
        echo "<td>$contact[company_id]</td>";
        echo "<td>$dateFormated</td>";
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

</html>