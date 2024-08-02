<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeaturedType;

class InterfaceDashboardController extends Controller
{
    public function index()
    {
        $featured_types = FeaturedType::all();
        return view('interface_dashboard', compact('featured_types'));
    }
}
