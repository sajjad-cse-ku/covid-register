<?php

namespace App\Http\Controllers;

use App\Http\Requests\VaccineRegisterRequest;
use App\Models\VaccineCenter;
use App\Models\VaccineRegister;
use App\Services\VaccineRegistrationService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class VaccineRegisterController extends Controller
{
    protected $regService;

    public function __construct(VaccineRegistrationService $regService)
    {
        $this->regService = $regService;
    }

    public function vaccineRegister()
    {
        $centers = VaccineCenter::select('id', 'center_name')->get();

        return Inertia::render('Vaccine_Register/Register', [
            'centers' => $centers,
        ]);
    }

    public function vaccineRegisterStore(VaccineRegisterRequest $request)
    {

        $requestData = $request->validated();

        DB::beginTransaction();
        try {
            $requestData['scheduled_date'] = $this->regService->getNextAvailableDateForCenter((int) $requestData['center_id']);
            $registration = VaccineRegister::create($requestData);

            // We're creating a Carbon instance with the vaccination date, subtracting one day, setting the time to 9 PM,
            // and converting it to the Bangladesh time zone. We're then queuing a new instance of the VaccineNotification
            // mail class to be sent to the user at the specified notification time.

            $emailData = $this->regService->data((object) $registration);
            $notification_time = Carbon::parse($emailData['scheduled_date'])->subDay()->setTimezone('Asia/Dhaka')->setTime(21, 0, 0);
            //            Mail::to($emailData['email'])->later($notification_time, new VaccineNotification($emailData));
            DB::commit();
            return to_route('dashboard')->with('success', 'A new user was successfully created.');
        } catch (\Exception $e) {
            DB::rollBack();
            return withError($e->getMessage(), 400);
        }
    }
}
