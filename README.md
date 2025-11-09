<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Microservicio - Laravel 12

Proyecto académico desarrollado para la actividad grupal sobre **microservicios y autenticacion** utilizando el framework Laravel 12 y base de datos MySQL.

---

# Autores:

- Quilumbaquin Pillisa Alan David (ProgramadorL)
- Borja Díaz Adriana Maribel (adryborja95)
- Acurio Vasco Andres Acurio (andy031002)

# Instalación y Configuración de Laravel Sanctum

Se realizó la instalación de **Laravel Sanctum** con el siguiente comando:

```
composer require laravel/sanctum
```


Después de eso, se publicaron y ejecutaron las migraciones necesarias con:

```
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

Con esto se generó automáticamente la tabla **personal_access_tokens**, que se encarga de guardar los tokens de autenticación de los usuarios.

Luego, en el archivo **bootstrap/app.php**, se añadió la configuración del middleware para habilitar el manejo de las APIs:


```php
->withMiddleware(function (Middleware $middleware): void {
    $middleware->statefulApi();
})
```

# License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

