class: center, middle, title-page

# Web Apps

## Deployment

https://github.com/gazsp/web-apps

---

# Getting our web app live

* An app needs to be deployed to a webserver to be accessible from the internet
* There are lots of ways to do this, but we'll be using FTP
* To push the files to the webserver, you'll need to use an FTP client such as FileZilla
* We'll also need to copy or recreate our database on the live server
* We can do this by exporting our database to an SQL file locally, then importing the file on the remote server

---

# Environments

* Different servers (local, live, staging etc.) are called 'environments'
* The URL, filesystem paths, database details etc. will be different for each environment
* Your local database details and any absolute file system paths will not work on the live server
* You'll need to check which host you're running on, and change the database details accordingly
* Any filesystem paths used in code should either be relative, or should use $_SERVER['DOCUMENT_ROOT']
* Also check that all filename are lowercase - the webserver is running Linux and filenames are case sensitive
* Example code is in Github
