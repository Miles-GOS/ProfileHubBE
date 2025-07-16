# Laravel API – Profile Hub Backend

A RESTful API backend built with Laravel, designed to support user authentication, profile management, and secure API access. This backend powers the Profile Hub frontend.

---

## ⚙️ Configuration

| Component         | Version                           |
| ----------------- | --------------------------------- |
| PHP               | ^8.1 or newer                     |
| Laravel Framework | ^10.x                             |
| Composer          | ^2.x                              |
| Database          | MySQL / PostgreSQL (configurable) |
| API Auth          | Laravel Sanctum                   |

---

## 🚀 Getting Started (Local Setup)

### 1. Clone the repository

```bash
git clone https://github.com/your-org/profile-hub.git
cd profile-hub/backend
```

### 2. Install dependencies

```bash
composer install
```

#### 3. Set up environment

```
cp .env.example .env
```

Edit `.env` and update database connection and other config (DB_HOST, DB_PORT, etc.)

### 4. Generate application key

```
php artisan key:generate
```

### 5. Run migrations & seed data (optional)

```
php artisan migrate --seed
```

### 6. Start the local server

```
php artisan serve
```

API will be available at:

`http://localhost:8000/api`

---

## Production URL

`https://profilehubbe-1.onrender.com/`
