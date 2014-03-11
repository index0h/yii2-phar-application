
build:
	php var/cli.php phar/build

test:
	php ./.test.php run --coverage --html --xml

test-phar: build
	php ./.test.phar.php run --no-exit

clean-cache:
	find var/cache -type d ! -name "cache" -exec rm -rf {} \;
	find var/cache -type f ! -name ".gitignore" -exec rm {} \;

clean-logs:
	find var/logs -type d ! -name "logs" -exec rm -rf {} \;
	find var/logs -type f ! -name ".gitignore" -exec rm {} \;

clean-runtime:
	find var/runtime -type d ! -name "runtime" -exec rm -rf {} \;
	find var/runtime -type f ! -name ".gitignore" -exec rm {} \;

clean-assets:
	find var/web/assets -type d ! -name "assets"  -exec rm -rf {} \;
	find var/web/assets -type f ! -name ".gitignore" -exec rm {} \;

clean: clean-cache clean-runtime clean-assets

clean-all: clean clean-logs

test-all: test-phar test

.PHONY: build test test-phar test-all clean-cache clean-logs clean-runtime clean-assets clean clean-all