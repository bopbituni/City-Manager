<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        
        $customers = Customer::paginate(5);

        $cities = City::all();
        return view('customer.list', compact('customers', 'cities'));
    }

    public function create()
    {
        $cities = City::all();
        return view('customer.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $customers = new Customer();
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->phone = $request->phone;
        $customers->city_id = $request->city_id;
        $customers->save();

        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
        $customers = Customer::findOrFail($id);
        $cities = City::all();
        return view('customer.edit', compact('customers', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $customers = Customer::findOrFail($id);
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->phone = $request->phone;
        $customers->city_id = $request->city_id;
        $customers->save();

        Session::flash('success', 'Update thành công');

        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $customers = Customer::findOrFail($id);
        $customers->delete();
        return redirect()->route('customers.index');
    }

    public function filterByCity(Request $request)
    {
        $idCity = $request->input('city_id');

        $cityFilter = City::findOrFail($idCity);

        $customers = Customer::where('city_id', $cityFilter->id)->get();
        $totalCustomerFilter = count($customers);
        $cities = City::all();

        return view('customer.list', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if (!$keyword) {
            return redirect()->route('customers.index');
        }
        $customers = Customer::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        $cities = City::all();
        return view('customer.list', compact('customers', 'cities'));

    }
}
