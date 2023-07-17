
<div class="dash-sidebar">
        <section class="dash-sidebar__user_card">
            <img class="user_card--picture" src="<?php echo IMG."contacts/$user[users_picture]"; ?>" alt="User <?php echo "$user[users_first_name]"; ?>'s profil picture">
            <h3 class="user_card--first_name"><?php echo "$user[users_first_name]"; ?></h3>
            <h3 class="user_card--last_name"><?php echo "$user[users_last_name]"; ?></h3>
        </section>

        <section class="dash-sidebar__nav">
            <ul>
                <li class="log--link">
                    <a href="<?php echo BASE_URL.'dashboard'; ?>">
                        <img src="assets\img\sidebar_logo\dashboard_logo.png" alt="dashboard logo">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="log--link">
                    <a href="<?php echo BASE_URL.'dashboard/new-invoice'; ?>">
                        <img src="assets\img\sidebar_logo\invoices_logo.png" alt="invoice logo">
                        <span>Invoices</span>
                    </a>
                </li>
                <li class="log--link">
                    <a href="<?php echo BASE_URL.'dashboard/new-company'; ?>">
                         <img src="assets/img/sidebar_logo/companies_logo.png" alt="logo company">
                        <span>Companies</span>
                    </a>
                </li>
                <li class="log--link">
                    <a href="<?php echo BASE_URL.'dashboard/new-contact'; ?>">
                        <img src="assets\img\sidebar_logo\contacts_logo.png" alt="contacts logo">
                        <span>Contacts</span
                    ></a>
                </li>
            </ul>
        </section>

        <section class="dash-sidebar__log">
            <img class="log--picture" src="<?php echo IMG."contacts/$user[users_picture]"; ?>" alt="User <?php echo "$user[users_first_name]"; ?>'s profil picture">
            <!-- TODO LOGOUT SYSTEM -->
            <p class="log--link"><a href="#">Logout</a></p>
        </section>
</div>

