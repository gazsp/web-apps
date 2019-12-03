class: center, middle, title-page

# Web Apps - AJAX, JSON and APIs

#### Web Apps - CCO6005-20

https://github.com/gazsp/web-apps

---

# AJAX

* AJAX (Asynchronous JavaScript And XML) allows web pages to make requests without reloading the page
* The request runs in the background (asynchronous), and the result is returned to browser when the request finished
* Modern web apps / front-end frameworks make extensive use of AJAX

## Why use it?

* Allows you to perform actions / load data in the background
* Doesn't block the main thread (you can continue to use a webpage while an AJAX request is taking place)
* Makes your app 'feel' more like an app, and less like a website

---

# AJAX (continued)

*Vanilla JavaScript example*

```javascript
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'api/data.php');

    xhr.onreadystatechange = function () {
        var DONE = 4; // readyState 4 means the request is done.
        var OK = 200; // status 200 is a successful return.

        if (xhr.readyState === DONE) {
            if (xhr.status === OK) {
                var data = JSON.parse(xhr.responseText);
                console.log(data);
            } else {
                console.log('Error: ' + xhr.status);
            }
        }
    };

    xhr.send(null);
```

---

# AJAX (continued)

*jQuery example*

```html
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
```

```javascript
    $(document).ready(function() {
        $.ajax({
            url: "api/data.php"
        })
        .done(function(data) {
            console.log(data);
        })
    });
```

---

# APIs

* An API (Application Programmer Interface) defines a set of URLs (or end-points) that can be used to store / retrieve data
* They generally return JSON or XML (instead of HTML)
* An API will have a clearly defined Request and Response (what is sent vs. what is returned)
* APIs use standard HTTP request methods / status codes (GET, 200 OK, etc)

---

# JSON

* JSON (JavaScript Object Notation) is a way of representing objects and arrays as text in a structured way

```php
// PHP
$data = [
    'hello' => 'world'
];

echo json_encode($data, JSON_PRETTY_PRINT);
```

```json
{
    "hello": "world"
}
```
