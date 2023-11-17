# Laravel CRUD Generator Integration

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## CRUD Generator Integration

**Step 1:** Update your `composer.json` file with the following entries:

```
 "require-dev": {
    "ishakib/laracrud": "dev-dev"
 },
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/ishakib/lara-crud"
    }
],
"autoload-dev": {
    "psr-4": {
        "Tests\\": "tests/",
        "LaraCrud\\": "src/"
    }
}
```

**Step 2:** Include the following lines in the providers array of your config/app.php file:
```
//laracrud\LaraCrudServiceProvider::class,
//App\Providers\RepositoryRegisterProvider::class
```

**Step 3:** Run the following command to install the required packages:
```
composer install
```


**Step 4:**  Uncomment laracrud\LaraCrudServiceProvider::class from the providers array in the config/app.php file:
```
laracrud\LaraCrudServiceProvider::class,
//App\Providers\RepositoryRegisterProvider::class
```

**Step 5:** Run the following command to publish the Laravel CRUD assets:

```php artisan vendor:publish --tag=laracrud-publish```

**Step 6:**  Uncomment App\Providers\RepositoryRegisterProvider::class from the providers array in the config/app.php file:
```
App\Providers\RepositoryRegisterProvider::class
```
**Step 7:** The providers array in the config/app.php file should look like:
```
laracrud\LaraCrudServiceProvider::class,
App\Providers\RepositoryRegisterProvider::class
```
Now, your Laravel project is integrated with the CRUD Generator. Follow these steps for a smooth setup.

Now Enjoy the crud cmd from terminal
```
php artisan lara:crud
```
