# Screenshots of finished product
## Retrieving all patients from database
![alt text](https://github.com/ebilsanta/accredify-backend-exercise-1/blob/main/readme_images/get_all_patients.png?raw=true)
## Adding new patients from list
![alt text](https://github.com/ebilsanta/accredify-backend-exercise-1/blob/main/readme_images/create_new_patients.png?raw=true)
## Patients created in MySQL Database
![alt text](https://github.com/ebilsanta/accredify-backend-exercise-1/blob/main/readme_images/database.png?raw=true)

# How to test
1. Check DB variables in .env.example, in particular DB_USERNAME and DB_PASSWORD for your  local MySQL connections.
2. Start local MySQL connection.
3. Run "php artisan migrate" in root folder of app directory.
4. Key in "yes" when prompted to create database.
5. Run "php artisan test" to run test cases.

# API URLS for testing on Postman
## GET: http://localhost:8000/api/patients
To retrieve all patients from database  
## POST: http://localhost:8000/api/patients
Send a JSON list of patients with valid fields to add to database



