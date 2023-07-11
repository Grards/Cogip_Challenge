<?php

use App\Core\DatabaseManager;

include '../Resources/views/includes/header.php';
include VIEWS . 'includes/errors.php';
?>
<main>

  <div class="table-container withoutSlogan">
    <div class="yellow-submarine"></div>
    <div class="test-clip">
    </div>
    <div class="table-title">
      <h2>All contacts</h2>
    </div>
    <form action="contacts" method="GET">
      <input type="text" name="search" placeholder="Search contact">
      <input type="submit" id="submit_btn">
      <!-- Bouton submit à cacher en CSS -->
    </form>
    
    <?php if (!is_null($contactsLimitedPerPage) && count($contactsLimitedPerPage) > 1) : ?>
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
    include VIEWS . 'includes/pagination.php';
  ?>
</main>
<footer id="footer">
</footer>
</body>

</html>