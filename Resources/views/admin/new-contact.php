<?php 

    use App\Core\DatabaseManager;

    include VIEWS.'includes/admin/header_admin.php';
    include VIEWS.'includes/errors.php';
    include VIEWS.'includes/dateFormat.php';
    include VIEWS.'includes/admin/aside_admin.php';
?>  

<main>
    <form id="new-contact" action="treatment" method="POST">
        <label for="new-contact__picture">Picture : </label>
        <input type="file" id="new-contact__picture" name="new-contact__picture">

        <label for="new-contact__name">Complete name : </label>
        <input type="text" id="new-contact__name" name="new-contact__name" required>

        <label for="new-contact__company">Company : </label>
        <input type="text" id="new-contact__company" name="new-contact__company">

        <label for="email">Email : </label>
        <input type="email" id="new-contact__email" name="new-contact__email" required>

        <label for="new-contact__phone">Phone : </label>
        <input type="number" id="new-contact__phone" name="new-contact__phone" required>

        <input type="submit" id="new-contact__submit" value="Send new contact">
    </form>
</main>

<?php 
    include VIEWS.'includes/footer.php';
?>