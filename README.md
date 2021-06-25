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