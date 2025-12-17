<?php

namespace App\Controllers;

use Core\Controller;
USE App\Models\Korisnik;

class HomeController extends Controller{

    public function index(): void{
        $this->view('home/index');
    }

    public function register(): void{

        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $activationKey=Korisnik::create($_POST);

            $_SESSION['activation']=[
                'ime'=>$_POST["ime"],
                'prezime'=>$_POST["prezime"],
                'email'=>$_POST["email"],
                'key'=>$activationKey
            ];

            $this->view('home/activation-preview');
            return;
        }
        $this->view('home/register');
    }

    public function activate(): void{
        if(isset($_GET["key"]) && Korisnik::activate($_GET["key"])){
            $this->view('home/activate-success');
        }
        else
        {
            echo "Neispravan aktivacijski link!";
        }
    }

}