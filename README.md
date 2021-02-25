# Hotelbeds PHP

## Table of Contents

* [Installation](#installation)
  * [Composer](#composer)
* [API](#api)
  * [Hotel Content API](#hotel-content-api)
    * [Locations](#locations)
      * [Countries](#countries)

## Installation

### Composer

```bash
composer require redzjovi/hotelbeds-php
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
