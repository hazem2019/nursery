# Nursery Management System

A comprehensive, bilingual nursery management platform built with Laravel 13, MySQL 8+, Bootstrap 5, and Blade templates.

## Features

### Core Management
- Authentication and authorization
- User profiles and role-based access control
- Children and parent management
- Staff and teacher management
- Classes and academic years

### Operations
- Attendance tracking (children and staff)
- Leave management
- Activities and observations
- Medical records

### Finance
- Fee plans and invoicing
- Payment processing
- Expense tracking
- Financial reports and exports

### Communication
- Parent dashboard and portal
- Announcements and events
- Meals and transportation
- Notifications
- FAQ and bilingual chatbot

### Admin & Reporting
- Comprehensive reports and analytics
- CSV/Excel exports
- Audit logging
- System settings and configuration

## Technology Stack

- **Backend**: PHP 8.3+, Laravel 13
- **Database**: MySQL 8+
- **Frontend**: Bootstrap 5, Blade, JavaScript
- **Tools**: Composer, NPM, Vite
- **Permissions**: Spatie Laravel Permission

## Requirements

- PHP 8.3+
- Composer
- Node.js 18+
- MySQL 8+
- Git

## Installation

### 1. Clone Repository

```bash
git clone https://github.com/hazem2019/nursery.git
cd nursery
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database credentials:
```
DB_DATABASE=nursery
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Create Database

```bash
mysql -u root -p
CREATE DATABASE nursery CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

### 5. Run Migrations & Seeders

```bash
php artisan migrate
php artisan db:seed
```

### 6. Build Frontend Assets

```bash
npm run build
```

### 7. Link Storage

```bash
php artisan storage:link
```

### 8. Start Development Server

```bash
php artisan serve
```

Access the application at `http://localhost:8000`

## Default Login

- **Email**: admin@nursery.local
- **Password**: password123

⚠️ Change these credentials immediately in production.

## Localization

The system supports:
- **English** (LTR)
- **Arabic** (RTL)

Switch languages using the language selector in the UI.

## Development

### Watch Frontend Changes

```bash
npm run dev
```

### Run Tests

```bash
php artisan test
```

### Generate Optimizations

```bash
php artisan optimize
```

## Project Structure

```
nursery/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   ├── Policies/
│   ├── Services/
│   └── Observers/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── lang/
│   │   ├── en/
│   │   └── ar/
│   ├── views/
│   ├── css/
│   └── js/
├── routes/
├── storage/
├── tests/
├── bootstrap/
├── public/
└── storage/
```

## Deployment

For production deployment, see `deployment/production.md`

## Security

- CSRF protection enabled
- SQL injection prevention via Eloquent
- Authorization checks on all protected routes
- Role-based access control
- Audit logging
- Secure password hashing

## Support & Documentation

- See individual phase documentation
- Code comments throughout the project
- Translation files for error messages

## License

MIT - Free for commercial and personal use.

## Credits

Built as a production-ready nursery management solution with professional architecture and best practices.
