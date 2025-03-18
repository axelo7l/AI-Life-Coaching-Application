AI Life Coaching Application - Setup Manual

Prerequisites

Before setting up the project, ensure you have the following installed:

XAMPP (for PHP and MySQL)

Composer (PHP dependency manager)

Node.js (for frontend dependencies)

Git (for version control)

VS Code or any IDE

1. Setting Up XAMPP and MySQL Database

Download & Install XAMPP:

Download from https://www.apachefriends.org/

Install and run Apache & MySQL from the XAMPP Control Panel.

Create the MySQL Database:

Open phpMyAdmin (http://localhost/phpmyadmin)

Click New, enter its120l, and click Create.

Import database.sql (if provided) via Import.

2. Backend Setup (Laravel)

Navigate to the Backend Directory:

cd path/to/backend

Install Dependencies:

composer install

Set Up Environment Variables:

Copy .env.example to .env

cp .env.example .env

Update .env file with:

DB_DATABASE=its120l
DB_USERNAME=root
DB_PASSWORD=

Generate Application Key & Migrate Database:

php artisan key:generate
php artisan migrate

Start Laravel Server:

php artisan serve

The backend should now be running at http://127.0.0.1:8000

3. Frontend Setup (React + Supabase)

Navigate to the Frontend Directory:

cd path/to/frontend

Install Dependencies:

npm install

Set Up Environment Variables:

Create .env.local and add:

REACT_APP_SUPABASE_URL=your_supabase_url
REACT_APP_SUPABASE_ANON_KEY=your_supabase_anon_key

Start React Development Server:

npm start

The frontend should now be running at http://localhost:3000

4. Connecting Frontend & Backend

Update Frontend API Base URL in src/config.js:

export const API_BASE_URL = "http://127.0.0.1:8000/api";

Ensure CORS is configured in Laravel (app/Http/Middleware/Cors.php):

return $next($request)
    ->header('Access-Control-Allow-Origin', '*')
    ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
    ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');

5. Running the Application

Start XAMPP (Apache & MySQL)

Start Laravel Backend: php artisan serve

Start React Frontend: npm start

Open http://localhost:3000 in your browser.

