
# Notification Message Subscription

Application that is responsible for notifying users subscribed to a specific category.




## Authors

- [@alda-1995](https://github.com/alda-1995)


## Installation

Install all the dependencies using composer

```bash
  composer install
```
Copy the example env file and make the required configuration changes in the .env file
```bash
  cp .env.example .env
```
Run the database migrations (Set the database connection in .env before migrating)
```bash
  php artisan migrate --seed
```
Start the local development server
```bash
  php artisan serve