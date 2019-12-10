class: center, middle, title-page

# Web Apps

## Registration, Forgotten Passwords & Emails

https://github.com/gazsp/web-apps

---

# Registration

* Registration is simply creating a new row in the 'users' table
* We can do this with a standard HTML form, POST request and INSERT query
* The username / email column should be unique
* We can enforce this by adding a CONSTRAINT to the email_address column in the database, e.g:

```sql
ALTER TABLE users ADD CONSTRAINT uniq_email_address UNIQUE (email_address)
```

* The constraint needs a name, in this case 'uniq_email_address'
* Trying to insert a row with a duplicate email address with now throw an exception
* Look up PHP exception handling, try / catch to work out how to handle the error

---

# Forgotten Password

* If a user forgets their password, we'll need to email them a link to reset it
* Before we can do that, we'll need to generate a unique link for the user to be able to reset their password
* We can do this using something like this:

```php
    function set_reset_password_code($user_id) {
        $code = md5(microtime() . random_bytes(16));
        $sql = "UPDATE user SET reset_password_code = '$code' WHERE id='$user_id'";
        db()->query($sql);
    }
```

We can then email this code to the user, and retrieve their account with it later. The URL might look something like:

http://my-web-app/resetpassword.php?code=e333f2c54f49a1cb1f33d4ccf7cee986

---

# Forgotten Password (Continued)

The forgotten password flow should look something like this:

1. The user clicks 'Forgotten Password'
2. They're asked to enter their email address
3. If the address is found, we generate a unique code, and set this on the user entry in the database
4. We send the user a 'Reset Password' link email, with the code in the URL
5. When the user clicks the link, we retrieve their account by using the code
6. They can then enter a new password
7. We then update the users password, and clear the reset password code from the row in the database

---

# Sending Emails

* PHP has a built in email function - 'mail' - we won't be using it, as it relies on the machine PHP is running on to be configured correctly for sending email
* Instead we'll use an SMTP email library to send emails by directly communicating with an email SMTP server
* We'll use Mailtrap.io to capture all the emails that are sent (so we don't send emails to real people by accident)
* An example implementation using https://github.com/snipworks/php-smtp can be found the code folder 009-smtp-emails on Github
