COMPOSE_PROJECT_NAME=behat-training


.PHONY: start
start: build up install-dependencies

.PHONY: stop
stop: down

.PHONY: behat
behat:
	docker exec -it $(shell docker ps -q --filter name=$(COMPOSE_PROJECT_NAME)_php) ./vendor/bin/behat $(ARGS)

.PHONY: crawler
crawler:
	docker exec -it $(shell docker ps -q --filter name=$(COMPOSE_PROJECT_NAME)_php) php -f src/crawler.php

###############################################################################

.PHONY: build
build:
	docker-compose -f docker-compose.yaml -p $(COMPOSE_PROJECT_NAME) build

.PHONY: up
up:
	docker-compose -f docker-compose.yaml -p $(COMPOSE_PROJECT_NAME) up -d

.PHONY: install-dependencies
install-dependencies:
	docker exec -it $(shell docker ps -q --filter name=$(COMPOSE_PROJECT_NAME)_php) composer install --no-scripts

.PHONY: run
run:
ifeq ($(CMD),)
	$(error You have to provide a command to execute)
endif
	docker exec -it $(shell docker ps -q --filter name=$(COMPOSE_PROJECT_NAME)_php) $(CMD)

.PHONY: down
down:
	docker-compose -f docker-compose.yaml -p $(COMPOSE_PROJECT_NAME) down