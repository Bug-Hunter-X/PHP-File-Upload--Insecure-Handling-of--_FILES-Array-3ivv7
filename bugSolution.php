A secure solution involves first verifying the existence and validity of the `$_FILES` data before accessing its members:

```php
<?php
if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK) {
    $temp_file = $_FILES['uploaded_file']['tmp_name'];
    $file_name = $_FILES['uploaded_file']['name'];
    $file_size = $_FILES['uploaded_file']['size'];
    $file_type = $_FILES['uploaded_file']['type'];

    //Further validation and sanitization
    //Check file size, type, extension etc.

    //Move the uploaded file to its final destination
    $upload_dir = 'uploads/';
    $target_file = $upload_dir . basename($file_name);
    if (move_uploaded_file($temp_file, $target_file)) {
        echo "File uploaded successfully!";
    } else {
        echo "Error uploading the file.";
    }
} else {
    echo "No file uploaded or upload error occurred.";
}
?>
```

This improved code first checks if `$_FILES['uploaded_file']` is set and if the upload was successful (`UPLOAD_ERR_OK`). Then it proceeds to access the array members safely.  Additional validation and sanitization steps should be implemented to prevent vulnerabilities such as file type validation and size limits.