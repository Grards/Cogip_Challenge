<?php 
    use App\Core\DatabaseManager;
?>  

<main class="dash_main">
    <h2>Here is the restult</h2>

<?php
    var_dump(IMG.'contacts/'.$contact_picture);
    $contact_picture = IMG.'contacts/'.$contact_picture;

    echo "<img src='$contact_picture'>";

    echo "<p>Name : " . $contact_name . "</p>";
    echo "<p>Company : " . $contact_company . "</p>";
    echo "<p>Email : " . $contact_email . "</p>";
    echo "<p>Phone : " . $contact_phone . "</p>";
    echo "<p>Creation date : " . $contact_created_at . "</p>";
?>

</main>