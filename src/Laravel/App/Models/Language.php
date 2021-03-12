<?php

namespace Redzjovi\HotelbedsPhp\Laravel\App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'code',
        'name',
    ];

    public function descriptions()
    {
        return $this->morphMany(Description::class, 'descriptionable');
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return config('hotelbeds-php.table_names.hotel.languages');
    }
}