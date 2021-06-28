@extends('layouts/layout')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Pizzas
        </div>
        <p> {{$name}} </p>
        <p> {{$age}} </p>
        <!-- For loop syntax -->
        <!-- @for($i = 0; $i < 5; $i++)
            <p>The value of i is {{$i}} </p>
        @endfor -->

        <!-- For loop through list -->
        @for($i = 0; $i < count($pizzas); $i++)
            <p> {{$pizzas[$i]['type']}} - {{$pizzas[$i]['base']}}</p>
        @endfor
    </div>
</div>
@endsection()
