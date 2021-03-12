<?php

namespace Redzjovi\HotelbedsPhp\Laravel\App\Models;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    protected $fillable = [
        'code',
        'type_description',
    ];

    /**
     * @return string
     */
    public function getTable()
    {
        return config('hotelbeds-php.table_names.hotel.accommodations');
    }

    public function typeMultiDescriptions()
    {
        return $this->morphMany(Description::class, 'descriptionable');
    }
}