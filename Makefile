.DEFAULT_GOAL := dev

.PHONY: dev

# The workbench showcase, run the way Deployer's local Run does: install what is
# missing, then Testbench's server and Vite side by side. Order-only, so an
# existing vendor/ or node_modules/ is never reinstalled.
dev: | vendor/autoload.php node_modules
	composer run dev

vendor/autoload.php:
	composer install

node_modules:
	npm install
