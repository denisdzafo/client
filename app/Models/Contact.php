<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function contactType()
    {
        return $this->belongsTo(ContactType::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class,'client_id');
    }
}
