# Coding exercise Sebastian

<pre>
Thank you.
Was fun coding it.
</pre>

### Instalation.

Please configure your MySQL database connection and modify the .env correspondingly 
```
DB_DNS = mysql:host=localhost;port=3306;dbname=jobsatdb
DB_USER = user
DB_PASSWORD =
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


