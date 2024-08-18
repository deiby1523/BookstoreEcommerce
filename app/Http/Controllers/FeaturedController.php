<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FeaturedType;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FeaturedController extends Controller
{
    public function index()
    {
        $featured_types = FeaturedType::all();
        return view('featured.index', compact('featured_types'));
    }

    public function create()
    {
        return view('featured.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'featured_type_name' => 'required | min:3',
        ]);

        FeaturedType::create([
            'featured_type_name' => $request->featured_type_name,
            'featured_type_description' => $request->featured_type_description,
            'active' => ($request->active == 'on'),
            'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
        ]);


        return redirect()->route('featured.index')->with('success', 'Seccion destacada creada exitosamente.');
    }

    public function edit($id) : View {
        $featured = FeaturedType::findOrFail($id);
        return view('featured.edit',compact('featured'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'featured_type_name' => 'required | min:3 | max : 60',
            'featured_type_description' => 'required | min:3'
        ]);

        $featured = FeaturedType::findOrFail($id);

        $featured->update([
            'featured_type_name' => $request->featured_type_name,
            'featured_type_description' => $request->featured_type_description,
            'active' => ($request->active == 'on'),
            'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('featured.index')->with('success', 'Sección destacada actualizada exitosamente.');
    }

    public function delete($id)
    {
        $featured = FeaturedType::findOrFail($id);
        $featured->delete();

        return redirect()->route('featured.index')->with('success', 'Sección destacada eliminada exitosamente.');
    }
}
