<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Base
{
    use HasFactory;

    protected $table = 'person';

    public function address () {
        return $this->hasMany (Address::class, 'person_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($person) {
             $person->address()->delete();
        });
    }
}
