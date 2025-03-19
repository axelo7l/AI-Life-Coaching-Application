Instructions Manual: Setting Up the Website

Step 1: Download and Install XAMPP

Go to https://www.apachefriends.org/download.html.

Download the XAMPP installer for your operating system.

Run the installer and follow the setup instructions.

Once installed, open the XAMPP Control Panel.

Start Apache and MySQL.

Step 2: Clone the Project to htdocs Folder

Open Command Prompt (Windows) or Terminal (Mac/Linux).

Navigate to the htdocs folder:

cd C:\xampp\htdocs  # Windows
cd /Applications/XAMPP/htdocs  # Mac/Linux

Clone the GitHub repository:

git clone https://github.com/axelo7l/AI-Life-Coaching-Application/

Rename the project folder if necessary (optional).

Step 3: Install Node.js and Dependencies

Download and install Node.js from https://nodejs.org/.

Open Command Prompt/Terminal, navigate to the project folder:

cd C:\xampp\htdocs\AI-Life-Coaching-Application\  # Windows
cd /Applications/XAMPP/htdocs/AI-Life-Coaching-Application/  # Mac/Linux

Install required dependencies:

npm install

Step 4: Run the Backend Server

Start the backend server:

node server.js

If successful, you should see:

Server running on port 5000

Step 5: Configure the Database

Open phpMyAdmin in your browser:

http://localhost/phpmyadmin

Create a new database (e.g., ITS120L).

Import the database schema (if provided):

Click on the database.

Go to Import and upload the .sql file.

Step 6: Open the Website in Localhost

Open a web browser.

Enter the following URL:

http://localhost/AI-Life-Coaching-Application/home.php

The website should now be running!