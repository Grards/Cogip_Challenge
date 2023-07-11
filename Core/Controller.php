<?php 

namespace App\Core;

use App\Core\DatabaseManager;

class Controller
{
    /*
    * @var $view, $data
    * return view
    */
    public function view($view, $data = [])
    {
        extract($data);
        require_once(__ROOT__.'/Resources/views/'.$view.'.php');
    }

    public function pagesSorting($viewPage, $model){
        $page = ($_GET['page'] ?? 1); // ?? -> if doesn't exist.
        if(!filter_var($page, FILTER_VALIDATE_INT)){
            header("Location: ".BASE_URL.$viewPage."?error_page");
            exit();
        }
        if($page === '1'){
            header("Location: ".BASE_URL.$viewPage);
            exit();
        }

        $currentPage = (int)$page;
        if($currentPage <= 0){
            header("Location: ".BASE_URL.$viewPage."?&error_page");
            exit();
        }

        $countOfEntries = $model->getcountOfEntries();
        $contactsPerPage = 10;
         
        $pages = ceil($countOfEntries[0] / $contactsPerPage);
        if($currentPage > $pages){
            header("Location: ".BASE_URL."contacts?&error_page");
            exit();
        }
        
        $offset = $contactsPerPage * ($currentPage-1);
        $searchQuery = $_GET['search'] ?? '';
    
        $contactsLimitedPerPage = $model->getCompaniesLimitedPerPage($contactsPerPage, $offset, $searchQuery);

        return [
            'companiesLimitedPerPage' => $companiesLimitedPerPage, 
            'pages' => $pages, 
            'currentPage' => $currentPage
        ];
    }
}