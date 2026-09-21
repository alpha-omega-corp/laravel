.DEFAULT_GOAL := dev

.PHONY: up dev down

# The application runs without a database: sessions, cache and queue are file
# and sync drivers, and nothing is stored. `up` is here for when a project
# built on this template adds one — it is not a prerequisite of `dev`.
up:
	docker compose up -d --wait

dev:
	composer run dev

down:
	docker compose down
