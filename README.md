# PHP_Laravel12_Notify
```php
Laravel 12 based project demonstrating Toast Notification System using Laravel Notify package.
```
# Step 1: Install Laravel 12 Create Project
```php
We create a fresh Laravel 12 project to implement Toast Notifications using Laravel Notify Package.
```

Run Command
```php
composer create-project laravel/laravel:^12.0 PHP_Laravel12_Notify
```

Move to Project Folder
```php
cd PHP_Laravel12_Notify
```

Generate Application Key
```php
php artisan key:generate
```

# Step 2: Setup Database (.env File)

Open .env file and configure database:
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel12_notify
DB_USERNAME=root
DB_PASSWORD=
```
Run Default Migration
```php
php artisan migrate
```
# Step 3: Install Laravel Notify Package

Laravel Notify is used for:
```php
- Success Toast Messages
- Error Notifications
- Warning Alerts
- Info Notifications
```
Install Package
```php
composer require mckenziearts/laravel-notify
```
# Step 4: Publish Notify Configuration & Assets
```php
php artisan notify:install
```

This command will:
```php
- Publish notify configuration file
- Publish notify views
- Register required assets
```

# Step 5: Clear Application Cache
```php
php artisan optimize:clear
```

# Step 6: Add Notify Component in Layout

Open Breeze layout file
```php
resources/views/layouts/app.blade.php
```

```php
<!DOCTYPE html>
@include('notify::components.notify')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
         <x-notify::notify />
         
    </body>
</html>
```


# Step 7: Create Test Notify Controller

Create Controller
```php
php artisan make:controller TestNotifyController
```

Open File
```php
app/Http/Controllers/TestNotifyController.php
```
```php
<?php

namespace App\Http\Controllers;

class TestNotifyController extends Controller
{
    public function index()
    {
        notify()->success('This is a real banner notification');

        return redirect()->back();
    }
}
```


# Step 8: Add Route

Open
```php
routes/web.php
```

Add Route
```php
use App\Http\Controllers\TestNotifyController;
```
```php
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestNotifyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test-notify', [TestNotifyController::class, 'index'])
    ->middleware('auth');
require __DIR__.'/auth.php';
```

# Step 9: Authentication Setup (Laravel Breeze)

Install Breeze for Login & Register system
```php
- composer require laravel/breeze --dev
- php artisan breeze:install
- npm install
- npm run build
- php artisan migrate
```

# Step 10: Run Laravel Project
```php
php artisan serve
````

Open Browser
```php
http://127.0.0.1:8000/register
```
<img width="1204" height="628" alt="image" src="https://github.com/user-attachments/assets/1b697327-b428-4c48-a2d8-448a8d207614" />

```php
http://127.0.0.1:8000/login
```
<img width="1235" height="629" alt="image" src="https://github.com/user-attachments/assets/b537f58c-4418-40d0-aa71-afa5a799013b" />

```php
http://127.0.0.1:8000/test-notify
```
<img width="1344" height="429" alt="image" src="https://github.com/user-attachments/assets/52d4e6ba-b3c2-489d-ae9c-b56954164f6a" />



# Project Folder Structure
```php
PHP_Laravel12_Notify
├── app
│   └── Http
│       └── Controllers
│           └── TestNotifyController.php
│
├── resources
│   └── views
│       └── layouts
│           └── app.blade.php
│
├── routes
│   └── web.php
│
├── .env
├── artisan
```
# Explanation
```php
- Toast Based Notification System
- Session Driven Messages
- Works with Redirects
- Clean & Modern UI
- Lightweight & Fast
- Production Ready Implementation
```
