Medicinal Blog Website
This is a medicinal blog website where doctors can publish blog posts related to various diseases and users can search for blogs by disease name.

Getting Started:
1-To run this website on your local machine, you will need to install XAMPP and Visual Studio Code.
2-Install the possible extensions if you are unable to run the php files if its not working
3-Move the simple-blog-page-master folder to the htdocs folder in your XAMPP installation directory.
4-Launch XAMPP and start the Apache and MySQL modules.
5-Open the PHPMyAdmin dashboard by going to http://localhost/phpmyadmin in your web browser.
6-Create a new database called news-site stated below as well 
7-Import the database.sql file located in the simple-blog-page-master folder inside docs and name the database news-site
8-Open the config.php file located in the simple-blog-page-master folder in Visual Studio Code.
9-Change the MySQL username and password to match your XAMPP MySQL credentials.
10-Save and close the connect.php file if you followed the right step or else change your database and roots and IP accordingly.
11-Open your web browser and go to http://localhost/simple-blog-page-master to view the website.
Usage:
1-Once the website starting running run loading.php which will then loads to index.php
2-To view the list of all blog posts, simply visit the homepage of the website. To search for medicine posts related to a particular disease, use the search bar located just below the navigation bar of the homepage.
3-Go to Login and enter the credentials Admin username and password is A,abc and for user/doctor
username and password is B,abc
4-To create a new medicine post, log in to the website using the credentials provided in the database.sql file. Once logged in, you will be able to create, edit, and delete medicine posts.

Credits:
This website was created using PHP, MySQL, HTML, and CSS,javascript. The website design is based on the SB Admin 2 template.
Dependencies:
1-PHP 7.4 or later
2-MySQL 5.6 or later
Known Issues
1-The age filter dont corresponds along with searchbar.
2-Contact form doesnt notifies due to the SMTP Policies