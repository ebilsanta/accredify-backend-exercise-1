# Future features
## 1. Allow patients sent over with validated fields to be added to database. 
Currently, if one patient has fields that are invalid, all the patients sent are not added.  
I would like to improve the code to allow those with valid fields to be added, while providing the appropriate error message for the patient(s) with invalid fields.

## 2. More stringent testing for collectedDateTime and patientNationality format
I would like to randomly generate invalid fields for the collectedDateTime that only vary from the ISO-8601 format slightly for testing, to ensure that common mistakes are not validated. Similarly for patientNationality.

## 3. Add table constraints for patients table.
I would add the necessary constraints for the patients table such as the primary key, which would be sampleUniqueId assuming a patient can take multiple tests.

# Refactoring
## 1. Extract out function for creating patient in database instead of having it in store function of controller.
