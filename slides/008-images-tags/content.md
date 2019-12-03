class: center, middle, title-page

# Web Apps - File Uploads and Tags

#### Web Apps - CCO6005-20

https://github.com/gazsp/web-apps

---

# File Uploads

* Files can be uploaded using form with a slight change to the form tag attributes
* Multiple file uploads are also supported from one form element by adding the 'multiple' attribute
* Named file inputs will then have an entry in the $_FILES array in PHP


```html
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="upload">
    <input type="file" name="uploads" multiple>
</form>
```

---

# File Uploads (Continued)

```php
    var_dump($_FILES['upload']);

    array (size=1)
      'upload' =>
        array (size=5)
          'name' => string 'Example PDF File.pdf' (length=19)
          'type' => string 'application/pdf' (length=15)
          'tmp_name' => string '/private/var/folders/2d/v_1pqw_j0rx9k7n1c51hf33r0000gp/T/phpbceFIb' (length=66)
          'error' => int 0
          'size' => int 49339
```
---

# File Uploads (Continued)

* The file 'error' value should be UPLOAD_ERR_OK (0)
* Other error constants such as UPLOAD_ERR_INI_SIZE can be found here: https://www.php.net/manual/en/features.file-upload.errors.php
* You should check the that file mime type ('type') is something that the user is allowed to upload
* Don't accept 'application/octet-stream' for example (which could be an executable or binary file)
* A file will be uploaded to a temporary location on the server, so we'll need to move it somewhere permanent
* See also: https://www.php.net/manual/en/features.file-upload.php


```php
    $file = $_FILES['upload'];

    // Build upload path + filename
    $filename = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $file['name'];

    move_uploaded_file($file['tmp_name'], $filename);
```

---

# Tagging Images

* We'll need new database tables to store Images and Tags
* Tags can be input when an image is uploaded using a text input element
* We can split a string by commas to allow multiple tags to be entered in to a single input field

```html
    <input type="text" name="tags">
```

```php
    // Example input string
    $_POST['tags'] = 'tag 1, tag 2';

    $tags = explode(',', $_POST['tags']);
    var_dump($tags);

    array (size=2)
        'tag 1', 'tag 2'
```
