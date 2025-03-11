<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private SlideController $slideController;
    public function __construct() {
        $this->slideController = new SlideController(new Slide());
    }
    public function index() {
        $this->slideController = new SlideController(new Slide());
        $slides = $this->slideController->getAllSlide();
        return view('index', ['slides' => $slides]);
    }
}