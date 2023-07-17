<?php 
    define('ERROR_PAGE', "<p class='error_page'>This page doesn't exist</p>");
    define('CRUD_SUCCESS', "<p class='error_page'>Thank you for submission!</p>");
    define('NO_ENTRY', "<p class='error_page'>This entry doesn't exist !</p>");

    if(isset($_GET['error_page'])){
        echo ERROR_PAGE;
    }
    if(isset($_GET['crud-success'])){
        echo CRUD_SUCCESS;
    }
    if(isset($_GET['no-entry'])){
        echo NO_ENTRY;
    }
?>