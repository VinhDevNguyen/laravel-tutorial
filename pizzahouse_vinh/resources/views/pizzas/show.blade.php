@extends('layouts/layout')

@section('content')
<div class= "wrapper pizza-details">
    <h1>Order for {{$pizza->name}}</h1>
    <p class="type">Type - {{$pizza -> type}} </p>
    <p class="base">Base - {{$pizza -> base}} </p>

    <p class="toppings">Extra toppings:</p>
    <ul>
        @if($pizza -> toppings != NULL)
            @foreach($pizza -> toppings as $topping)
            <li>{{ $topping }}</li>
            @endforeach
        @else
            None
        @endif
    </ul>

    <form action="/pizzas/{{ $pizza -> id }}" method="post">
    @csrf
    @method('DELETE')
    <button>Complete order</button>
    </form>
</div>
<a href="/pizzas/" class="back"><- Back to all pizzas</a>
@endsection()
