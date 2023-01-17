# laravel-socket-chat
Laravel Socket Chat Application

## Requirment
- PHP 7.4
- Node 16.4.2
- NPM 7.18.1

## How to install
Install PHP dependancy using the <a href="https://getcomposer.org/" title="Composer" target="_blank">Composer</a>
```
composer install
```

To install NPM
```
npm install
npm run dev
```

Copy environment file and generate APP KEY using the following command

For Windows
```
copy .env.example .env
php artisan key:generate
```

For Linux:
```
cp .env.example .env
php artisan key:generate
```

## Start development server
Please strat development server for the Laravel using following command

```
php artisan serve
```

and for the connect socket server all the socket server related code available in the server.js
```
node server.js
```
