# MedWeb - Medicinal Blog Website

A comprehensive web-based platform where medical professionals can publish blog posts about various diseases and treatments, and users can search for medical information by disease name or age group.

## 📋 Table of Contents
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Project Structure](#project-structure)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Configuration](#configuration)
- [Usage](#usage)
- [User Credentials](#user-credentials)
- [Admin Panel](#admin-panel)
- [Known Issues](#known-issues)
- [Contributing](#contributing)

## ✨ Features

- **Disease-specific blog posts** - Browse medical articles organized by disease categories
- **Advanced search functionality** - Search for posts by disease name
- **Age-based filtering** - Filter content based on age groups
- **User authentication** - Separate login for admins and doctors
- **Admin panel** - Complete content management system
- **Responsive design** - Works on desktop and mobile devices
- **Post management** - Create, read, update, and delete blog posts
- **Category management** - Organize posts by medical categories
- **User management** - Admin can manage users and doctors

## 🛠 Technologies Used

- **Frontend**: HTML5, CSS3, JavaScript, jQuery
- **Backend**: PHP 7.4+
- **Database**: MySQL 5.6+
- **Web Server**: Apache (via XAMPP)
- **Styling**: Custom CSS with Font Awesome icons
- **Template**: SB Admin 2 inspired design

## 📁 Project Structure

```
Database-Systems/
├── admin/                  # Admin panel files
│   ├── add-category.php   # Add new categories
│   ├── add-post.php       # Create new posts
│   ├── add-user.php       # Add new users
│   ├── category.php       # Manage categories
│   ├── post.php           # Manage posts
│   ├── users.php          # User management
│   └── ...
├── css/                   # Stylesheets
├── images/                # Image assets
├── docs(ReadME+DataBAse)/ # Documentation and database
│   ├── database.sql       # Database structure and data
│   └── Readme.txt         # Original readme
├── index.php              # Homepage
├── loading.php            # Loading screen
├── login.php              # User authentication
├── connect.php            # Database connection
├── about.php              # About page
├── contact.php            # Contact page
├── category.php           # Category listing
├── search.php             # Search functionality
├── single.php             # Individual post view
└── style.css              # Main stylesheet
```

## 📋 Prerequisites

Before running this project, make sure you have:

- **XAMPP** (Apache + MySQL + PHP)
- **Web browser** (Chrome, Firefox, Safari, etc.)
- **Text editor** (Visual Studio Code recommended)

## 🚀 Installation

### Step 1: Install XAMPP

1. Download XAMPP from [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html)
2. Install XAMPP to `C:\xampp` (default location)
3. Start XAMPP Control Panel
4. Start **Apache** and **MySQL** services

### Step 2: Setup Project Files

1. Copy the entire project folder to `C:\xampp\htdocs\`
2. Rename the folder to `medweb` (optional, for easier access)
3. The project should now be at `C:\xampp\htdocs\Database-Systems\`

### Step 3: Database Setup

1. Open your browser and go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Click "New" to create a new database
3. Name the database: `news-site`
4. Set collation to: `utf8mb4_general_ci`
5. Click "Create"
6. Select the `news-site` database
7. Click "Import" tab
8. Choose the file: `docs(ReadME+DataBAse)/database.sql`
9. Click "Go" to import the database

### Step 4: Configuration

The database connection is already configured in `connect.php`. Default settings:
- **Host**: localhost
- **Username**: root
- **Password**: (empty)
- **Database**: news-site

If your XAMPP MySQL has different credentials, update `connect.php`:

```php
<?php
    $hostname  = "http://localhost/Database-Systems";
    $conn = mysqli_connect("localhost","your_username","your_password","news-site") 
           or die("Connection failed : ".mysqli_connect_error());
?>
```

## 🎯 Usage

### Accessing the Website

1. Start XAMPP and ensure Apache and MySQL are running
2. Open your browser and go to one of these URLs:
   - **Loading page**: [http://localhost/Database-Systems/loading.php](http://localhost/Database-Systems/loading.php)
   - **Direct access**: [http://localhost/Database-Systems/index.php](http://localhost/Database-Systems/index.php)

### Navigation

- **Home** - View recent medical posts
- **Disease** - Browse posts by disease category
- **Search** - Find posts by disease name
- **Age Filter** - Filter content by age groups
- **Contact** - Contact information
- **About** - About the platform
- **Login** - Access admin/doctor panel

## 🔑 User Credentials

### Default Login Credentials

| Role | Username | Password | Access Level |
|------|----------|----------|-------------|
| Admin | `A` | `abc` | Full admin access |
| Doctor/User | `B` | `abc` | Post creation/editing |

### Password Security
- Passwords are stored as MD5 hashes in the database
- Default password `abc` = MD5 hash: `900150983cd24fb0d6963f7d28e17f72`

## 🔧 Admin Panel

Access the admin panel at: [http://localhost/Database-Systems/admin/](http://localhost/Database-Systems/admin/)

### Admin Features:
- **Post Management**: Create, edit, delete blog posts
- **Category Management**: Add, update, remove disease categories
- **User Management**: Add doctors, manage user accounts
- **Content Overview**: View all posts and statistics

### Admin Panel Pages:
- `post.php` - Manage all blog posts
- `add-post.php` - Create new posts
- `category.php` - Manage disease categories
- `add-category.php` - Add new categories
- `users.php` - User management
- `add-user.php` - Add new users

## 📊 Database Schema

### Tables:

1. **user** - User accounts (admins, doctors)
   - `user_id`, `first_name`, `last_name`, `username`, `password`, `role`

2. **category** - Disease categories
   - `category_id`, `category_name`, `post`, `age`

3. **post** - Blog posts
   - `post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`

### Stored Procedures:
- `get_categories()` - Retrieve all disease categories

## ⚠️ Known Issues

1. **Age filter doesn't work with search bar** - The age filtering and search functionality don't work together
2. **Contact form doesn't send emails** - Due to SMTP policy restrictions
3. **Image uploads** - Images are stored in `admin/upload/` directory
4. **Session management** - Basic PHP sessions without advanced security

## 🎨 Customization

### Styling
- Main styles: `style.css`
- Admin styles: `admin/style.css`
- Bootstrap: `admin/bootstrap.min.css`
- Font Awesome: `admin/font-awesome.css`

### Color Scheme
```css
:root {
    --background: #005;
    --primary: #88D5BF;
    --secondary: #5D6BF8;
    --third: #e27fcb;
}