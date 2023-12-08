install:
	composer install
console:
	composer exec --verbose psysh
lint:
    composer exec --verbose phpcs -- --standard=PSR12 src bin
test:
	composer run-script test
report:
    XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-html coverage --coverage-filter src