# Shopvel eCommerce

[![Latest Stable Version](https://poser.pugx.org/shopvel/shopvel/v/stable)](https://packagist.org/packages/shopvel/shopvel)
[![Total Downloads](https://poser.pugx.org/shopvel/shopvel/downloads)](https://packagist.org/packages/shopvel/shopvel)
[![Latest Unstable Version](https://poser.pugx.org/shopvel/shopvel/v/unstable)](https://packagist.org/packages/shopvel/shopvel)
[![License](https://poser.pugx.org/shopvel/shopvel/license)](https://packagist.org/packages/shopvel/shopvel)

# Overview

Shopvel eCommerce - Powerfull Open Source eCommerce Software - Built with Laravel 5.

# Installation

> Note: Shopvel is still in development!

1.) Create project via composer
```
$ composer create-project shopvel/shopvel
```

2.) Make storage and bootstrap/cache folders writeable:
```
$ chmod -R 755 storage
$ chmod -R 755 bootstrap/cache
```

3.) Modify environments variables. Most variables are standard from Laravel 5. See [Laravel 5 Documentation] (https://laravel.com/docs/5.2/configuration) for more informations. Shopvel environment variables are:

```
APP_THEME: Frontend theme name
APP_LANG: Default language
APP_LANG_FALLBACK: Fallback language
APP_LANGUAGES: Available languages (comma seperated)
APP_TIMEZONE: Default timezone
```

4.) Run migration and create an admin user via artisan:
> Note: Database connection required (.env file)!

```
$ php artisan migrate
$ php artisan shopvel:create-admin
```

# Artisan
Currently you can use following artisan commands:
```
$ php artisan shopvel:create-admin (create an admin)
$ php artisan shopvel:version (get current Shopvel version number)
```

# Themes
You can change default theme over the configuration file theme.php under config/theme.php.
Views can be found under resources/views/themes/THEMENAME and assets under public/assets/themes/THEMENAME.

# Official Documentation

Documentation for the Shopvel eCommerce software can be found on the [Shopvel website] (http://shopvel.com/docs).

# License

Shopvel eCommerce is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).