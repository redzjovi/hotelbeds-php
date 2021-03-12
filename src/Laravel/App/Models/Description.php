<?php

namespace Redzjovi\HotelbedsPhp\Laravel\App\Models;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = [
        'language_code',
        'content',
    ];

    public function descriptionable()
    {
        return $this->morphTo();
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return config('hotelbeds-php.table_names.hotel.descriptions');
    }
}