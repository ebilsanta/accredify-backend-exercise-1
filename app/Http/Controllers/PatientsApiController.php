<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Patient;
use App\HTTP\Requests\PatientStoreRequest;

class PatientsApiController extends Controller

{
    public function index() {
        return Patient::all();
    }

    public function store(PatientStoreRequest $request) {
        $request->validated();

        $patients = request('patients');

        foreach($patients as $patient) {
            Patient::create([
                'patientNationality' => $patient['patientNationality'],
                'patientNric' => $patient['patientNric'],
                'patientName' => $patient['patientName'],
                'patientGender' => $patient['patientGender'],
                'patientBirthDate' => $patient['patientBirthDate'],
                'patientEmail' => $patient['patientEmail'],
                'sampleUniqueId' => $patient['sampleUniqueId'],
                'sampleResults' => $patient['sampleResults'],
                'collectedDateTime' => date("Y-m-d H:i:s", strtotime($patient['collectedDateTime'])),
                'effectiveDateTime' => date("Y-m-d H:i:s", strtotime($patient['effectiveDateTime'])),
            ]);
        }
        return response('Patients added successfully', 200);
    }
}
