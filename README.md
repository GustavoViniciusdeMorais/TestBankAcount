# Laravel ORM

I build this repository to save the setup for Laravel projects with my docker files.

Created by: Gustavo Vinicius

### Run Tests
```

sudo docker-compose up -d --build

sudo docker exec -it tphp sh

php artisan migrate:refresh
php artisan test --filter UserTest
php artisan test --filter BalanceTest
php artisan test --filter TransactionsTest

```

### Fix code errors
```

composer require squizlabs/php_codesniffer

vendor/bin/phpcbf --standard=PSR2 app/*

```

Composer requirements:

```
composer require laravel/sanctum:^2
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
touch database/database.sqlite
```

```
/etc/init.d/mysql stop
sudo docker-compose up -d --build
sudo docker exec -it [-u 0] [container_name] sh
sudo docker-compose down
sudo docker inspect [CONTAINER_ID] | grep IP
chmod +x composer.sh
./composer.sh
composer create-project laravel/laravel:^8.0 appname
cp -R appname/* .
rm -rf appname/
php artisan key:generate
chmod +x clearcash.sh
./clearcash.sh
php artisan key:generate
php artisan db:seed --class=GroupSeeder
php artisan db:seed --class=UserSeeder
sudo git remote set-url origin https://[token]@github.com/Repository
php artisan db:seed --class=ProductSeeder
php artisan tinker
\App\Models\Product::find(1)->short_title
```

### Postgres
```
psql -d postgres -U postgres
\l # list databases
\c # connect to database
\dt # show tables
\d table # describe table
select * from customers;
```

### Database Commands

```
touch database/database.sqlite
php artisan migrate
php artisan make:model Order -m
php artisan make:model Customer -m
php artisan make:factory CustomerFactory
php artisan make:seeder CustomerSeeder
php artisan migrate:refresh
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=ProductSeeder
php artisan db:seed --class=CustomerSeeder
# Sqlite
apk add sqlite
sqlite3 database/database.sqlite
.tables
select * from products
.exit
```

### Email

```
php artisan make:mail ProductStock --markdown=emails.products.stock
```

### Event Listener

```
php artisan make:event OrderCreated
php artisan make:listener OrderCreatedListener --event=OrderCreated
```

### Laravel 8

- Configurations
    - Cop the .env file and setup the mysql IP container and auth data

### TDD Laravel 8

- Steps:
    - php artisan make:test BasicTest
        - This class will be at tests/Feature/ folder.
    - chmod -R 777 ./
    - chmod +x composer.sh
    - ./composer.sh
    - Import the class to be tested into the Test class.
    - Rename the BasicTest method.
    - Inside the method write the test.
        - Use $this->assertEquals('RESULT', $result);
    - Run the command php artisan test

```
php artisan test
```
![TDD](/imgs/tddLaravel.png)