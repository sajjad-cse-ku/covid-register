<?php

namespace App\Http\Controllers;

use App\Models\VaccineCenter;
use Inertia\Inertia;

class VaccineRegisterController extends Controller
{
    public function vaccineRegister()
    {
        $centers = VaccineCenter::select('id', 'center_name')->get();

        return Inertia::render('Vaccine_Register/Register', [
            'centers' => $centers,
        ]);
    }
}
