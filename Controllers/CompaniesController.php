<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Company;

class CompaniesController extends Controller
{
    function listsOfCompagnies(){
        $model = new Company();
        $viewPage = "companies";
        $viewArray = $this->pagesSorting($viewPage, $model);

        return $this->view('contacts',[
            'currentPage' => $viewArray['currentPage'],
            'pages' => $viewArray['pages'],
            'contactsLimitedPerPage' => $viewArray['$contactsLimitedPerPage']
        ]);
    }

    public function show(){
        require '../Resources/views/contacts.php';
    }
}
?>