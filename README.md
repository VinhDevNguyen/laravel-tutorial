# Laravel 
## Lesson 2: Installing Laravel
1. Install XAMPP
2. Install composer
3. Open terminal and type `composer -V` to check composer version
4. Type `composer global require laravel/installer` in terminal to install laravel
5. To create a new project we use `laravel new [project_name]`. Example: To create `pizzahouse` project we use `laravel new pizzahouse`
6. `cd` into `pizzahouse` dir and then type `php artisan serve` to host localhose server.

## Lesson 3: Passing Data to Views
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
## Lesson 4: Blade basic
### 1. Syntax `If Statement`
```php
@if(<condition>)
    return
@elseif(<condition>)
    return
@else
    return
@endif()
```
### 2. Syntax `unless`
```php
@unless(<condition>)
    return
@endunless()
```
### 3. Syntax `php` to write php code
```php
@php
// write php code in here
@endphp
```

## Lesson 5: Blade loops
### 1. For loop syntax
```php
@for(<$temp = start>; <$temp condition>; <$temp++> )
    do
@endfor
```
### 2. For loop through list

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
## Lesson 6: Layout files
The layout file is a template file so that we can re-use it (header, footer, js-scirpt, ...) for another view page. So how to use that?

1. Create a new folder call `layouts` in `resources/views/` and then we create `layout.blade.php` file in `layouts` folder.
2. In `welcome.blade.php` use `@extends('dir/to/layout/file')` and then use the code below to create a section
```php
@section('section-name')
    //write content here!
@endsection()
```
3. We can re-write header, script, footer, ... in layout file, then add `@yield('section-name)` to use the from views folder

## Lesson 7: CSS & Images
1. To re-use css style file, we can create `css` folder in `public` folder and then create a css file.
2. In view file, we add this code below in head tag to use css
```html
<link rel="stylesheet" href="/css/main.css">
```
3. We can create a new `img` folder in `public` folder to store image that we use in the website, and then use this code bellow to use the img
```html
<img src="/img/pizza-house.png" alt="pizza-house-logo">
```
**Note:**  We don't need to write `href="/public/css/main.css"` because everything in public folder is in the root level so that every view page can access that.

## Lesson 8: Query Parameters
We can pass data through parameters in the URL like this one bellow
```
http://localhost:8000/?name=vinh
```
In the `web.php` file, we have to use `request()` function to recive the data. Example below:
```php
$name = request('name');
```
Then we pass `$name` variable into `return()` function, or we can pass `request()` function direct into `return()` like this one below:
```php
return view('pizzas', [
    'pizzas' => $pizzas,
    'name' => request('name'),
    'age' => request('age')
]);
```

## Lesson 9: Route Parameters (Wildcard)
There is another way to get the data through parameters in URL like this one bellow
```
http://localhost:8000/pizzas/1
```
So how can we do that? We can use the code below
```php
Route::get('/pizzas/{id}', function($id) {
    //Use the $id variable to query the db for the record
    return view('info', [
        'id' => $id
    ]);
});
```
Then we create a new views blade file call `info.blade.php`

## Lesson 10: Controllers
Insted of create too much `Route` with a lot of code inside that, we can create a controller to manage a group of function and then we can call that function inside `Route`. So how to create a controller?

1. To create controller (In this case we will create a new controller called `PizzaController`), we have to type this code bellow into a terminal
```
php artisan make:controller PizzaController
```
Then, a new controller file will be create in directory `/app/Http/Controllers`

2. To call function from Controller, we have to referring to the Controller by using this code bellow
```php
use App\Http\Controllers\PizzaController;
```
Then we can call function
```php
Route::get('/pizzas', [PizzaController::class, 'function_name']);
```

## Lesson 11: Connecting to MySQL
### Create database
Go to terminal and type these code below to create new database
```
mysql -u root
MariaDB [(none)]> create database pizzahouse;
```
### Set database in environment
Go to `.env` file and replace `DB_DATABASE=` match with database name.

## Lesson 12: Migration Basics (Work with MySQL database)
### Create migration file
Go to terminal and then type the code bellow:
```
php artisan make:migration create_pizzas_table
```
### Create a column in migration file
We can create some column by add more `$table->type('name')` in `public function up`
### Execute migration file 
Go to terminal and enter this code
```
php artisan migrate
```

## Lesson 13: More on migration
If we want to check migrate status, just using
```
php artisan migrate:status
```
If we want to rollback the last migration
```
php artisan migrate:rollback
```
**Note:** If you have excute migrate file and you want to add more column in that table, **DO NOT** add more column in old migrate file. Create new migrate file using
```
php artisan make:migration add_column_to_old_table
```
Then add new column and then run migrate bellow code again
```
php artisan migrate
```

## Lesson 14: Eloquent Models
Using Eloquent models to access database
### Create a model
```
php artisan make:model Pizza
```
### Declare Pizza model
Go ahead into `PizzaController.php` file, then declare the Pizza model using this code below:
```php
use App\Models\Pizza;
```
### Get all data from database
```php
$pizzas = Pizza::all();
```
### Using order by
If you want to orderby ascending, using `asc`. Else, using `desc`
```php
$pizzas = Pizza::orderBy('column', 'desc/asc') -> get();
```
### Using where
```php
$pizzas = Pizza::where('column', 'value') -> get();
```