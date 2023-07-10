<?php

namespace App\Models;

use App\Core\DatabaseManager;
use Faker\Factory;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../vendor/fakerphp/faker/src/autoload.php';

class Faker
{
    public function __construct(){

    }

    public function createFaker(){
        $faker = Factory::create();
        $fakerName = $faker->name();
        return $fakerName;
    }
}