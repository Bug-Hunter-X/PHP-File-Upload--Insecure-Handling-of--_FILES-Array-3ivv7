# PHP File Upload Vulnerability: Insecure $_FILES Handling

This repository demonstrates a common vulnerability in PHP file upload scripts: improper handling of the `$_FILES` superglobal array.  The vulnerability arises from directly accessing array elements without checking for their existence, which can lead to errors or security issues.

The `bug.php` file shows the insecure code. The `bugSolution.php` file presents a more robust and secure solution.

## Vulnerability

The insecure code directly accesses elements of the `$_FILES` array without verifying if the uploaded file exists or if the upload process was successful.  This could lead to:

* **Errors:** PHP Notices or fatal errors if `$_FILES['uploaded_file']` is not set.
* **Security Risks:** Potentially exposed vulnerabilities if error handling is missing.