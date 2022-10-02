<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Rules\Iso3166Alpha2;
use App\Rules\Gender;
use App\Rules\Iso8601Utc;

class PatientStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'patients.*.patientNationality' => ['required', 
            new Iso3166Alpha2
            ],
            'patients.*.patientNric' => ['required'],
            'patients.*.patientName' => ['required'],
            'patients.*.patientGender' => ['required', 
            new Gender
            ],
            'patients.*.patientBirthDate' => ['required', 'date_format:Y-m-d'],
            'patients.*.patientEmail' => ['required', 'email:rfc,dns'],
            'patients.*.sampleUniqueId' => ['required'],
            'patients.*.sampleResults' => ['required'],
            'patients.*.collectedDateTime' => ['required', 
            new Iso8601Utc
            ],
            'patients.*.effectiveDateTime' => ['required']
        ];
    }

    public function messages() {
        return [
            'patientNationality.required' => "Patient's nationality is required",
            'patientNric.required' => "Patient's NRIC is required",
            'patientName.required' => "Patient's name is required",
            'patientGender.required' => "Patient's gender is required",
            'patientBirthDate.required' => "Patient's birth date is required",
            'patientBirthDate.date_format' => "Patient's birth date must be in yyyy-mm-dd format",
            'patientEmail.required' => "Patient's email is required",
            'patientEmail.email' => "Patient's email must be a valid email",
            'sampleUniqueId.required' => "The unique sample ID is required",
            'sampleResults.required' => "The sample result is required",
            'collectedDateTime.required' => "The collected datetime is required",
            'effectiveDateTime.required' => "The effective datetime is required"
        ];
    }
    protected function failedValidation(Validator $validator) 
    {
        throw new HttpResponseException(response()->json(
            $validator->errors(),
            400));
    }
}
