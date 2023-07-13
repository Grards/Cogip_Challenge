<?php

use App\Core\DatabaseManager;

  include VIEWS.'includes/header.php';
  include VIEWS.'includes/errors.php';
  include VIEWS.'includes/dateFormat.php';
  include VIEWS.'includes/columnSort.php';
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
    <form action="contacts" method="GET">
      <input type="text" name="search" placeholder="Search contact">
      <input type="submit" id="submit_btn">
    </form>

    <?php if (!is_null($contactsLimitedPerPage) && count($contactsLimitedPerPage) > 0) : ?>
        <?php foreach ($contactsLimitedPerPage as $result) : ?>
        <?php endforeach; ?>
    <?php else : ?>
      <p>No results found.</p>
    <?php endif; ?>
    <table class="table">
      <thead class="tableHead">
      <th>
      <!----------------------------------- Enlever le style des liens ci dessous en CSS please :) --------------------------->
            <a href="?sort_field=name&sort_order=<?php echo ($sortField === 'name' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Name <?php echo ($sortField === 'name') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
        <th>
            <a href="?sort_field=phone&sort_order=<?php echo ($sortField === 'phone' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Phone <?php echo ($sortField === 'phone') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
        <th>
            <a href="?sort_field=email&sort_order=<?php echo ($sortField === 'email' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Email <?php echo ($sortField === 'email') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
        <th>
            <a href="?sort_field=company_id&sort_order=<?php echo ($sortField === 'company_id' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Company <?php echo ($sortField === 'company_id') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
        <th>
            <a href="?sort_field=created_at&sort_order=<?php echo ($sortField === 'created_at' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Created at <?php echo ($sortField === 'created_at') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
    </th>
          </tr>
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