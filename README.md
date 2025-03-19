🚀 Website Setup Guide

This guide explains how to set up and run the project locally using XAMPP and Node.js.

📌 Prerequisites

XAMPP

Node.js

Git

🛠 Step 1: Install XAMPP

Download and install XAMPP from here.

Open XAMPP Control Panel.

Start Apache and MySQL.

🖥 Step 2: Clone the Repository

Open Command Prompt (Windows) or Terminal (Mac/Linux).

Navigate to the htdocs folder:

cd C:\xampp\htdocs  # Windows
cd /Applications/XAMPP/htdocs  # Mac/Linux

Clone the repository:

git clone https://github.com/axelo7l/AI-Life-Coaching-Application/

Rename the project folder if necessary (optional).

📦 Step 3: Install Node.js Dependencies

Open Command Prompt/Terminal and navigate to the project folder:

cd C:\xampp\htdocs\AI-Life-Coaching-Application  # Windows
cd /Applications/XAMPP/htdocs/AI-Life-Coaching-Application  # Mac/Linux

Install required dependencies:

npm install

🚀 Step 4: Run the Backend Server

Start the backend server:

node server.js

If successful, you should see:

Server running on port 5000

🗄 Step 5: Set Up the Database

Open phpMyAdmin in your browser:

http://localhost/phpmyadmin

Create a new database (e.g., ITS120L).

Import the database schema (if provided):

Click on the database.

Go to Import and upload the .sql file.

🌍 Step 6: Run the Website

Open a web browser.

Enter the following URL:

http://localhost/AI-Life-Coaching-Application/login.php

The website should now be running!

🔧 Troubleshooting

Port Conflict: If Apache or Node.js is not running, change the port in server.js or XAMPP settings.

Database Issues: Ensure the database is created and contains the required tables.

Check Console Logs: If the website doesn’t load, check the browser console (F12 > Console).

🎉 Your website is now set up and running locally!

