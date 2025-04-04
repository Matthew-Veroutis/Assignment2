# E-COMMERCE 420-411-VA Assignment 2

## Overview
This assignment requires that you choose one of the business rules below to implement as part of an MVC (Model-View-Controller) architecture. You do not need to implement the user interface to test the rule; instead, you may write the test as a unit test. Additionally, you must apply user input validation as described.

## Business Rules
Choose only **one** rule per teammate from the following list:

1. **Rule 1: Employee Record Validation (Matthew Veroutis)**
   - Ensure all employee records contain the necessary details: **first name**, **departmentID**, and **title**.

2. **Rule 2: Project Record Validation (Matthew Macri)**
   - Ensure all project records contain the necessary details: **name** and **budget**.

3. **Rule 3: Project Budget Validation**
   - Ensure all project records have a **budget amount greater than zero**.

4. **Rule 4: Department Record Validation**
   - Ensure all department records contain the necessary detail: **name**.

5. **Rule 5: Employee Title Validation**
   - Ensure all employee records have the **title only containing alphabetical characters**.

## User Input Validation
In addition to implementing the selected business rule, apply the following user input validation to all fields:

```php
function validateInput($data) {
    // Trim whitespace from the beginning and end of the input
    $data = trim($data);
    // Remove backslashes from the input
    $data = stripslashes($data);
    // Convert special characters to HTML entities
    $data = htmlspecialchars($data);
    return $data;
}