<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    public function donors()
    {
        return $this->hasMany(Donor::class);
    }

    public function receivers()
    {
        return $this->hasMany(Receiver::class);
    }

    protected $fillable = ['name', 'address', 'phone_number'];
}
