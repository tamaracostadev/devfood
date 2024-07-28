# DevFood API
DevFood is a multitenant system that provides a backend API to manage various restaurant-related entities. This README documents the publicly available endpoints.

## API Endpoints
### Version 1 (/v1)
#### Tenants
- List all tenants
  
``` http
GET /v1/tenants
```

- Get a specific tenant
``` http
GET /v1/tenants/{uuid}
```

- List all categories by tenant
``` http
GET /v1/categories
``` 
- Get a specific category
``` http
GET /v1/categories/{identify}
```

#### Products

- List all products by tenant
``` http
GET /v1/products
``` 
- Get a specific product
``` http
GET /v1/products/{identify}
``` 
#### Tables
- List all tables by tenant
``` http
GET /v1/tables
``` 
- Get a specific table
``` http
GET /v1/tables/{identify}
``` 
#### Client
- Register a new client
``` http
POST /v1/client
``` 
#### Orders
- List all orders
``` http
GET /v1/orders
``` 
- Get a specific order
``` http
GET /v1/orders/{identify}
``` 
- Create a new order
``` http
POST /v1/orders
``` 
#### Authentication
- Get authentication token
``` http
POST /v1/sanctum/token
``` 
- Get authenticated user information
``` http
GET /v1/auth/me
``` 
- Logout
``` http
GET /v1/auth/logout
```

#### My Orders

- List my orders
``` http
GET /v1/my-orders
``` 
- Update a specific order
``` http
PATCH /v1/my-orders/{identify}
``` 
### Internal Functionalities
#### Broadcast Channels
Broadcast channels are used internally by the application for real-time functionalities like order notifications. They are not directly accessible via the public API.

#### Admin Routes (/admin)
Admin routes are protected by authentication and are used to manage users, products, categories, permissions, plans, and more. These routes are consumed by the administrative frontend of the application and are not exposed as a public API.

### Technologies Used
- Laravel Framework
- PHP
- MySQL
- HTML, CSS, JavaScript
### Installation Instructions

1. Clone the repository:

``` bash
git clone https://github.com/tamaracostadev/devfood.git
``` 
2. Install dependencies:
``` bash
composer install
npm install
``` 
3. Configure the .env file:

``` bash
cp .env.example .env
php artisan key:generate
``` 
4. Run migrations and seeders:

``` bash
php artisan migrate --seed
``` 
5. Start the development server:

``` bash
php artisan serve
npm run dev
``` 
