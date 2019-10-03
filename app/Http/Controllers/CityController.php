<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('city.list', compact('cities'));
    }

    public function create()
    {
        return view("city.create");
    }

    public function store(Request $request)
    {
        $cities = new City();
        $cities->name = $request->name;
        $cities->save();

        Session::flash('success', "Thêm thành công");

        return redirect()->route('city.index');
    }

    public function edit($id)
    {
        $cities = City::findOrFail($id);
        return view('city.edit', compact('cities'));
    }

    public function update(Request $request, $id)
    {
        $cities = City::findOrFail($id);
        $cities->name = $request->name;
        $cities->save();

        Session::flash('success', 'Cập nhật thành công');

        return redirect()->route('city.index');
    }


    public function destroy($id)
    {
        $cities = City::findOrFail($id);
        $cities->customers()->delete();
        $cities->delete();
        return redirect()->route('city.index');
    }
}
