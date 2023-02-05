install:
	composer install

test:
	./vendor/bin/phpspec r -c tests/phpspec.yml

run:
	./bin/console app:scrape


