# Patient Backend API

## Table of Contents
+ [About](#about)
+ [Getting Started](#getting_started)
+ [API Endpoints](#endpoints)
+ [Testing](#test)

## About <a name = "about"></a>
This is a simple Laravel app containing endpoints to retrieve and create patient data. Patient data is validated before being created in an SQL database.

## Getting Started <a name = "getting_started"></a>
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### Prerequisites

A running MySQL server

```
You can use MAMP/WAMP to start a MySQL server 
```

### Installing locally

1. Clone this Github repository

```
git clone https://github.com/ebilsanta/patient-api-backend
```

2. Change directory

```
cd patient-api-backend
```

3. Rename .env.example in the root folder to .env  

4. Replace database variables in .env. DB_USERNAME and DB_PASSWORD according to your database credentials, as well as DB_PORT for your MySQL port. 

5. Create database

```
php artisan migrate
```

6. Start local development server
```
php artisan server
```
The local development server should now be accessible at http://127.0.0.1:8000.

## API Endpoints <a name = "endpoints"></a>

Base URL `http://127.0.0.1:8000`  

**Get all patients data**

* **URL:** `/patients`

* **Method:** `GET` 

* **Success Response:**  

  * **Code:** 200 <br />
    **Content:** List of patient data
 
* **Error Response:**

  * **Code:** 500 Internal Server Error <br />
    **Fixes:** Check MySQL server is running. Check MySQL credentials in .env

* **Sample Call:**
  ![alt text](https://github.com/ebilsanta/accredify-backend-exercise-1/blob/main/readme_images/get_all_patients.png?raw=true)
  
----
**Create patient**

* **URL:** `/patients`

* **Method:** `POST` 

*  **Body Params**

   Patients - List of Patient  
   
   Patient fields: 
   | Patient Field  | Field Type | Description |
    | ------------- | ------------- |------------- |
    | patientNationality  | String  |   Nationality code following ISO 3166-1 alpha-2 standard  |
    | patientNRIC  | String |  NRIC of patient  |
    | patientName  | String |  Name of patient  |
    | patientGender | String |  Gender of patient ('Male' or 'Female') |
    | patientBirthDate  | String |  Patient Date of Birth in YYYY-mm-dd format  |
    | patientEmail  | String |  Valid email of patient  |
    | sampleUniqueId  | String |  Unique string identifying sample  |
    | sampleResults  | String |  Result of Covid test ('Positive' or 'Negative')  |
    | collectedDateTime  | String |  String representing datetime of result collection in ISO-8601 UTC string format  |
    | effectiveDateTime  | String |  String representing effective datetime of result in ISO-8601 UTC string format  |


* **Success Response:**  

  * **Code:** 200 <br />
    **Content:** HTML String "Patients added successfully"
 
* **Error Response:**

  * **Code:** 400 Bad Request <br />
    **Fixes:** Check response for invalid field(s) and error(s)
    ![alt text](https://github.com/ebilsanta/accredify-backend-exercise-1/blob/main/readme_images/post_response_error.png?raw=true)
    
* **Sample Call:**  

  ![alt text](https://github.com/ebilsanta/accredify-backend-exercise-1/blob/main/readme_images/valid_post_request.png?raw=true)
  
## Testing <a name = "test"></a>

Run tests using PHPUnit

```
php artisan test
```

The test coverage shown is 43.5% but manually calculated to be around 80%.

![alt text](https://github.com/ebilsanta/accredify-backend-exercise-1/blob/main/readme_images/test_coverage.png?raw=true)


