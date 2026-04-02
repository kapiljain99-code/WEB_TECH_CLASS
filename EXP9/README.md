# Experiment 9: Product Management using PHP and MySQL

## 🔗 Live Link
http://localhost:8080/WEB_TECH_CLASS/EXP9/index.php

---

## 📌 Description
This experiment focuses on creating, storing, retrieving, and displaying product data using PHP and MySQL.

---

## 🎯 Objectives
- Connect PHP with MySQL database
- Store product details
- Retrieve and display data dynamically

---

## 🛠️ Technologies Used
- HTML5
- CSS3
- PHP
- MySQL (phpMyAdmin)
- XAMPP

---

## ⚙️ Features
- Add new product (with image upload)
- Store product data in database
- Display products dynamically
- Modern UI using CSS

---

## 🗄️ Database Structure

```sql
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price INT,
    image VARCHAR(255),
    rating FLOAT,
    stock VARCHAR(50)
);