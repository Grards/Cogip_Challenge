<?php 

    use App\Core\DatabaseManager;

    include VIEWS.'includes/admin/header_admin.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    // include VIEWS.'includes/admin/aside_admin.php';
?>  

<main class="dash_main">
    <!-- dashboard aside container -->
    <?php
     include VIEWS.'includes/admin/sidebar_admin.php';
    ?>
    <!-- dashboard main container -->
    <div class="dashboard-main-container">
        <nav class="breadcrumb">
            <h2>Dashboard</h2>
            <a href="#"><?php echo breadcrumb(); ?></a>
        </nav>

        <article class ="stats">
            <h2 class="stats__title">Statistics</h2>
            <section class="stats__informations">

                <ul class="stats__informations--invoices">
                    <li class="invoices--total"><?= $statsInvoices ?></li>
                    <li class="invoices--text">Invoices</li>
                </ul>

                <ul class="stats__informations--contacts">
                    <li class="contacts--total"><?= $statsContacts ?></li>
                    <li class="contacts--text">Contacts</li>
                </ul>

                <ul class="stats__informations--companies">
                    <li class="companies--total"><?= $statsCompanies ?></li>
                    <li class="companies--text">Companies</li>
                </ul>

            </section>
        </article>


        <!-- Last Invoices -->
        <div class="table-container-dashboard">
            <div class="table-title">
                <h2>Last invoices</h2>
            </div>
            <table class="table">
                <thead class="tableHead">
                    <th>Invoice Number</th>
                    <th>Dates due</th>
                    <th>Company</th>
                </thead>
                <?php

                foreach($invoices as $invoice){
                    $dateFormated_due = dateFormat($invoice['invoices_due_date']);
                    echo "<tr>";
                    echo "<td>$invoice[invoices_ref]</td>";
                    echo "<td>$dateFormated_due</td>";
                    echo "<td>$invoice[companies_name]</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>  

        <!-- Last Contacts -->
        <div class="table-container-dashboard">
            <div class="table-title">
                <h2>Last contacts</h2>
            </div>
            <table class="table">
                <thead class="tableHead">
                <th>Name</th>
                <th>Phone</th>
                <th>Mail</th>
                </thead>
                <?php
                foreach($contacts as $contact){
                    echo "<tr>";
                    echo "<td>$contact[contacts_name]</td>";
                    echo "<td>$contact[contacts_phone]</td>";
                    echo "<td>$contact[contacts_email]</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <!-- Last companies -->
        <div class="table-container-dashboard">
            <div class="table-title">
                <h2>Last companies</h2>
            </div>
            <table class="table">
                <thead class="tableHead">
                <th>Name</th>
                <th>TVA</th>
                <th>Country</th>
                </thead>
                <?php
                foreach($companies as $company){;
                    echo "<tr>";
                    echo "<td>$company[companies_name]</td>";
                    echo "<td>$company[companies_tva]</td>";
                    echo "<td>$company[companies_country]</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>  
    </div>
    
</main>