@extends('layouts/layout')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Pizzas list
        </div>
        <p> {{$name}} </p>
        <p> {{$age}} </p>
        <!-- For loop syntax -->
        <!-- @for($i = 0; $i < 5; $i++)
            <p>The value of i is {{$i}} </p>
        @endfor -->

        <!-- For loop through list -->
        <!-- @for($i = 0; $i < count($pizzas); $i++)
            <p> {{$pizzas[$i]['type']}} - {{$pizzas[$i]['base']}} - {{$pizzas[$i]['name']}} </p>
        @endfor -->

        <!-- For each loop -->
        @foreach($pizzas as $pizza)
            <p> {{$pizza -> type}} - {{$pizza -> base}} - {{$pizza -> name}} </p>
        @endforeach
    </div>
</div>
@endsection()
