install:
	composer install
console:
	composer exec --verbose psysh
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
test:
	composer run-script test
report:
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml