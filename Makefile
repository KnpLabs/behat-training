COMPOSE_PROJECT_NAME=symfony-training


.PHONY: start
start: build up install-dependencies init-database

.PHONY: stop
stop: down

.PHONY: run
run:
ifeq ($(CMD),)
	$(error You have to provide a command to execute)
endif
	docker exec -it $(shell docker ps -q --filter name=$(COMPOSE_PROJECT_NAME)_php) $(CMD)

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

.PHONY: init-db
init-database:
	docker exec -it $(shell docker ps -q --filter name=$(COMPOSE_PROJECT_NAME)_php) bin/console --no-interaction doctrine:database:create --if-not-exists
	docker exec -it $(shell docker ps -q --filter name=$(COMPOSE_PROJECT_NAME)_php) bin/console --no-interaction doctrine:migrations:migrate

.PHONY: down
down:
	docker-compose -f docker-compose.yaml -p $(COMPOSE_PROJECT_NAME) down