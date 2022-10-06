# Screenshots of finished product
## Retrieving all patients from database
![alt text](https://github.com/ebilsanta/accredify-backend-exercise-1/blob/main/readme_images/get_all_patients.png?raw=true)
## Adding new patients from list
![alt text](https://github.com/ebilsanta/accredify-backend-exercise-1/blob/main/readme_images/create_new_patients.png?raw=true)
## Patients created in MySQL Database
![alt text](https://github.com/ebilsanta/accredify-backend-exercise-1/blob/main/readme_images/database.png?raw=true)

# How to test
1. Check DB variables in .env.example, in particular DB_USERNAME and DB_PASSWORD for your local MySQL connections.
2. Rename .env.example to .env
3. Start local MySQL connection.
4. Run "php artisan migrate" in root folder of app directory.
5. Key in "yes" when prompted to create database.
6. Run "php artisan test" to run test cases.

# API URLS for testing on Postman
## GET: http://localhost:8000/api/patients
To retrieve all patients from database  
## POST: http://localhost:8000/api/patients
Send a JSON list of patients with valid fields to add to database

# Technical Diagram
![alt text](https://github.com/ebilsanta/accredify-backend-exercise-1/blob/main/readme_images/technical_diagram.png?raw=true)

# Note about test coverage
I would like to apologise as I have only achieved 43.5% test coverage as reported by Xdebug.  
To be honest, I do not have much experience with generating test coverage and testing in general. Moreover, I began this assignment with only basic working knowledge of PHP and hence it took me over 6 hours to learn Laravel and create this. I hope you can grant me some leniency as I am definitely willing to learn but cannot spare any more time for this assignment. Thank you.
![alt text](https://github.com/ebilsanta/accredify-backend-exercise-1/blob/main/readme_images/test_coverage.png?raw=true)


