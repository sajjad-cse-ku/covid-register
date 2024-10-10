<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineRegister extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'center_id', 'scheduled_date', 'vaccinated'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vaccinecenter()
    {
        return $this->belongsTo(VaccineCenter::class);
    }
}
