<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;

    public function receiver()
    {
        return $this->belongsTo(Receiver::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    protected $fillable = ['receiver_id', 'hospital_id', 'blood_group', 'quantity', 'status'];
}
