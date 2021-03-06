SHELL=/bin/bash
DOCKER_COMPOSE ?= docker-compose
DOCKER_COMPOSE_EXEC_PHP = $(DOCKER_COMPOSE) exec php-cli
PHPUNIT_COVERATE_REPORT_FILE=file://$(shell pwd)/var/phpunit/coverage/index.html

.DEFAULT_GOAL := help

.PHONY: help
help:
	grep -E '^[a-zA-Z-]+:.*?## .*$$' Makefile | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "[32m%-12s[0m %s\n", $$1, $$2}'

.PHONY: test
test: test-phpcs test-phpunit ## Run tests

test-phpcs: ## Run PHPCS tests
	@$(DOCKER_COMPOSE_EXEC_PHP) vendor/bin/phpcs -p ./src -p ./tests --standard=PHPCompatibility,PSR2 --runtime-set testVersion 5.6-

test-phpunit: ## Run PHPUNIT tests
	@$(DOCKER_COMPOSE_EXEC_PHP) vendor/bin/phpunit -c phpunit.xml --coverage-html=var/phpunit/coverage
	@echo -e "Test coverage can be found here: $(PHPUNIT_COVERATE_REPORT_FILE)"

.PHONY: start_dev
start_dev: ## Start DEV in Docker
	$(DOCKER_COMPOSE) up -d --build
ifeq ($(wildcard vendor),)
	@$(DOCKER_COMPOSE_EXEC_PHP) rm -rf vendor composer.lock
	$(DOCKER_COMPOSE_EXEC_PHP) composer install
endif

.PHONY: stop_dev
stop_dev: ## Stop DEV in Docker
	$(DOCKER_COMPOSE) stop

.PHONY: restart_dev
restart_dev: ## Restart DEV in Docker
	$(DOCKER_COMPOSE) restart

.PHONY: down_dev
down_dev: ## Remove DEV containers from Docker
	$(DOCKER_COMPOSE) down
