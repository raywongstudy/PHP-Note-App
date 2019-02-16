# PHP-Note-App

This is a simple PHP based note app written in vanilla PHP, from file based version to database version, and finally a simple MVC structured version.

The commit history is considered to be a step-by-step tutorial to build the application, so some of them contains debug output.

## Requirements
- PHP 7.0 or above
- `php-pdo`, `php-mbstring` extension

## Versions

### File Based

1. Please checkout with Tag `file-based`
2. Create a folder named `notes` in the root directory to store note data
3. Run the application with `php -S localhost:8080` or any of your preferred web servers.

### Database Based

1. Please checkout with Tag `db-based`
2. Create a database named `note_app`
3. Create table `note_app`
```sql
CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
4. Edit the PDO connection string in `database.php`
5. Run the application with `php -S localhost:8080` or any of your preferred web servers.

### MVC Structured

1. Please checkout with Tag `mvc`
2. Create a database named `note_app`
3. Create table `note_app`
```sql
CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
4. Edit the database configuration file in `core/config.php`
5. Run the application with `php -S localhost:8080` or any of your preferred web servers.

## Credits

Special thanks to the amazing tutorial <a href="https://laracasts.com/series/php-for-beginners">The PHP Practitioner</a> from <a href="https://laracasts.com">Laracasts</a> by <a href="https://github.com/JeffreyWay">@jeffreyway</a>, the MVC version of this app is inspired from this tutorial.