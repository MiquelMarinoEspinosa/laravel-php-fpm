.PHONY: coverage

SH_PHP=docker exec -i -t app.php-fpm

up: 
	docker-compose up

down:
	docker-compose down

bash:
	$(SH_PHP) sh

mysql:
	mysql -h 127.0.0.1 -P 3306 -u root -ptoor

db:
	$(SH_PHP) php artisan migrate

install:
	$(SH_PHP) composer install

build: install db

dump-autoload:
	$(SH_PHP) php composer.phar dump-autoload

unit:
	$(SH_PHP) vendor/bin/phpunit --testsuite Unit

integration:
	$(SH_PHP) vendor/bin/phpunit --testsuite Integration

coverage:
	$(SH_PHP) vendor/bin/phpunit --testsuite Unit,Integration --coverage-html coverage