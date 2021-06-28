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
        $pizzas = Pizza::orderBy('name', 'asc') -> get();

        // $name = request('name');
        // $age = request('age');
        // We don't need to create new variable, we can pass direct into return function

        return view('pizzas', [
            'pizzas' => $pizzas,
            'name' => request('name'),
            'age' => request('age')
        ]);
    }

    public function details($id){
        //Use the $id variable to query the db for the record
        return view('info', [
            'id' => $id
        ]);
    }
}
