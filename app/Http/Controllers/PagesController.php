<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

class PagesController extends Controller
{

    public function training_index()
    {
        $training   = Training::OrderBy('created_at','DESC')->get();
        $title      = "Training";
        $data       = compact('title','training');
        return view('training', $data);
    }

    public function about_index()
    {
        $title  = "About Us";
        $data   = compact('title');
        return view('about-us', $data);
    }

    public function privacy_index()
    {
        $title  = "Privacy Policy";
        $data   = compact('title');
        return view('privacy_policy', $data);
    }

    public function terms_index()
    {
        $title  = "Terms & Conditions";
        $data   = compact('title');
        return view('terms_condition', $data);
    }
}
