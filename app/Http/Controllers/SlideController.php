<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    private Slide $slide;
    public function __construct(Slide $slide) {
        $this->slide = $slide;
    }

    public function getAllSlide() {
        return $this->slide->all();
    }
}