
build:
	@php var/cli.php phar/build

clean-cache:
	@find var/cache -type d ! -name "cache" -exec rm -rf {} \;
	@find var/cache -type f ! -name ".gitignore" -exec rm {} \;

clean-logs:
	@find var/logs -type d ! -name "logs" -exec rm -rf {} \;
	@find var/logs -type f ! -name ".gitignore" -exec rm {} \;

clean-runtime:
	@find var/runtime -type d ! -name "runtime" -exec rm -rf {} \;
	@find var/runtime -type f ! -name ".gitignore" -exec rm {} \;

clean-assets:
	@find var/web/assets -type d ! -name "assets"  -exec rm -rf {} \;
	@find var/web/assets -type f ! -name ".gitignore" -exec rm {} \;

stop:
	@kill -9 $$(cat $(CURDIR)/var/runtime/server.pid)
	@rm ./var/runtime/server.pid

start:
	@nohup php -S localhost:8080 $(CURDIR)/.server.php > $(CURDIR)/var/logs/server.log &
	@php -r "sleep(1); file_get_contents('http://localhost:8080');"
	@echo "server started: "$$(cat $(CURDIR)/var/runtime/server.pid)

test:
	@php ./.test.php run --coverage --html --xml

test-phar: build
	@php ./.test.phar.php run --no-exit

test-all: test-phar test

test-all-server: start test-phar test stop

clean: clean-cache clean-runtime clean-assets

clean-all: clean clean-logs

.PHONY: build test test-phar test-all test-all-server clean-cache clean-logs clean-runtime clean-assets clean clean-all start stop
