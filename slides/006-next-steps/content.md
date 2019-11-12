class: center, middle, title-page

# Web Apps - Next Steps

**Features, Wireframes, Specifications, Schemas, Code Layout**

#### Web Apps - CCO6005-20

https://github.com/gazsp/web-apps

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

# Next Steps

<ul class="checklist">
    <li>Comments - Users should be able to comment on Posts</li>
    <li>Tags - Users should be able to add Tags to Posts and Images</li>
    <li>Images - Posts should optionally be able to have an Image attached</li>
    <li>Likes - Users should be able like / unlike Posts, Comments and Images</li>
</ul>

---

# So how do we start building all these new features?

* Each feature will have need a database table (obviously), as well as...
* ...the code to make each feature work, at a minimum:
    * Some HTML / forms
    * Some PHP code to read / write to the database
    * Some CSS to make it look pretty

---

# It's not just all about coding...

* __20% of the module criteria is for documetation__
* __35% of the module criteria is for design__
* 45% of the module criteria is for implementation

> This means 55% of the module mark is based on the design (user flow, UX, UI + database design) and documentation (which should include a wireframe + database schema diagram)

https://bathspa.aula.education/#/dashboard/J8mYaBFIpG/materials/ivYYaC7cKu

???

* Web development isn't all about coding
* Docs + design make up 55% of mark
* See the module assessment criteria document

---

# Typical web development workflow

* Design (Wireframing - how does it look)
* Document (Specification - how does it work)
* Develop (Making it work!)
* Release (Letting people us it!)

---

# Wireframes

* Gives an overview of the app structue
* Shows how the sections of the app link together
* Shows the UI layout
* Does not go in to detail about styling / how UI elements look
* You don't need to use expensive tools / apps to create wireframes
* Use pencil / paper if you like! - https://sneakpeekit.com/

---

# Specifications

* Describe how each part of the app is going to work
* If you can't describe how something works in words, you won't be able to write it in code
* You don't need to go in to huge amounts of detail!

E.g.

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

# Code Layout

* How you layout your code is up to you
* There are some examples in the Github repo under code/004-code-structure
* One uses directories + multiple index files
* The other is a minimal MVC framework using models (M), templates (or Views) and controllers (C)
* Pick whichever method makes the most sense

---

__File structure__

```
    index.php
    posts/
        index.php
    comments/
        index.php
    user/
        index.php
        logout.php
```

__URLs__

```
    http://my-web-app/
    http://my-web-app/posts/
    http://my-web-app/user/
```

---

__Accessing resources / models__

```
    // Show all posts
    http://my-web-app/posts/

    // View post 1 + any comments / images
    http://my-web-app/posts/?id=1

    // Show user profile 2
    http://my-web-app/user/?id=2
```

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
  `type` varchar(32) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

> Technically this is called a 'polymorphic relationship'

???

Technically this is called a 'polymorphic relationship'

---

# Tips and tricks (continued)

**"User" id 1 liked the "Post" with an id of 2**

```sql
INSERT INTO `likes` (`item_id`, `type`, `user_id`)
VALUES
    (2, 'post', 1);
```

**Find all the "Likes" for the "Post" with an id of 2**

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

???

---
