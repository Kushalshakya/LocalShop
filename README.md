# LocalShop Admin Panel

An Admin Panel for LocalShop which can handle basic CRUD (Create, Read, Update, Delete) operations. This project is built using PHP and MySQL as the backend.

## Features

- **Create** new user entries
- **Read** existing user entries

## Pending Features
- **Update** existing user entries
- **Delete** user entries


## Getting Started

### Database Configuration

1. Create the database:

    ```sql
    CREATE DATABASE `localshop`;
    ```

2. Import the `localshop.sql` file from the `src/sql/localshop.sql` directory:

    ```sh
    mysql -u username -p localshop < src/sql/localshop.sql
    ```

    Replace `username` with your MySQL username. You will be prompted to enter your MySQL password.

### Web Server Configuration

1. Place the project files in your web server's root directory. For example, in Apache, this is typically `htdocs` or `www`.
2. Ensure your web server is configured to serve PHP files.

### Configuration

1. Update the database connection settings in the configuration file (e.g., `config/database.php`) to match your MySQL credentials:

    ```php
    <?php
    date_default_timezone_set('Asia/Kathmandu');

    $database = mysqli_connect('127.0.0.1','root','','localshop');
    if(!$database){
        die("Connection Failed". mysqli_connect_error());
    }
    ?>
    ```

## Usage

Once everything is set up, you can access the admin panel via your web browser. The default URL will be something like:  `http://127.0.0.1/localshop`

## Project Structure

- `index.php` - The main entry point for the application.
- `config/` - Configuration file for database connection.
- `templates/` - Contains HTML templates.
- `vendors/` - Contains Different Libraries for better UI & Functionalities.
- `src/` - Contains source files for the project.
    - `js/` - Contains JavaScript files.
    - `css/` - Contains CSS files.
    - `img/` - Contains Images files.
    - `scss/` - Contains SCSS files.
    - `sql/` - Contains SQL files for database setup.
