<?php 
    use App\Core\DatabaseManager;
?>  

<main class="dash_main">
    <!-- dashboard aside container -->
    <?php
     include VIEWS.'includes/admin/sidebar_admin.php';
    ?>
    <!-- dashboard main container -->
    <div class="dashboard-main-container">>
    <h2>Here is the restult</h2>

<?php
    /* ADD CONTACT VERIFICATION */

    // $contact_picture = htmlspecialchars(IMG.'contacts/'.$contact_picture);
    // $contact_name = htmlspecialchars($contact_name);
    // $contact_company = htmlspecialchars($contact_company);
    // $contact_email = htmlspecialchars($contact_email);
    // $contact_phone = htmlspecialchars($contact_phone);
    // $contact_created_at = htmlspecialchars($contact_created_at);

    // echo "<img src='$contact_picture'>";
    // echo "<p>Name : " . $contact_name . "</p>";
    // echo "<p>Company : " . $contact_company . "</p>";
    // echo "<p>Email : " . $contact_email . "</p>";
    // echo "<p>Phone : " . $contact_phone . "</p>";
    // echo "<p>Creation date : " . $contact_created_at . "</p>";


    /* ADD INVOICE VERIFICATION */

    // $invoice_ref = htmlspecialchars($invoice_ref);
    // $invoice_company = htmlspecialchars($invoice_company);
    // $invoice_due_date = htmlspecialchars($invoice_due_date);
    // $invoice_price = htmlspecialchars($invoice_price);
    // $htmlspecialchars = htmlspecialchars($invoice_created_at);

    // echo "<p>Ref : " . $invoice_ref . "</p>";
    // echo "<p>Company : " . $invoice_company . "</p>";
    // echo "<p>Due Date : " . $invoice_due_date . "</p>";
    // echo "<p>Price : " . $invoice_price . "</p>";
    // echo "<p>Creation date : " . $invoice_created_at . "</p>";


    /* ADD COMPANY VERIFICATION */

    // $company_name = htmlspecialchars($company_name);
    // $company_type = htmlspecialchars($company_type);
    // $company_country = htmlspecialchars($company_country);
    // $company_tva = htmlspecialchars($company_tva);
    // $company_created_at = htmlspecialchars($company_created_at);

    // echo "<p>Name : " . $company_name . "</p>";
    // echo "<p>Type : " . $company_type . "</p>";
    // echo "<p>Country : " . $company_country . "</p>";
    // echo "<p>Tva : " . $company_tva . "</p>";
    // echo "<p>Creation date : " . $company_created_at . "</p>";
?>
    </div>
</main>