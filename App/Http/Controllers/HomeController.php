<?php
namespace Http\Controllers;
/**
* 
*/
use System\Controller;
class HomeController extends Controller
{
    public function __construct(){
        if(!session('login')){
            redirect('login');
        }
    }
    public function index(){
        parent::View('home');
    }
}
