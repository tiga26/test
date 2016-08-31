1. Clone project into your server directory
2. Run composer install
3. Rename .env.example to .env and change to your server credentials
4. Create database mentioned in .env file
5. Run php artisan key:generate
6. Run php artisan migrate
7. Create some virtual host, because server is not configured for work with localhost
8. Enjoy