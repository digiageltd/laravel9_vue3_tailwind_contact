## How to install?
Basic instructions how to run the form:

- Run "composer install";
- Run "npm install";
- Run "npm run dev";
- rename ".env.dist" file to ".env" and configure database and mailtrap connections
- Run "php artisan migrate";

## Testing
Basic instructions how to run the test:

- Create a new database called lrvlcontact_test (If name is different you should change it in phpunit.xml on line 25 to match yours!);
- rename ".env.testing.dist" file to ".env.testing" and configure testing database and testing mailtrap connections
- Run "php artisan migrate --env=testing";
- Run the test using "php artisan test";

## Used technologies

- **[Laravel 9](https://laravel.com/)**
- **[Vue 3](https://vuejs.org/)**
- **[Tailwind](https://tailwindcss.com/)**
