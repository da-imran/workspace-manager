# 🗂️ Workspace Manager – Laravel Task Management App

A simple Laravel-based task management system built as a technical assessment for a Software Engineer role.

## 📌 Features

- 🧑 User registration and login using **username, email, and password**
- 🗃️ Create and manage **workspaces**
- ✅ Add **tasks** to workspaces with a **required deadline (date & time)**
- 🔁 **Mark tasks** as completed or incomplete
- ⏳ **Human-readable time**:
  - Incomplete tasks: `3 days 2 hours remaining`
  - Completed tasks: `2 minutes ago`, `1 day ago`, etc.
- 🔒 Full **access control**:
  - Users can only view, edit, or delete **their own** workspaces and tasks

---

## 🧰 Tech Stack

- **Backend**: Laravel 10+
- **Database**: PostgreSQL
- **Frontend**: Blade templates with TailwindCSS
- **Authentication**: Laravel Breeze
- **Timezone Handling**: All deadlines and timestamps are timezone-aware (`Asia/Kuala_Lumpur`)

---

## 🚀 Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- PostgreSQL
- Node.js and npm (for frontend assets)

### Installation

1. **Clone the repository**
```bash
git clone https://github.com/yourusername/workspace-manager.git
cd workspace-manager
```

2. **Install dependencies**
```bash
composer install
npm install && npm run build
```

3. **Environment setup**
Copy .env.example to .env and configure your PostgreSQL database credentials.
```bash
cp .env.example .env
php artisan key:generate
```

4. **Setup PostgreSQL**
- Create your own username and password for the PostgreSQL.
- Create the database name **workspace_db**
- Populate the database, username and password in the .env file

5. **Run database migrations**
```bash
php artisan migrate
```

6. Start the application
```bash
php artisan serve
``` 

The app will be available at http://127.0.0.1:8000

## 🖥️ Usage Guide
1. Register using a username, email, and password
2. Create a workspace
3. Add tasks under a workspace
4. Set task deadline
5. Mark tasks as completed/incomplete
6. View time remaining for incomplete tasks or time passed for completed ones
7. Only you can see your workspaces and tasks

## ✅ Assessment Requirements Checklist
- [x] Register/login with username, email, password
- [x] Create workspace
- [x] Create task with deadline
- [x] Mark task complete/incomplete
- [x] Human-readable time status
- [x] Authorization: users can only access their own data


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
