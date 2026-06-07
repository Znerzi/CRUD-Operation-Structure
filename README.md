# CRUD Operation - Applicants Management System

## 📋 Project Files

### Database
- **database.sql** - SQL file for database and table creation

### PHP Files (Core Logic)
- **db.php** - Database connection (used in all files)
- **index.php** - READ - Display all applicants
- **create.php** - CREATE - Add new applicant
- **update.php** - UPDATE - Edit applicant
- **delete.php** - DELETE - Remove applicant

### Styling
- **style.css** - Basic styling for the application

---

## 🚀 How to Use

### Step 1: Import Database
1. Open PhpMyAdmin (http://localhost/phpmyadmin)
2. Click on "Import"
3. Choose **database.sql** file
4. Click "Go" to import

### Step 2: Run Application
1. Open browser
2. Go to: http://localhost/crudop/
3. You should see the applicants table

---

## 📝 Understanding CRUD Operations

### CREATE (Add New)
- Click "+ Add New Applicant"
- Fill in Name, Location, Position
- Click "Add Applicant"
- New data is inserted into database

### READ (View)
- Main page (index.php) displays all applicants
- Data is fetched from database using SELECT query
- Shows in a table format

### UPDATE (Edit)
- Click "Edit" button next to applicant
- Change the data in form
- Click "Update Applicant"
- Data is modified in database

### DELETE (Remove)
- Click "Delete" button next to applicant
- Confirm deletion
- Data is removed from database

---

## 💾 Database Structure

Table: **applicants**
- id (INT, Primary Key, Auto Increment)
- name (VARCHAR 100)
- location (VARCHAR 100)
- position (VARCHAR 100)

---

## 🔧 Simple Code Explanation

### db.php (Connection)
```
Contains connection details to MySQL database
Used in all other PHP files
```

### index.php (Read)
```
SELECT * FROM applicants - Gets all data
Loops through results and displays in table
```

### create.php (Insert)
```
Gets data from form
INSERT INTO applicants - Adds new record
Shows success message
```

### update.php (Update)
```
Gets ID from URL
SELECT - Loads current data
UPDATE SET - Modifies record
```

### delete.php (Delete)
```
Gets ID from URL
DELETE FROM - Removes record
Redirects to index.php
```

---

## ⚠️ Important Notes

1. Make sure XAMPP is running (Apache + MySQL)
2. Database credentials: root (username), password is empty
3. All files must be in: c:\xampp\htdocs\crudop\
4. Import database.sql first before using the app
5. This is basic code for learning (not for production)

---

## 🎓 Learn From This

- How to connect to MySQL database
- How to perform CRUD operations
- How to use forms to submit data
- How to work with database queries
- How to create simple web application

Enjoy learning! 👨‍💻
