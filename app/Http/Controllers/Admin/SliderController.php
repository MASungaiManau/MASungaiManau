<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $data['data'] = Slider::get()->first();
        return view('pages.admin.slider', $data);
    }
    public function update(Request $request, $id){
        Slider::find($id)->update([
            'slider' => $request->slider,
            'slider2' => $request->slider2,
            'slider3' => $request->slider3,
        ]);
        return redirect()->back();
    }
}
