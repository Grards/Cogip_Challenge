  <?php
    include 'includes/header.php';
  ?>  
    <main id="main">
      <?php 
        foreach($companies as $company){
          echo "<li>$company[name]</li>";
          print_r($company);
        }
      ?>

    </main>
    <footer id="footer">
    </footer>
</body>
</html>

