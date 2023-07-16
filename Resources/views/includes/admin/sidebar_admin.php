
<div class="dash-sidebar">
        <section class="dash-sidebar__user_card">
            <img class="user_card--picture" src="<?php echo IMG."contacts/$user[users_picture]"; ?>" alt="User <?php echo "$user[users_first_name]"; ?>'s profil picture">
            <h3 class="user_card--first_name"><?php echo "$user[users_first_name]"; ?></h3>
            <h3 class="user_card--last_name"><?php echo "$user[users_last_name]"; ?></h3>
        </section>
        <section class="dash-sidebar__nav">
            <p class="log--link"><a href="<?php echo BASE_URL.'dashboard'; ?>">Dashboard</a></p>
            <p class="log--link"><a href="<?php echo BASE_URL.'dashboard/new-invoice'; ?>">Invoices</a></p>
            <p class="log--link"><a href="<?php echo BASE_URL.'dashboard/new-company'; ?>">Companies</a></p>
            <p class="log--link"><a href="<?php echo BASE_URL.'dashboard/new-contact'; ?>">Contacts</a></p>
        </section>
        <section class="dash-sidebar__log">
            <img class="log--picture" src="<?php echo IMG."contacts/$user[users_picture]"; ?>" alt="User <?php echo "$user[users_first_name]"; ?>'s profil picture">
            <!-- TODO LOGOUT SYSTEM -->
            <p class="log--link"><a href="#">Logout</a></p>
        </section>
</div>

