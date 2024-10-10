<?php

namespace App\Http\Controllers;

use App\Http\Resources\VaccineCenterResource;
use App\Models\VaccineCenter;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class VaccineCenterController extends Controller
{
    public function vaccineCenter(Request $request): Response
    {
        $items = VaccineCenterResource::collection(
            VaccineCenter::searchByQueryString()
                ->sortByQueryString()
                ->paginate(5)
        );

        return Inertia::render('Vaccine_Center/Index', [
            'items' => $items,
        ]);
    }
}
