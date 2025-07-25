<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return view('section.index', compact('sections'));
    }

    public function create()
    {
        return view('section.create');
    }

    public function save(Request $request)
    {

            $request->validate([
                'section_name' => 'required | min:3 | max:100',
                'section_main_title' => 'min:3 | max:50',
                'section_secondary_title' => 'min:3 | max:50',
                'section_sub_title' => 'min:3 | max:50',
                'section_secondary_sub_title' => 'min:3 | max:50',
                'section_text_1' => 'min:5 | max:1000',
                'section_text_2' => 'min:5 | max:1000',
                'section_color' => 'required | min:1 | max:6 | integer',
                'section_style' => 'required | min:1 | max:5 | integer',
            ]);


        $id = 0;
        $model = Section::latest('id')->first();

        if ($model == null) {
            $id = 1;
        } else {
            $id = intval($model->id) + 1;
        }

        $img1Exists = false;
        $img2Exists = false;
        $imageName1 = null;
        $imageName2 = null;

        // script para subir la imagen 1
        if ($request->hasFile("section_image_1")) {
            $img1Exists = true;
            $image1 = $request->file("section_image_1");
            $imageName1 = Str::slug($request->section_name) . "_" . $id . "_1" . "." . $image1->guessExtension();
            $route = public_path("img/sections/");

            //$image->move($route, $imageName);
            copy($image1->getRealPath(), $route . $imageName1);
        }

        // script para subir la imagen 1
        if ($request->hasFile("section_image_2")) {
            $img2Exists = true;
            $image2 = $request->file("section_image_2");
            $imageName2 = Str::slug($request->section_name) . "_" . $id . "_2" . "." . $image2->guessExtension();
            $route = public_path("img/sections/");

            //$image->move($route, $imageName);
            copy($image2->getRealPath(), $route . $imageName2);
        }

        if ($img1Exists && $img2Exists) {
            Section::create([
                'section_name' => $request->section_name,
                'section_use_custom_code' => 0,
                'section_main_title' => $request->section_main_title,
                'section_secondary_title' => $request->section_secondary_title,
                'section_sub_title' => $request->section_sub_title,
                'section_secondary_sub_title' => $request->section_secondary_sub_title,
                'section_text_1' => $request->section_text_1,
                'section_text_2' => $request->section_text_2,
                'section_color' => $request->section_color,
                'section_btn_link' => $request->section_btn_link,
                'section_style' => $request->section_style,
                'active' => ($request->active == 'on'),
                'section_image_1_url' => 'img/sections/' . $imageName1,
                'section_image_2_url' => 'img/sections/' . $imageName2,
                'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        } else if ($img1Exists && !$img2Exists) {
            Section::create([
                'section_name' => $request->section_name,
                'section_use_custom_code' => 0,
                'section_main_title' => $request->section_main_title,
                'section_secondary_title' => $request->section_secondary_title,
                'section_sub_title' => $request->section_sub_title,
                'section_secondary_sub_title' => $request->section_secondary_sub_title,
                'section_text_1' => $request->section_text_1,
                'section_text_2' => $request->section_text_2,
                'section_color' => $request->section_color,
                'section_btn_link' => $request->section_btn_link,
                'section_style' => $request->section_style,
                'active' => ($request->active == 'on'),
                'section_image_1_url' => 'img/sections/' . $imageName1,
                'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        } else if (!$img1Exists && $img2Exists) {
            Section::create([
                'section_name' => $request->section_name,
                'section_use_custom_code' => 0,
                'section_main_title' => $request->section_main_title,
                'section_secondary_title' => $request->section_secondary_title,
                'section_sub_title' => $request->section_sub_title,
                'section_secondary_sub_title' => $request->section_secondary_sub_title,
                'section_text_1' => $request->section_text_1,
                'section_text_2' => $request->section_text_2,
                'section_color' => $request->section_color,
                'section_btn_link' => $request->section_btn_link,
                'section_style' => $request->section_style,
                'active' => ($request->active == 'on'),
                'section_image_2_url' => 'img/sections/' . $imageName2,
                'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        } else if (!$img1Exists && !$img2Exists) {
            Section::create([
                'section_name' => $request->section_name,
                'section_use_custom_code' => 0,
                'section_main_title' => $request->section_main_title,
                'section_secondary_title' => $request->section_secondary_title,
                'section_sub_title' => $request->section_sub_title,
                'section_secondary_sub_title' => $request->section_secondary_sub_title,
                'section_text_1' => $request->section_text_1,
                'section_text_2' => $request->section_text_2,
                'section_color' => $request->section_color,
                'section_btn_link' => $request->section_btn_link,
                'section_style' => $request->section_style,
                'active' => ($request->active == 'on'),
                'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        }


        return redirect()->route('section.index')->with('success', 'Sección añadida exitosamente');
    }

    public function saveCustom(Request $request) {
        $request->validate([
            'section_custom_name' => 'required | min:3 | max:100',
            'section_custom_code' => 'required | max:60000',
        ]);

        Section::create([
            'section_name' => $request->section_custom_name,
            'active' => ($request->custom_active == 'on'),
            'section_use_custom_code' => 1,
            'section_custom_code' => $request->section_custom_code,
            'created_at' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('section.index')->with('success', 'Sección añadida exitosamente');
    }

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('section.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'section_name' => 'required | min:3 | max:100',
            'section_main_title' => 'min:3 | max:50',
            'section_secondary_title' => 'min:3 | max:50',
            'section_sub_title' => 'min:3 | max:50',
            'section_secondary_sub_title' => 'min:3 | max:50',
            'section_text_1' => 'min:5 | max:1000',
            'section_text_2' => 'min:5 | max:1000',
            'section_color' => 'required | min:1 | max:6 | integer',
            'section_style' => 'required | min:1 | max:5 | integer',
        ]);

        $section = Section::findOrFail($id);

        $img1Exists = false;
        $img2Exists = false;
        $imageName1 = null;
        $imageName2 = null;

        // script para subir la imagen 1
        if ($request->hasFile("section_image_1")) {
            if (File::exists(public_path($section->section_image_1_url))) {
                File::delete(public_path($section->section_image_1_url));
            }

            $img1Exists = true;
            $image1 = $request->file("section_image_1");
            $imageName1 = Str::slug($request->section_name) . "_" . $id . "_1" . "." . $image1->guessExtension();
            $route = public_path("img/sections/");

            //$image->move($route, $imageName);
            copy($image1->getRealPath(), $route . $imageName1);
        }

        // script para subir la imagen 1
        if ($request->hasFile("section_image_2")) {
            if (File::exists(public_path($section->section_image_2_url))) {
                File::delete(public_path($section->section_image_2_url));
            }
            $img2Exists = true;
            $image2 = $request->file("section_image_2");
            $imageName2 = Str::slug($request->section_name) . "_" . $id . "_2" . "." . $image2->guessExtension();
            $route = public_path("img/sections/");

            //$image->move($route, $imageName);
            copy($image2->getRealPath(), $route . $imageName2);
        }

        if ($img1Exists && $img2Exists) {
            $section->update([
                'section_name' => $request->section_name,
                'section_use_custom_code' => 0,
                'section_custom_code' => null,
                'section_main_title' => $request->section_main_title,
                'section_secondary_title' => $request->section_secondary_title,
                'section_sub_title' => $request->section_sub_title,
                'section_secondary_sub_title' => $request->section_secondary_sub_title,
                'section_text_1' => $request->section_text_1,
                'section_text_2' => $request->section_text_2,
                'section_color' => $request->section_color,
                'section_btn_link' => $request->section_btn_link,
                'section_style' => $request->section_style,
                'active' => ($request->active == 'on'),
                'section_image_1_url' => 'img/sections/' . $imageName1,
                'section_image_2_url' => 'img/sections/' . $imageName2,
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        } else if ($img1Exists && !$img2Exists) {
            $section->update([
                'section_name' => $request->section_name,
                'section_use_custom_code' => 0,
                'section_custom_code' => null,
                'section_main_title' => $request->section_main_title,
                'section_secondary_title' => $request->section_secondary_title,
                'section_sub_title' => $request->section_sub_title,
                'section_secondary_sub_title' => $request->section_secondary_sub_title,
                'section_text_1' => $request->section_text_1,
                'section_text_2' => $request->section_text_2,
                'section_color' => $request->section_color,
                'section_btn_link' => $request->section_btn_link,
                'section_style' => $request->section_style,
                'active' => ($request->active == 'on'),
                'section_image_1_url' => 'img/sections/' . $imageName1,
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        } else if (!$img1Exists && $img2Exists) {
            $section->update([
                'section_name' => $request->section_name,
                'section_use_custom_code' => 0,
                'section_custom_code' => null,
                'section_main_title' => $request->section_main_title,
                'section_secondary_title' => $request->section_secondary_title,
                'section_sub_title' => $request->section_sub_title,
                'section_secondary_sub_title' => $request->section_secondary_sub_title,
                'section_text_1' => $request->section_text_1,
                'section_text_2' => $request->section_text_2,
                'section_color' => $request->section_color,
                'section_btn_link' => $request->section_btn_link,
                'section_style' => $request->section_style,
                'active' => ($request->active == 'on'),
                'section_image_2_url' => 'img/sections/' . $imageName2,
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        } else if (!$img1Exists && !$img2Exists) {
            $section->update([
                'section_name' => $request->section_name,
                'section_use_custom_code' => 0,
                'section_custom_code' => null,
                'section_main_title' => $request->section_main_title,
                'section_secondary_title' => $request->section_secondary_title,
                'section_sub_title' => $request->section_sub_title,
                'section_secondary_sub_title' => $request->section_secondary_sub_title,
                'section_text_1' => $request->section_text_1,
                'section_text_2' => $request->section_text_2,
                'section_color' => $request->section_color,
                'section_btn_link' => $request->section_btn_link,
                'section_style' => $request->section_style,
                'active' => ($request->active == 'on'),
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);
        }

        return redirect()->route('section.index')->with('success', 'Sección editada exitosamente');
    }

    public function updateCustom(Request $request, $id) {
        $request->validate([
            'section_custom_name' => 'required | min:3 | max:100',
            'section_custom_code' => 'required | max:60000',
        ]);

        $section = Section::findOrFail($id);

        if ($section->section_image_1_url != null) {
            if (File::exists(public_path($section->section_image_1_url))) {
                File::delete(public_path($section->section_image_1_url));
            }
        }

        if ($section->section_image_2_url != null) {
            if (File::exists(public_path($section->section_image_2_url))) {
                File::delete(public_path($section->section_image_2_url));
            }
        }

            $section->update([
                'section_name' => $request->section_custom_name,
                'section_use_custom_code' => 1,
                'section_custom_code' => $request->section_custom_code,
                'section_main_title' => null,
                'section_secondary_title' => null,
                'section_sub_title' => null,
                'section_secondary_sub_title' => null,
                'section_text_1' =>null,
                'section_text_2' => null,
                'section_color' => 1,
                'section_btn_link' => null,
                'section_style' => null,
                'active' => ($request->custom_active == 'on'),
                'section_image_1_url' => null,
                'section_image_2_url' => null,
                'updated_at' => Carbon::now('UTC')->format('Y-m-d H:i:s')
            ]);

        return redirect()->route('section.index')->with('success', 'Sección editada exitosamente');
    }

    public function delete($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->route('section.index')->with('success', 'Sección eliminada exitosamente.');
    }

    public function show($id)
    {
        $section = Section::findOrFail($id);
        return view('section.show', compact('section'));
    }
}
