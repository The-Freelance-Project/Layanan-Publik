## Requirements

- PHP >= 8.3
- Composer
- Laravel >= 11.x
- MySQL

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/The-Freelance-Project/Layanan-Publik.git
   cd Layanan-Publik
   ```
2. Install dependencies via Composer:
   ```bash
   composer install
   ```
3. Install node Dependencies :
   ```bash
   npm install
   ```

4. Copy `.env.example` to `.env` and configure your database and other necessary environment variables:
   ```bash
   cp .env.example .env
   ```
5. Generate the application key:
   ```bash
   php artisan key:generate
   ```
6. Run database migrations and seed the database with test data:
   ```bash
   php artisan migrate --seed
   ```

7. Build node modules (for tailwindCss) :
   ```bash
   npm run build
   ```

## Usage

1. Start the local development server:
   ```bash
   php artisan serve
   ```
2. Start development for Tailwind using:
   ```bash
   npm run dev
   ```

## User Login

1. User:
   - email
      ```bash
      user@gmail.com
      ```
   - password
      ```bash
      123456
      ```

1. Admin:
   - email
      ```bash
      admin@gmail.com
      ```
   - password
      ```bash
      123456
      ```


## Directory for FrontEnd

### Work at this folders:
`resource/views/`

### Directory Overview 

|- views
|   |- admin
|   |  - dashboard.blade.php
|
|   |- auth
|   |  - login.blade.php
|   |  - register.blade.php
|
|   |- components
|   |  - alert.blade.php
|
|   |- user
|   |  |- complaints
|   |  |  - complaintForm.blade.php
|   |  |  - complaintList.blade.php
|   |  |  - complaintView.blade.php
|   |  - dashboard.blade.php
|
|   |- landingPage.blade.php

