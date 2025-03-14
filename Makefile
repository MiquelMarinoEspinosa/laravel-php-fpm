.PHONY: coverage

SH_PHP=docker compose exec -i -t php-fpm

build: 
	docker compose build

up: 
	docker compose up

down:
	docker compose down
	docker compose rm

bash:
	$(SH_PHP) sh

db-client:
	mysql -h 127.0.0.1 -P 3306 -u root -ptoor

db:
	$(SH_PHP) php artisan migrate

install:
	$(SH_PHP) composer install

config: install db

dump-autoload:
	$(SH_PHP) php composer.phar dump-autoload

unit:
	$(SH_PHP) vendor/bin/phpunit --testsuite Unit

db-test-create:
	$(SH_PHP) php artisan migrate --env=testing

db-test-rollback:
	$(SH_PHP) php artisan migrate:rollback --env=testing

integration: db-test-create
	$(SH_PHP) vendor/bin/phpunit --testsuite Integration
	make db-test-rollback

acceptance: db-test-create
	$(SH_PHP) vendor/bin/phpunit --testsuite Acceptance
	make db-test-rollback

tests: db-test-create
	$(SH_PHP) vendor/bin/phpunit --testsuite Unit,Integration,Acceptance
	make db-test-rollback
	make behat

coverage: db-test-create
	$(SH_PHP) vendor/bin/phpunit --testsuite Unit,Integration,Acceptance --coverage-html coverage
	make db-test-rollback

behat:
	$(SH_PHP) vendor/bin/behat

