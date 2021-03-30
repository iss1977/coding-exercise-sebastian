# Coding exercise Sebastian

<pre>
Thank you.
Was fun coding it.
</pre>

### Instalation.

Please create a database with name "jobsatdb".

Run composer to install dependencies.
```
composer install
```


Please configure your MySQL database connection and modify the .env correspondingly 
```
DB_DNS = mysql:host=localhost;port=3306;dbname=jobsatdb
DB_USER = your_user_name
DB_PASSWORD = your_password
```

Run migrations:

```php
php migrations.php up
```

Add some sample data to the database:
```php
php migrations.php generate
```

Run the Server:
```php
php -S localhost:8000 -t public
```


