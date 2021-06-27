# Laravel 
## Lesson 2:
### Installing Laravel
1. Install XAMPP
2. Install composer
3. Open terminal and type `composer -V` to check composer version
4. Type `composer global require laravel/installer` in terminal to install laravel
5. To create a new project we use `laravel new [project_name]`. Example: To create `pizzahouse` project we use `laravel new pizzahouse`
6. `cd` into `pizzahouse` dir and then type `php artisan serve` to host localhose server.

## Lesson 3:
### Passing Data to Views
1. We can pass the data to views using `['varibale' => ' ']` in `./routes/web.php`. Example below:
```php
// .\routes\web.php
Route::get('/pizzas', function() {
    return view('pizzas', ['type' => 'vietnam']);
});
```
2. In views file, to get infomation we can use `{{$varibale}}` in `.blade.php` file. Example bellow:
```php
// .\resources\views\pizzas.blade.php
{{$type}}
```
3. We can add multiple values and store it in variable then return it like this:
```php
$pizzas = [
    'type' => 'Pizza Việt Nam',
    'ingredients' => 'Bột, đường, muối, ...',
    'price' => 80000
];
```
## Lesson 4:
### Blade basic
1. Syntax `If Statement`
```php
@if(<condition>)
    return
@elseif(<condition>)
    return
@else
    return
@endif()
```
2. Syntax `unless`
```php
@unless(<condition>)
    return
@endunless()
```
3. Syntax `php` to write php code
```php
@php
// write php code in here
@endphp
```

## Lesson 5:
### Blade loops
1. For loop syntax
```php
@for(<$temp = start>; <$temp condition>; <$temp++> )
    do
@endfor
```
2. For loop through list

If we have a list like this one
```php
$pizzas = [
    ['type' => 'hawaiian', 'base' => 'cheesy crust'],
    ['type' => 'volcano', 'base' => 'garlic crust'],
    ['type' => 'veg supreme', 'base' => 'thin & crispy']
];
```
We can do a for loop through list by using for loop:
```php
@for($i = 0; $i < count($pizzas); $i++)
    <p> {{$pizzas[$i]['type']}} - {{$pizzas[$i]['base']}}</p>
@endfor
```
## Lesson 6:
### Layout files
The layout file is a template file so that we can re-use it (header, footer, js-scirpt, ...) for another view page. So how to use that?

1. Create a new folder call `layouts` in `resources/views/` and then we create `layout.blade.php` file in `layouts` folder.
2. In `welcome.blade.php` use `@extends('dir/to/layout/file')` and then use the code below to create a section
```php
@section('section-name')
    //write content here!
@endsection()
```
3. We can re-write header, script, footer, ... in layout file, then add `@yield('section-name)` to use the from views folder