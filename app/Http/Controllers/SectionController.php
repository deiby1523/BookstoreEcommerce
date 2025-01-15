<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index() {
        $sections = Section::all();
        return view('section.index', compact('sections'));
    }


}
