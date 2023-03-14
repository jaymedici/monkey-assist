<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/jaymedici/monkey-assist/blob/main/public/images/monkey_assist_logo.png" width="400" alt="MonkeyAssist Logo"></a></p>


## About MonkeyAssist

MonkeyAssist is a demo ticket support ticketing system built with love using Laravel, Livewire and TailwindCSS.

### Installation
- Git clone the repo
- Rename the .env.example to .env and change the variables to match your server
- On your shell install the app's dependencies via composer:
```html
composer install
```

- Install node packages and dependencies
```html
npm install
```

- Generate application encryption key
```html
php artisan key:generate
```

- Migrate the tables
```html
php artisan migrate
```

- Seed the database with dummy data and a default admin. 
```html
php artisan db:seed
```
Credentials for the admin are: email: info@test.com password: password

- Compile the front-end
- If you're on a development server, you can run:
```html
npm run dev
```
- If you want to compile for productiom, you can use:
```html
npm run build
```

- The system also use queues to send email at some point. You can run the queue worker with:
```html
php artisan queue:work
```

- Finally, serve your application
```html
php artisan serve
```

