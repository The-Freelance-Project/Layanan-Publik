## Requirements

- PHP >= 8.3
- Composer
- Laravel >= 11.x
- MySQL or PostgreSQL (for proper transaction support)

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
   php artisan migrate:fresh --seed
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
