<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lacodix\LaravelModelFilter\Traits\IsSearchable;
use Lacodix\LaravelModelFilter\Traits\IsSortable;

class VaccineCenter extends Model
{
    use HasFactory, IsSearchable, IsSortable;

    protected $fillable = [
        'center_name',
        'daily_limit',
    ];

    protected $searchable = [
        'center_name',
        'daily_limit',
    ];

    protected $sortable = [
        'center_name' => 'asc',
        'daily_limit' => 'asc',
    ];

    public function registrations()
    {
        return $this->hasMany(VaccineRegister::class);
    }
}
