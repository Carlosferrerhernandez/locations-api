# Locations API

This project is an API built with Laravel that allows you to manage and obtain information about locations. Below are the steps required to install, configure, and run the application, as well as the corresponding tests.

## **Prerequisites**
Before you begin, make sure you have installed:
- PHP 8.2 or higher
- Composer
- MySQL or SQLite
- Laravel Installer (optional)

## **Installation**

### **1. Clone the repository**
Clone the project repository to your local machine:
```bash
git clone https://github.com/carlosferrerhernandez/locations-api.git
cd locations-api
```

### **2. Install backend dependencies**
Run the following command to install the Laravel dependencies:
```bash
composer install
```

### **3. Setting Environment Variables**
Copy the `.env.example` file and rename it to `.env`:
```bash
cp .env.example .env
```
Then, adjust the following variables in the `.env` file:

#### **Database Settings:**
If you are using MySQL:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=locations
DB_USERNAME=root
DB_PASSWORD=your_password
```

#### **API Key Settings:**
Make sure to add your API key:
```dotenv
API_KEY=your_api_key
```

### **4. Generate Application Key**
Run this command to generate the unique application key:
```bash
php artisan key:generate
```

### **5. Run Migrations**
Create the necessary tables in the database:
```bash
php artisan migrate
```

### **6. Seed Initial Data (Optional)**
If you need initial data for testing or development, run:
```bash
php artisan db:seed
```

## **Running the Application**

### **1. Start the Server**
Run the following command to start the Laravel development server:
```bash
php artisan serve
```

### **2. Access the API**
The API will be available at: `http://127.0.0.1:8000`.

#### **Test Endpoint:**
```http
GET /api/locations
Headers:
X-API-KEY: your_api_key
```

## **Running Tests**

### **1. Setup a Test Database**
In the `.env` file, setup a separate database for testing. If you're using MySQL:
```dotenv
APP_ENV=testing
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=locations_test
DB_USERNAME=root
DB_PASSWORD=your_password
```

### **2. Running migrations for testing**
Make sure you run migrations on the test database before running the tests:
```bash
php artisan migrate --database=mysql
```

### **3. Running unit tests**
Run the tests defined in the project:
```bash
php artisan test
```

#### **Included Tests**
- Verification that the API Key is required.
- Verification that an invalid API Key returns an error.
- Testing that locations are returned correctly.
- Testing for empty response when there are no locations in the database.

## **Useful Commands**

- **Check code standards with PHP CodeSniffer:**
```bash
composer check:cs
```

- **Automatically fix style issues:**
```bash
composer fix:cs
```

- **Format code with Laravel Pint:**
```bash
composer pint
```

- **Static analysis with PHPStan:**
```bash
composer analyse:phpstan
```

## **Contributions**

If you want to contribute to the project:
1. Create a fork of the repository.
2. Create a new branch for your feature:
```bash
git checkout -b new-feature
```
3. Submit a Pull Request.

## **License**

This project is licensed under the [MIT License](LICENSE).