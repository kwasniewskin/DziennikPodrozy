# DziennikPodrozy

A full-stack web application for logging travel entries. It allows users to register, log in, and add travel notes including title, description, date, and optional photo. The project is built with PHP, MySQL, and Vue.js and serves as an educational portfolio piece.

## Features

- User authentication (registration, login, logout)
- Adding entries with title, date, description, and optional image
- Viewing travel entries
- Basic styling and responsiveness using CSS
- Vue.js used for dynamic rendering and frontend interactivity

## Technologies

- PHP (backend)
- MySQL (database)
- Vue.js (frontend)
- HTML/CSS

## Installation

1. Clone the repository:
git clone https://github.com/kwasniewskin/dziennikPodrozy.git

2. Import the `database.sql` file into your MySQL database (e.g., via phpMyAdmin).

3. Update the database credentials in `config.php`:
```php
$host = "localhost";
$user = "root";
$password = "";
$database = "travel_journal";
```

4. Place the project in the htdocs folder (e.g., C:/xampp/htdocs/travel-journal) and start Apache/MySQL using XAMPP.

5. Open the application in your browser at:
http://localhost/dziennikPodrozy

## Notes
This project is intended for educational purposes. It lacks production-level features such as password hashing, CSRF protection, and input validation. These should be added before deploying in a real-world environment.
