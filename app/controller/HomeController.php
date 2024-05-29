<?php
require_once '../../core/Controller.php';

class HomeController extends Controller {
    
    public function index() {
        $content = $this->view('home/index', [], true);
        include './app/view/layout.php';
    }

    
    public function about() {
        $this->view('home/about');
    }

    
    public function contact() {
        $this->view('home/contact');
    }
}
