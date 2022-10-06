<?php

namespace Tests\Feature;

use App\Http\Requests\PatientStoreRequest;
use App\Http\Controllers\PatientsApiController;
use Tests\TestCase;

class PatientCreateTest extends TestCase
{
    public function test_create_one_valid()
    {
        $response = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000A",
                    "patientName" => "Tan Chen Chen",
                    "patientGender" => "Female",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen@gmail.com",
                    "sampleUniqueId" => "Sample001",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-02-01T12:00:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ]
            ]
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('patients', [
            'patientNric' => 'S0000000A',
        ]);
    }

    public function test_create_multiple_valid()
    {
        $response = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000A",
                    "patientName" => "Tan Chen Chen",
                    "patientGender" => "Female",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen@gmail.com",
                    "sampleUniqueId" => "Sample001",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2008-09-21T18:41:18Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ],
                [
                    "patientNationality" => "AF",
                    "patientNric" => "S0000000B",
                    "patientName" => "Tan Chen Chen3",
                    "patientGender" => "Male",
                    "patientBirthDate" => "2000-01-30",
                    "patientEmail" => "tanchenchen2@gmail.com",
                    "sampleUniqueId" => "Sample002",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "1997-06-19T01:24:11Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ],
                [
                    "patientNationality" => "KY",
                    "patientNric" => "S0000000C",
                    "patientName" => "Tan Chen Chen4",
                    "patientGender" => "male",
                    "patientBirthDate" => "2020-12-15",
                    "patientEmail" => "tanchenchen3@yahoo.com.sg",
                    "sampleUniqueId" => "Sample003",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2004-08-07T02:50:39Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ],
                [
                    "patientNationality" => "FO",
                    "patientNric" => "S0000000D",
                    "patientName" => "Tan Chen Chen4",
                    "patientGender" => "female",
                    "patientBirthDate" => "2001-02-11",
                    "patientEmail" => "tanchenchen4@yahoo.com",
                    "sampleUniqueId" => "Sample004",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2009-08-22T07:03:08Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ],
            ]
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('patients', [
            'patientNric' => 'S0000000A',
        ]);
        $this->assertDatabaseHas('patients', [
            'patientNric' => 'S0000000B',
        ]);
        $this->assertDatabaseHas('patients', [
            'patientNric' => 'S0000000C',
        ]);
        $this->assertDatabaseHas('patients', [
            'patientNric' => 'S0000000D',
        ]);
    }

    public function test_nationality_invalid()
    {   
        $response = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SGD",
                    "patientNric" => "S0000000E",
                    "patientName" => "Tan Chen Chen",
                    "patientGender" => "Female",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen@gmail.com",
                    "sampleUniqueId" => "Sample001",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-02-01T12:00:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ],
            ]
        ]);
        $response2 = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "S",
                    "patientNric" => "S0000000F",
                    "patientName" => "Tan Chen Chen2",
                    "patientGender" => "Female",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen2@gmail.com",
                    "sampleUniqueId" => "Sample002",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-02-01T12:00:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ],
            ]
        ]);

        $response->assertStatus(400);
        $response2->assertStatus(400);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000E',
        ]);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000F',
        ]);
    }
    public function test_gender_invalid()
    {   
        $response = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000G",
                    "patientName" => "Tan Chen Chen",
                    "patientGender" => "emale",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen@gmail.com",
                    "sampleUniqueId" => "Sample001",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-02-01T12:00:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ],
            ]
        ]);
        $response2 = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000H",
                    "patientName" => "Tan Chen Chen2",
                    "patientGender" => "Femal",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen2@gmail.com",
                    "sampleUniqueId" => "Sample002",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-02-01T12:00:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ],
            ]
        ]);

        $response->assertStatus(400);
        $response2->assertStatus(400);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000G',
        ]);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000H',
        ]);
    }

    public function test_birthdate_invalid()
    {
        $response = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000I",
                    "patientName" => "Tan Chen Chen",
                    "patientGender" => "Female",
                    "patientBirthDate" => "199001-15",
                    "patientEmail" => "tanchenchen@gmail.com",
                    "sampleUniqueId" => "Sample001",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-02-01T12:00:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ],
            ]
        ]);
        $response2 = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000J",
                    "patientName" => "Tan Chen Chen2",
                    "patientGender" => "MALE",
                    "patientBirthDate" => "1990-01-1",
                    "patientEmail" => "tanchenchen2@gmail.com",
                    "sampleUniqueId" => "Sample002",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-02-01T12:00:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ]
            ]
        ]);

        $response->assertStatus(400);
        $response2->assertStatus(400);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000I',
        ]);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000J',
        ]);
    }

    public function test_email_invalid()
    {
        $response = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000K",
                    "patientName" => "Tan Chen Chen",
                    "patientGender" => "Female",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen@gmailcom",
                    "sampleUniqueId" => "Sample001",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-02-01T12:00:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ],
            ]
        ]);
        $response2 = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000L",
                    "patientName" => "Tan Chen Chen2",
                    "patientGender" => "Female",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen2gmail.com",
                    "sampleUniqueId" => "Sample002",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-02-01T12:00:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ]
            ]
        ]);
       

        $response->assertStatus(400);
        $response2->assertStatus(400);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000K',
        ]);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000L',
        ]);
    }

    public function test_collectedDateTime_invalid()
    {
        $response = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000M",
                    "patientName" => "Tan Chen Chen",
                    "patientGender" => "Female",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen@gmailcom",
                    "sampleUniqueId" => "Sample001",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "202-02-01T12:00:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ],
            ]
        ]);
        $response2 = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000N",
                    "patientName" => "Tan Chen Chen2",
                    "patientGender" => "Female",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen2gmail.com",
                    "sampleUniqueId" => "Sample002",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-0201T12:00:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ]
            ]
        ]);
        $response3 = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000O",
                    "patientName" => "Tan Chen Chen2",
                    "patientGender" => "Female",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen2gmail.com",
                    "sampleUniqueId" => "Sample002",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-02-01T12:0:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ]
            ]
        ]);
        $response4 = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000P",
                    "patientName" => "Tan Chen Chen2",
                    "patientGender" => "Female",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen2gmail.com",
                    "sampleUniqueId" => "Sample002",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-02-01T12:0:00Z",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ]
            ]
        ]);
        $response5 = $this->postJson('/api/patients', [
            'patients' => [
                [
                    "patientNationality" => "SG",
                    "patientNric" => "S0000000Q",
                    "patientName" => "Tan Chen Chen2",
                    "patientGender" => "Female",
                    "patientBirthDate" => "1990-01-15",
                    "patientEmail" => "tanchenchen2gmail.com",
                    "sampleUniqueId" => "Sample002",
                    "sampleResults" => "Negative",
                    "collectedDateTime" => "2021-02-01T12:0:00",
                    "effectiveDateTime" => "2021-02-01T12:00:00Z"
                ]
            ]
        ]);
       

        $response->assertStatus(400);
        $response2->assertStatus(400);
        $response3->assertStatus(400);
        $response4->assertStatus(400);
        $response5->assertStatus(400);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000M',
        ]);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000N',
        ]);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000O',
        ]);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000P',
        ]);
        $this->assertDatabaseMissing('patients', [
            'patientNric' => 'S0000000Q',
        ]);
    }
    public function test_example()
    {
        $response = $this->get('/api/patients');
        $response->assertStatus(200);
    }
}
