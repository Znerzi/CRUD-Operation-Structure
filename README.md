Got it 👍 I’ll rewrite it in a **simple, student-friendly, easy-to-memorize version** you can confidently explain in your interview.

***

# 🚀 Applicants Management System (PHP CRUD)

## 📌 About This Project

This is a simple **CRUD system** using PHP and MySQL.  
It is used to **manage applicant records** like name, location, and position.

CRUD means:

* **Create** – add data
* **Read** – view data
* **Update** – edit data
* **Delete** – remove data

***

## 📁 Files in the Project

### 🗄️ Database

* `database.sql` → used to create the database

### ⚙️ PHP Files

* `db.php` → database connection
* `index.php` → display all data (READ)
* `create.php` → add new applicant (CREATE)
* `update.php` → edit applicant (UPDATE)
* `delete.php` → delete applicant (DELETE)

### 🎨 Style

* `style.css` → simple design for the page

***

## 🛠️ How to Run the Project

### Step 1: Import Database

1. Open **phpMyAdmin**
2. Click **Import**
3. Select `database.sql`
4. Click **Go**

***

### Step 2: Run in Browser

1. Put folder in:
   ```
   C:\xampp\htdocs\crudop\
   ```
2. Start **Apache** and **MySQL**
3. Open browser:
   ```
   http://localhost/crudop/
   ```

***

## 🧩 How CRUD Works

### ➕ CREATE (Add)

* Click **Add New Applicant**
* Enter name, location, position
* Click submit
* Data is saved

***

### 📖 READ (View)

* Main page shows all applicants
* Uses:
  ```sql
  SELECT * FROM applicants
  ```

***

### ✏️ UPDATE (Edit)

* Click **Edit**
* Change data
* Click update

***

### ❌ DELETE (Remove)

* Click **Delete**
* Confirm delete
* Data is removed

***

## 💾 Database Table

**Table: applicants**

* id → unique number
* name → applicant name
* location → address
* position → job applied

***

## 🔑 Simple Code Idea

### db.php

* connects PHP to MySQL

### index.php

* shows all data

### create.php

* inserts new data

### update.php

* updates existing data

### delete.php

* deletes data

***

## ⚠️ Important Notes

* Start XAMPP first
* Username: `root`
* Password: *(empty)*
* Import database before use

***

## 🎯 What You Show in Interview

You can say:

👉 “This project shows how I connect PHP to database and perform CRUD operations.”  
👉 “I use forms to get user input and SQL queries to manage data.”

***

## 💡 Easy Memory Tip (Very Important)

Remember this:

> **CRUD = Create, Read, Update, Delete**

AND:

> **Form → PHP → Database → Display**

***

## 🧠 Short Explanation (You can memorize this)

> “This is a simple PHP CRUD system. It allows users to add, view, edit, and delete applicants. It uses MySQL database and basic PHP queries to manage the data.”