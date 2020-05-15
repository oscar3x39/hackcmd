#!/usr/bin/env bash
function php() {
	FILE=$PWD/.aliases
	if [[ -f "$FILE" ]]; then
		case $* in
			"artisan tinker"* ) command docker-compose run php php artisan tinker ;;
			* ) command artisan help "$@" ;;
		esac
	fi
}