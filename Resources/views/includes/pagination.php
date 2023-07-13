<?php 
    echo "<section class='pagination'>";
        $link = BASE_URL.'contacts';
        
        if($currentPage > 1):  
            echo "<a href=" . $link . "?page=" . ($currentPage - 1) . "&search=" . $searchQuery . "&sort=" . $sortField . "&order=" . $sortOrder . " class='pagination__btn'>&lt;</a>";
        endif;

        $pageNumber = 1;
        while($pageNumber <= $pages){
            if($pageNumber == 1 || $pageNumber == 2 || $pageNumber == $currentPage || $pageNumber == $pages-1 || $pageNumber == $pages){
                echo $currentPage == $pageNumber ? "<a href=" . $link . "?page=" . $pageNumber . "&search=" . $searchQuery . "&sort=" . $sortField . "&order=" . $sortOrder . " class='pagination__btn pagination__btn--current_page'>" . $pageNumber . "</a>" : "<a href=" . $link . "?page=" . $pageNumber . "&search=" . $searchQuery . "&sort=" . $sortField . "&order=" . $sortOrder . " class='pagination__btn'>" . $pageNumber . "</a>";
            }else{
                if(($pageNumber <= $pages-2 && $pageNumber == $currentPage+1) || ($pageNumber >= 3 && $pageNumber == $currentPage-1) || ($pageNumber == $currentPage+2) && ($currentPage == 1) || ($pageNumber == $currentPage-2) && ($currentPage == $pages)){
                    echo "<a href=" . $link . "?page=" . $pageNumber . "&search=" . $searchQuery . "&sort=" . $sortField . "&order=" . $sortOrder . " class=pagination__btn>...</a>";  
                }
            }
            $pageNumber++;
        }

        if($currentPage < $pages): 
            echo "<a href=" . $link . "?page=" . ($currentPage + 1) . "&search=" . $searchQuery . "&sort=" . $sortField . "&order=" . $sortOrder . " class='pagination__btn'>&gt;</a>";
        endif;
    echo "</section>"
?>