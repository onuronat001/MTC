<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Base
{
    use HasFactory;

    protected $table = 'address';

    public function person () {
        return $this->belongsTo(Person::class);
    }
}
