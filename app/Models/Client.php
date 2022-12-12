<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->belongsTo(City::class);
    }

    public function countries()
    {
        return $this->belongsTo(Country::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'client_id');
    }

    public function industries()
    {
        return $this->belongsTo(Industry::class);
    }
}
