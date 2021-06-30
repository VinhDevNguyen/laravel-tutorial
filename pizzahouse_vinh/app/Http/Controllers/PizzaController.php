<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function index(){
        // We can create a variable to store data and return it
        // $pizzas = [
        //     ['type' => 'hawaiian', 'base' => 'cheesy crust'],
        //     ['type' => 'volcano', 'base' => 'garlic crust'],
        //     ['type' => 'veg supreme', 'base' => 'thin & crispy']
        // ];
        
        // We will use Models to get data from database
        // $pizzas = Pizza::all();
        // $pizzas = Pizza::orderBy('name', 'asc') -> get();
        // $pizzas = Pizza::where('type', 'hawai ') -> get();
        $pizzas = Pizza::latest() -> get();
        // $name = request('name');
        // $age = request('age');
        // We don't need to create new variable, we can pass direct into return function

        return view('pizzas.index', [
            'pizzas' => $pizzas,
            'name' => request('name'),
            'age' => request('age')
        ]);
    }

    public function show($id){
        //Use the $id variable to query the db for the record
        $pizzas = Pizza::findOrFail($id);
        return view('pizzas.show', [
            'pizza' => $pizzas
        ]);
    }

    public function create(){
        return view('pizzas.create');
    }

    public function store(){
        
        $pizzas = new Pizza();

        $pizzas -> name = request('name');
        $pizzas -> base = request('base');
        $pizzas -> type = request('type');
        $pizzas -> toppings = request('toppings');
        // return request('toppings');
        $pizzas->save();
        return redirect('/') -> with('mssg', 'Thanks for your order!');
    }
}
