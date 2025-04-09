# Task-App
Build a simple CRUD (Create, Read, Update, Delete) Task Management application using Laravel. With this application a user should be able to create, update, delete, and view their tasks.

## Project Setup Instructions

Follow the steps below to set up and run the Laravel Task Management CRUD application on your local machine:

### Requirements

- PHP 8.x
- Composer
- MySQL
- Laravel CLI
- Internet Connection (for Tailwind CDN)

### Clone the Repository

git clone https://github.com/fabian894/Task-App.git

### Install Dependencies

composer install

### Database Setup

1. **Option 1: Use Provided SQL Script**

   - Locate the included `task_app_script.sql` file in the db_script folder of the project.
   - Import it directly into your MySQL database.

2. **Option 2: Run Laravel Migrations and Seeders**

If you prefer to generate the schema and data using Laravel:

php artisan migrate:fresh
php artisan migrate
php artisan make:seeder UserSeeder
php artisan db:seed

Make sure to update your `.env` file with the correct database credentials.
**Note:** unzip the .env file as github restricted the .env file to be pushed along the project to the repository

### Serve the Application

php artisan serve


Visit `http://localhost:8000/tasks/userid` in your browser. Replace the userid with any of the users on the user table on the databse 

### Styling Notice

 **Note:** The application uses **Tailwind CSS CDN**, so an active internet connection is required for proper styling.
