class: center, middle, title-page

# Web Apps - Next Steps

**Features, Wireframes, Specifications, Schemas, Code Layout**

#### Web Apps - CCO6005-20

https://github.com/gazsp/web-apps

---

# Before we start...

* Some installations of MAMP have error report (helpfully) turned off
* If you're seeing a blank page or wondering why something isn't working, this code should help

```php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
```

> Add this to the start of your index.php file or a file that is included on every page

---

# Where we should be

<ul class="checklist">
    <li class="green">We should be able to log in and log out</li>
    <li class="green">Login should query the 'users' table in the database</li>
    <li class="green">A user should have a 'profile' in the database</li>
    <li class="green">We should retrieve the user profile from the database when the user logs in</li>
    <li class="green">We should have a 'posts' table to hold users posts</li>
</ul>

---

# Next steps

<ul class="checklist">
    <li>Posts - Users should be able to create Posts</li>
    <li>Comments - Users should be able to comment on Posts</li>
    <li>Tags - Users should be able to add Tags to Posts and Images</li>
    <li>Images - Posts should optionally be able to have an Image attached</li>
    <li>Likes - Users should be able like / unlike Posts, Comments and Images</li>
</ul>

> You should now know enough PHP and MySQL from previous classes to get Posts, Comments, Tags and Likes working to some extent

---

# So how do we start building all these new features?

* Each feature will have need a database table, as well as...
* The code to make each feature work, at a minimum:
    * Some HTML / forms
    * Some PHP code to read / write to the database
    * (eventaully) Some CSS to make it look pretty

---

# It's not just all about coding...

* __20% of the module grade is for documetation__
* __35% of the module grade is for design__
* 45% of the module grade is for implementation

> This means 55% of the module mark is based on the design (user flow, UX, UI + database design) and documentation (which should include a wireframe + database schema diagram)

* Docs + design make up 55% of mark
* See the module assessment criteria document

---

# Typical web development workflow

How do we go about developing new features?

* Design (Wireframing - how does it look)
* Document (Specification - how does it work)
* Develop (Making it work!)
* Release (Letting people us it!)
* Repeat!

---

# Wireframes

* Shows an overview of the app structue and how the sections of the app link together
* Shows the UI layout
* Does not go in to detail about styling / how UI elements look
* You don't need to use expensive tools / apps to create wireframes
* Use pencil / paper if you like! - https://sneakpeekit.com/

---

# Wireframes

<figure>
    <img src="/img/example-wireframe.png">
    <figcaption>
        Example website wireframe
    </figcaption>
</figure>


---

# Specifications

* Describe how each feature of the app is going to work
* If you can't describe how something works in words, you won't be able to write it in code
* You don't need to go in to huge amounts of detail!

An example specification for logging in might look like this:

* A user visits /users/login.php, where they can eneter a username and password
* The form is POSTed to the login.php script
* Query the database to see if the username and password is correct
* If it is, store the data returned from the database query in the session
* Otherwise display an error message to the user

---

# Database Schemas

* Shows how each table of the database is related
* Shows what data is stored in the database by:
    * Table name
    * Column name
    * Column type
* Diagrams can be created with MySQL Workbench (which can import directly from MySQL)

---

# Database Schemas

<figure>
    <img src="/img/mysql-wb.png">
    <figcaption>
        Example Database Schema being built in MySQL Workbench on macOS
    </figcaption>
</figure>

---

# Application Structure

* Currently our application is probably just a random collection of PHP files
* You should aim to structure your code so that it does not become a mess
* Ways of doing this include:
    * Splitting code up in to reusable functions
    * Using php includes to include these functions where needed
    * Using classes / objects / object-oriented programming (OOP)
    * Using an architectural pattern such as Model - View - Controller (MVC)

> OOP and MVC are advanced topics and you are *not required* to learn them to build your application. There are some links at the end of the slides that you can look in to if you want to know more.

---

# Application Structure

* How you layout your code is up to you
* There are some examples in the Github repo under code/004-code-structure
* One uses directories + multiple index files
* The other is a minimal MVC framework
* Pick whichever method makes the most sense to you

---

# Example Application Structure

<div class="cols">
    <div class="col">
        <h4>File Structure</h4>
        <pre>
index.php
posts/
    index.php
user/
    index.php
    logout.php</pre>
        <h4>URLs</h4>
        <pre>
http://localhost:8888/
http://localhost:8888/posts/
http://localhost:8888/user/
        </pre>
    </div>

<div class="col">
        <h4>Accessing Resources</h4>
        <pre>
// Show all posts
http://my-web-app/posts/

// View post 1 + any comments / images
http://my-web-app/posts/?id=1

// Show user profile 2
http://my-web-app/user/?id=2
        </pre>
    </div>
</div>

---

# Tips and tricks

* Likes can be applied to Posts, Comments and Images
* Tags can be applied to Posts and Images
* __We don't need to create multiple tables for each of these:
    * __i.e. 'likes_posts', 'likes_comments', 'likes_images'__
* We can create a 'likes' table, then add a 'type' column to it, to specify which item has been liked

---

# Tips and tricks (continued)

```sql
CREATE TABLE `likes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

> Technically this is called a 'polymorphic relationship' as it can relate multiple tables to each other

---

# Tips and tricks (continued)

**"User" id 1 liked the "Post" with an id of 2**

```sql
INSERT INTO `likes` (`user_id`, `type`, `item_id`)
VALUES
    (1, 'post', 2);
```

**Find all the "Likes" for the "Post" that has an id of 2**

```sql
SELECT * FROM likes WHERE type="post" AND item_id=2;
```

```
Result
id  item_id type    user_id
1   2       post    1
```

---

# Tips and tricks (continued)

Even better:

**Count all the likes for the "post" with an id of 2**

```sql
SELECT COUNT(id) AS like_count FROM likes WHERE type="post" AND item_id=2;
```

```
Result
like_count
1
```

---

# Additional Resources

**MySQL Workbench**

https://www.mysql.com/products/workbench/

**OOP in PHP**

https://tutorials.supunkavinda.blog/php/oop-intro

**MVC introduction**

https://www.tutorialspoint.com/mvc_framework/mvc_framework_introduction.htm
