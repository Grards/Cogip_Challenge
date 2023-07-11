<?php 


namespace App\Controllers;

use App\Core\Controller;
use App\Models\Company;

class CompaniesController extends Controller
{
    function listsOfCompagnies(){
        $companiesModel = new Company();
        
        $page = ($_GET['page'] ?? 1); // ?? -> if doesn't exist.
        if(!filter_var($page, FILTER_VALIDATE_INT)){
            header("Location: ".BASE_URL."companies?error_page");
            exit();
        }
        if($page === '1'){
            header("Location: ".BASE_URL."companies");
            exit();
        }

        $currentPage = (int)$page;
        if($currentPage <= 0){
            header("Location: ".BASE_URL."companies?&error_page");
            exit();
        }

        $countOfCompanies = $companiesModel->getCountOfCompanies();
        $companiesPerPage = 10;
         
        $pages = ceil($countOfCompanies[0] / $companiesPerPage);
        if($currentPage > $pages){
            header("Location: ".BASE_URL."companies?&error_page");
            exit();
        }
        
        $offset = $companiesPerPage * ($currentPage-1);
        $searchQuery = $_GET['search'] ?? '';
    
        $companiesLimitedPerPage = $companiesModel->getCompaniesLimitedPerPage($companiesPerPage, $offset, $searchQuery);

        return $this->view('companies',[
            'currentPage' => $currentPage,
            'pages' => $pages,
            'companiesLimitedPerPage' => $companiesLimitedPerPage
        ]);
    }

    public function show(){
        require '../Resources/views/companies.php';
    }
}
?>