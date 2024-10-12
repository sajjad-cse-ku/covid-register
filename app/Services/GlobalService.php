<?php

namespace App\Services;

use App\Models\VaccineRegister;
use Illuminate\Support\Facades\Log;

class GlobalService
{
    public function updateStatusWhenScheduledDateExpired(): void
    {
        VaccineRegister::where('scheduled_date', '<=', now())
            ->update([
                'registration_status' => 'VACCINATED',
            ]);
    }
}
