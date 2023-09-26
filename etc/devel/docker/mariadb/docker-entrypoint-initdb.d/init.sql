DROP USER IF EXISTS 'laravel';
CREATE USER 'laravel'@'%';
CREATE DATABASE IF NOT EXISTS laravel;
GRANT ALL ON laravel.* TO 'laravel'@'%' IDENTIFIED BY 'laravel';

CREATE DATABASE IF NOT EXISTS laravel_test;
GRANT ALL ON laravel_test.* TO 'laravel'@'%' IDENTIFIED BY 'laravel';
