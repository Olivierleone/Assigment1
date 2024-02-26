<?php
namespace app\controllers;

// MainController extends Controller class from app\core namespace
class MainController extends \app\core\Controller
{

    // Method for rendering the index page
    public function index()
    {
        // Renders the view for the index page located at Main/index
        $this->view('Main/index');
    }

    // Method for rendering the about us page
    public function about_us()
    {
        // Renders the view for the about us page located at Main/about_us
        $this->view('Main/about_us');
    }
}

?>
