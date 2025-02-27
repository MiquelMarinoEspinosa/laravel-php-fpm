laravel php fpm

* Create `.env` and `.env.testing` based on `.env.example` and change the following parameters
    * `.env`
        * DB_HOST=app.mariadb
        * DB_DATABASE=app
        * DB_PASSWORD=toor
    * `.env.testing`
        * DB_HOST=app.mariadb
        * DB_DATABASE=app_test
        * DB_PASSWORD=toor
* Execute the following commands
    * make up
    * make install
* Enter inside the docker container and execute the following command
    * make bash
    * php artisan key:generate
* Execute the database migrations
    * make db
    * make db-test-create
* Execute the tests
    * make tests