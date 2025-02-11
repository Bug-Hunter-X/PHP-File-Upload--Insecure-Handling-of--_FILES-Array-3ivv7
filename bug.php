In PHP, a common yet easily overlooked error involves improper handling of the `$_FILES` superglobal array during file uploads.  The `$_FILES` array has a complex structure, and accessing its elements incorrectly can lead to unexpected behavior or security vulnerabilities.

For example, consider this code snippet attempting to access the uploaded file's temporary location:

```php
$temp_file = $_FILES['uploaded_file']['tmp_name'];
echo "File temporarily stored at: " . $temp_file;
```

This code *appears* correct, but it's vulnerable.  If no file was uploaded, or if the upload process failed (`$_FILES['uploaded_file']` is not set or is empty), accessing `['tmp_name']` directly will trigger a Notice (or even a fatal error depending on PHP's error reporting level) rather than gracefully handling the lack of an uploaded file.  This can crash scripts and potentially expose vulnerabilities.

Another similar issue arises when checking the file's `error` code. Developers often omit a proper check for upload errors, leading to insecure file uploads or unexpected outcomes.  Simply assuming that `$_FILES['uploaded_file']['error'] === 0` (no error) is not sufficient.