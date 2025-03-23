# 📘 Laravel Book Management Application

## 🚀 Introduction

A Laravel-based web application for managing books, featuring authentication using Laravel Jetstream and unit testing with PHPUnit.

## 🎯 Features

-   User Authentication (Laravel Jetstream)
    -   Login & Register
    -   Email Verification
    -   Password Reset & Forgot Password
    -   Two-Factor Authentication (2FA)
    -   Browser Session Management
-   List User Verification
-   Book Management (CRUD operations)
-   Landing Page for Books
-   Unit Testing with PHPUnit
    -   test user registration
    -   test verification email is sent
    -   test user can_login with correct credentials
    -   test can get books list with authentication

## 🛠️ Installation

### 1. Clone the Repository

```sh
git clone https://github.com/your-repo.git
cd your-repo
```

### 2. Install Dependencies

```sh
composer install
npm install && npm run dev
```

### 3. Set Up Environment

Copy `.env.example` to `.env`:

```sh
cp .env.example .env
```

Update the `.env` file with your database credentials.

### 4. Generate Application Key

```sh
php artisan key:generate
```

### 5. Create Database, Run Migrations, and Seed Database

Create empty database in your db then run command

```sh
php artisan migrate --seed
```

### 6. Link Storage

```sh
php artisan storage:link
```

### 7. Start the Development Server

```sh
php artisan serve
```

## 🧪 Running Tests

To execute unit tests, run:

```sh
php artisan test
```

## 📌 Usage

1. Register or log in.
2. Verify your email (if required).
3. Manage books (Create, Read, Update, Delete).
4. Utilize 2FA for additional security.

## 📜 License

This project is open-source and available under the [MIT License](LICENSE).
