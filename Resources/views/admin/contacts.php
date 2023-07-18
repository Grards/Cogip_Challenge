<?php 

    use App\Core\DatabaseManager;

    include VIEWS.'includes/admin/header_admin.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    // include VIEWS.'includes/admin/aside_admin.php';
?>  

<main>
    <!-- dashboard aside container -->
        <?php
             include VIEWS.'includes/admin/sidebar_admin.php';
        ?>
    <form id="new-contact" action="<?php echo htmlspecialchars(BASE_URL.'dashboard/treatment')?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="new-contact" value="new-contact-value">

        <!-- TODO FOR FRONT : put position absolute and left: -99999px for .crud-password -->
        <fieldset class="crud-password">
            <label for="new-contact__password">Password : </label>
            <input type="text" name="new-contact__password" tabindex="-1" autocomplete="off">
        </fieldset>

        <label for="new-contact__picture">Picture : </label>
        <input type="file" id="new-contact__picture" name="new-contact__picture" max=255 accept="image/png, image/jpeg, image/jpg">

        <label for="new-contact__name">Complete name : </label>
        <input type="text" id="new-contact__name" name="new-contact__name" min=3 max=50 required>

        <label for="new-contact__company">Company : </label>
        <select name="new-contact__company" id="new-contact__company">
            <option value="">-- Please choose a company --</option>
            <?php 
                foreach($companiesNames as $company){
                    echo "<option value='$company[companies_name]'>$company[companies_name]</option>";
                }
            ?>
        </select>

        <label for="email">Email : </label>
        <input type="email" id="new-contact__email" name="new-contact__email" min=8 max=50 required>

        <label for="new-contact__phone">Phone : </label>
        <input type="tel" id="new-contact__phone" name="new-contact__phone" min=10 max=50 required>

        <input type="submit" id="new-contact__submit" value="Send new contact" onclick="return confirm('Is the encoded information correct ?')">
    </form>

    <div class="table-title underlined">
        <h2>All contacts</h2>
    </div>
    <form action="contacts" method="GET">
        <input type="text" name="search" placeholder="Search contact" class="submit_input">
        <input type="hidden" name="sort" value="<?php echo $_GET['sort_field'] ?? ''; ?>">
        <input type="hidden" name="order" value="<?php echo $_GET['sort_order'] ?? ''; ?>">
        <input type="submit" class="submit_btn">
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
                Update
            </th> 
            <th>
                Delete
            </th>
            <th>
                <a href="?search=<?php echo $searchQuery ?>&sort_field=dashboard/contacts_name&sort_order=<?php echo ($sortField === 'contacts_name' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                    Name <?php echo ($sortField === 'contacts_name') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                </a>
            </th>
            <th>
                <a href="?search=<?php echo $searchQuery ?>&sort_field=dashboard/contacts_phone&sort_order=<?php echo ($sortField === 'contacts_phone' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                    Phone <?php echo ($sortField === 'contacts_phone') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                </a>
            </th>
            <th>
                <a href="?search=<?php echo $searchQuery ?>&sort_field=dashboard/contacts_email&sort_order=<?php echo ($sortField === 'contacts_email' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                    Email <?php echo ($sortField === 'contacts_email') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                </a>
            </th>
            <th>
                <a href="?search=<?php echo $searchQuery ?>&sort_field=dashboard/company_id&sort_order=<?php echo ($sortField === 'company_id' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                    Company <?php echo ($sortField === 'company_id') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                </a>
            </th>
            <th>
                <a href="?search=<?php echo $searchQuery ?>&sort_field=dashboard/contacts_created_at&sort_order=<?php echo ($sortField === 'contacts_created_at' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">
                    Created at <?php echo ($sortField === 'contacts_created_at') ? ($sortOrder === 'asc' ? '▲' : '▼') : ''; ?>
                </a>
            </th>
        </thead>
    <?php
        foreach ($contactsLimitedPerPage as $contact) {
        $dateFormated = dateFormat($contact['contacts_created_at']);
        echo "<tr>";
            echo "<td><a href='".BASE_URL.'dashboard/update-contact?id='."$contact[contacts_id]'><img src='".IMG."dashboard/icons8-create-24.png' alt='Update logo'><a></td>";
            echo "<td><a href='".BASE_URL.'dashboard/delete-contact?id='."$contact[contacts_id]'><img src='".IMG."dashboard/icons8-trash-24.png' alt='Delete logo' onclick=\"return confirm('Are you sure you want to delete this entry?')\"><a></td>";
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