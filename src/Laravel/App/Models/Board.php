<?php

namespace Redzjovi\HotelbedsPhp\Laravel\App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = [
        'code',
        'description',
        'multi_lingual_code',
    ];

    /**
     * @return string
     */
    public function getTable()
    {
        return config('hotelbeds-php.table_names.hotel.boards');
    }

    public function descriptions()
    {
        return $this->morphMany(Description::class, 'descriptionable');
    }
}