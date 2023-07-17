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
    <div class="table-title underlined">
      <h2>All contacts</h2>
    </div>
    <form action="contacts" method="GET">
      <input type="text" name="search" placeholder="Search contact">
      <input type="hidden" name="sort" value="<?php echo $_GET['sort_field'] ?? ''; ?>">
      <input type="hidden" name="order" value="<?php echo $_GET['sort_order'] ?? ''; ?>">
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
            <a href="?search=<?php echo $searchQuery ?>&sort_field=contacts_name&sort_order=<?php echo ($sortField === 'contacts_name' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Name <?php echo ($sortField === 'contacts_name') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
        <th>
            <a href="?search=<?php echo $searchQuery ?>&sort_field=contacts_phone&sort_order=<?php echo ($sortField === 'contacts_phone' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Phone <?php echo ($sortField === 'contacts_phone') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
        <th>
            <a href="?search=<?php echo $searchQuery ?>&sort_field=contacts_email&sort_order=<?php echo ($sortField === 'contacts_email' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Email <?php echo ($sortField === 'contacts_email') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
        <th>
            <a href="?search=<?php echo $searchQuery ?>&sort_field=company_id&sort_order=<?php echo ($sortField === 'company_id' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Company <?php echo ($sortField === 'company_id') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
        </th>
        <th>
            <a href="?search=<?php echo $searchQuery ?>&sort_field=contacts_created_at&sort_order=<?php echo ($sortField === 'contacts_created_at' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                Created at <?php echo ($sortField === 'contacts_created_at') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
            </a>
    </th>
          </tr>
        </thead>
      <?php
      foreach ($contactsLimitedPerPage as $contact) {
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
  <?php
    include VIEWS . 'includes/pagination.php';
  ?>
</main>
  <?php
    include 'includes/footer.php';
  ?>
</body>

</html>