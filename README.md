# Hotelbeds PHP

## Table of Contents

* [Installation](#installation)
  * [Composer](#composer)
* [API](#api)
  * [Hotel Content API](#hotel-content-api)
    * [Locations](#locations)
      * [Countries](#countries)
    * [Types](#types)
      * [Languages](#languages)

## Installation

### Composer

```bash
composer require redzjovi/hotelbeds-php
```

You can publish `the migration` and the `config/hotelbeds-php.php` with:

```bash
php artisan vendor:publish --provider="Redzjovi\HotelbedsPhp\Laravel\App\Providers\HotelbedsPhpServiceProvider"
```

## API

### Hotel Content API

#### Locations

##### Countries

```php
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Requests\Location\CountriesRequest;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses\Location\CountriesResponse;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Services\LocationService;

$production = true;

$service = new LocationService($production);

$request = new CountriesRequest();
$request->setApiKey('API_KEY');
$request->setSecret('SECRET');

/** 
 * @var CountriesResponse $response
 */
$response = $service->countries($request);
```

#### Types

##### Languages

```php
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Requests\Type\LanguagesRequest;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Responses\Type\LanguagesResponse;
use Redzjovi\HotelbedsPhp\HotelContentApi\V_1_0\Services\TypeService;

$production = true;

$service = new TypeService($production);

$request = new LanguagesRequest();
$request->setApiKey('API_KEY');
$request->setSecret('SECRET');

/** 
 * @var LanguagesResponse $response
 */
$response = $service->languages($request);
```
