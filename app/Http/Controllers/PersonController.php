<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Person;

class PersonController extends Controller
{
    
    public function list () {
        $persons = Person::withCount('Address')->paginate(5);
        return view('person.list', compact('persons'));
    }

    public function new () {
        return view('person.new');
    }

    public function create () {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'birthday' => 'required|date_format:Y-m-d',
            'gender' => 'required|integer|between:1,2',
        ]);
       
        Person::create(request(['name', 'birthday', 'gender']));

        return redirect('/person');
    }

    public function edit ($id) {
        if (! $person = Person::where('id', $id)->first()) {
            return redirect('/person');
        }

        return view('person.edit', compact('person'));
    }

    public function update ($id) {
        if (! Person::where('id', $id)->exists()) {
            return redirect('/person');
        }

        $this->validate(request(), [
            'name' => 'required|min:3',
            'birthday' => 'required|date_format:Y-m-d',
            'gender' => 'required|integer|between:1,2',
        ]);
       
        Person::where('id', $id)->update([
            'name' => request('name'),
            'birthday' => request('birthday'),
            'gender' => request('gender')
        ]);

        return redirect('/person');
    }

    public function remove ($id) {
        if (! Person::where('id', $id)->exists()) {
            return redirect('/person');
        }

        Person::where('id', $id)->delete();
        
        return redirect('/person');
    }

}
