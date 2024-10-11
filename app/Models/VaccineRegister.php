<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineRegister extends Model
{
    use HasFactory;
    protected $fillable = [
        'center_id',
        'name',
        'email',
        'nid',
        'scheduled_date',
        'registration_status',
    ];
//    protected $table = 'vaccine_registers';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vaccinecenter()
    {
        return $this->belongsTo(VaccineCenter::class);
    }
}
