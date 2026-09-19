.DEFAULT_GOAL := dev

.PHONY: up dev down

up:
	docker compose up -d --wait

dev: up
	composer run dev

down:
	docker compose down
