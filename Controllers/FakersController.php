<?php 

    namespace App\Controllers;

    use App\Core\Controller;
    use App\Models\Faker;

    class FakersController extends Controller
    {
        function index(){
            $fakersModel = new Faker();

            $fakers = $fakersModel->createFaker();

            return $this->view('fakers',[
                'fakers' => $fakers
            ]);
        }
    }

?>