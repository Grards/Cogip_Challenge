  <?php
    include 'includes/header.php';
    include 'includes/slogan.php';
  ?>  
    <main id="main">
      <?php 
        // foreach($companies as $company){
        //   echo "<li>$company[name]</li>";
        //   print_r($company);
        // }
      ?>
    <script>
      let companiesArray = <?= json_encode($companies) ?>;
        displayArray(companiesArray);
    </script>
    </main>
    <footer id="footer">
    </footer>
</body>
<?php
include 'includes/footer.php';
?>
</html>

