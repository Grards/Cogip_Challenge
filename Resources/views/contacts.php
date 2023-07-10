<?php

use App\Core\DatabaseManager;

    include '../Resources/views/includes/header.php';
?> 
    <main id="main">
        <?php 
            foreach($allContacts as $contact){
                echo "<ul>";
                    echo "<li>$contact[name]</li>";
                    echo "<li>$contact[company_id]</li>";
                    echo "<li>$contact[email]</li>";
                    echo "<li>$contact[phone]</li>";
                    echo "<li>$contact[created_at]</li>";
                    echo "<li>$contact[updated_at]</li>";
                echo "</ul>";
            }
        
            dd($countOfContacts);
            // Accès autorisé pour contacts : id, name, company_id, email, phone, created_at, updated_at
        ?>

        <form action="contacts.php" method="GET">
            <input type="text" name="search" placeholder="Search contact name">
            <input type="submit" id="submit_btn">
        </form>

        <?php
        $db = new DatabaseManager();

        $query = $_GET['query'];
        
        $sql = "SELECT name FROM contacts WHERE name LIKE :query";
        $stmt = $this->db->prepare($sql, ['query' => '%' . $query . '%']);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php if (count($results) > 0): ?>
        <ul>
            <?php foreach ($results as $result): ?>
                <li>
                    <p><?php echo $result['name']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
    </main>
    <footer id="footer">
    </footer>
</body>
</html>