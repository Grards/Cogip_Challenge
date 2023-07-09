<?php
    include '../Resources/views/includes/header.php';
?> 
    <main id="main">
        <?php 
            include VIEWS.'includes/errors.php';

            foreach($contactsLimitedPerPage as $contact){
                echo "<ul>";
                    echo "<li>$contact[name]</li>";
                    echo "<li>$contact[company_id]</li>";
                    echo "<li>$contact[email]</li>";
                    echo "<li>$contact[phone]</li>";
                    echo "<li>$contact[created_at]</li>";
                    echo "<li>$contact[updated_at]</li>";
                echo "</ul>";
            }
            // Accès autorisé pour contacts : id, name, company_id, email, phone, created_at, updated_at            
        ?>
        
        <section class="pagination">
            <?php 
                $link = BASE_URL.'contacts';
                
                if($currentPage > 1):  
                    echo "<a href=" . $link . "?page=" . $currentPage - 1 . " class='pagination__btn'>&lt;</a>";
                endif;

                $pageNumber = 1;
                while($pageNumber <= $pages){
                    if($pageNumber == 1 || $pageNumber == 2 || $pageNumber == $currentPage || $pageNumber == $pages-1 || $pageNumber == $pages){
                        echo $currentPage == $pageNumber ? "<a href=" . $link . "?page=" . $pageNumber . " class='pagination__btn pagination__btn--current_page'>" . $pageNumber . "</a>" : "<a href=" . $link . "?page=" . $pageNumber . " class='pagination__btn'>" . $pageNumber . "</a>";
                    }else{
                        if(($pageNumber <= $pages-2 && $pageNumber == $currentPage+1) || ($pageNumber >= 3 && $pageNumber == $currentPage-1) || ($pageNumber == $currentPage+2) && ($currentPage == 1) || ($pageNumber == $currentPage-2) && ($currentPage == $pages)){
                            echo "<a href=" . $link . "?page=" . $pageNumber . " class=pagination__btn>...</a>";  
                        }
                    }
                    $pageNumber++;
                }

                if($currentPage < $pages): 
                    echo "<a href=" . $link . "?page=" . $currentPage + 1 . " class='pagination__btn'>&gt;</a>";
                endif;
            ?>
        </section>
    </main>
    <footer id="footer">
    </footer>
</body>
</html>