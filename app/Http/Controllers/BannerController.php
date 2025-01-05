<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::all();
        return view('banner.index', compact('banners'));
    }

    public function create()
    {
        return view('banner.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'banner_name' => 'required',
            'banner_image' => 'required | image'
        ]);


        // script para subir la imagen
        if($request->hasFile("banner_image")) {

            $image = $request->file("banner_image");
            $imageName = Str::slug($request->banner_name) . "." . $image->guessExtension();
            $route = public_path("img/banners/");

            //$image->move($route, $imageName);
            copy($image->getRealPath(),$route.$imageName);

            Banner::create([
                'banner_name' => $request->banner_name,
                'active' => ($request->active == 'on'),
                'banner_image_url' => 'img/banners/' . $imageName,
                'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        } else {
            return redirect()->route('banner.index')->with('danger', 'Error al subir la imagen');
        }

        return redirect()->route('banner.index')->with('success', 'Banner añadido exitosamente');
    }

    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banner.show', compact('banner'));
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'banner_name' => 'required',
        ]);

        $banner = Banner::findOrFail($id);

        if($request->hasFile("banner_image")) {
            if(File::exists(public_path($banner->banner_image_url))) {
                File::delete(public_path($banner->banner_image_url));
            }
            $image = $request->file("banner_image");
            $imageName = Str::slug($request->banner_name) . "." . $image->guessExtension();
            $route = public_path("img/banners/");

            //$image->move($route, $imageName);
            copy($image->getRealPath(),$route.$imageName);

            $banner->update([
                'banner_name' => $request->banner_name,
                'active' => ($request->active == 'on'),
                'banner_image_url' => 'img/banners/' . $imageName,
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        } else {
            $banner->update([
                'banner_name' => $request->banner_name,
                'active' => ($request->active == 'on'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        }

        return redirect()->route('banner.index')->with('success', 'banner actualizado exitosamente.');
    }

    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return redirect()->route('banner.index')->with('success', 'banner eliminado exitosamente.');
    }





}
