<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\FeaturedType;

class InterfaceDashboardController extends Controller
{
    public function index()
    {
        $featured_types = FeaturedType::all();
        $banners = Banner::all();
        return view('interface_dashboard', compact('featured_types','banners'));
    }
}
