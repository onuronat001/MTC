<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\Address;
use App\Models\Person;

class AddressController extends Controller
{
    public function list ($person_id) {
        if (! $addresses = Cache::get('mtc_adresses_' . $person_id)) {
            $addresses = Address::with('Person')->where('person_id', $person_id)->get();
            Cache::put('mtc_adresses_' . $person_id, $addresses, 300);
        }

        return view('address.list', compact('addresses'));
    }

    public function new () {
        return view('address.new');
    }

    public function create () {
        if (! Person::where('id', request('person_id'))->exists()) {
            return redirect('/person');
        }

        $this->validate(request(), [
            'address' => 'required|min:10',
            'post_code' => 'required|integer',
            'city_name' => 'required',
            'country_name' => 'required',
        ]);

        Address::create(request(['person_id', 'address', 'post_code', 'city_name', 'country_name']));

        Cache::flush();

        return redirect('/address/' . request('person_id'));
    }

    public function edit ($id) {
        if (! $address = Address::where('id', $id)->first()) {
            return redirect('/person');
        }

        return view('address.edit', compact('address'));
    }

    public function update ($id) {
        if (! $address = Address::where('id', $id)->first()) {
            return redirect('/person');
        }

        $this->validate(request(), [
            'address' => 'required|min:10',
            'post_code' => 'required|integer',
            'city_name' => 'required',
            'country_name' => 'required',
        ]);

        Address::where('id', $id)->update([
            'address' => request('address'),
            'post_code' => request('post_code'),
            'city_name' => request('city_name'),
            'country_name' => request('country_name')
        ]);

        Cache::flush();

        return redirect('/address/' . $address->person_id);
    }

    public function remove ($id) {
        if (! $address = Address::where('id', $id)->first()) {
            return redirect('/person');
        }

        Address::where('id', $id)->delete();

        Cache::flush();
        
        return redirect('/address/' . $address->person_id);
    }

}
