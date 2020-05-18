function artisan() {
	FILE=$PWD/.hackcmd
	if [[ -f "$FILE" ]]; then
		case $* in
			"tinker"* ) command docker-compose run --rm php php artisan tinker ;;
			"link"* ) command docker-compose run --rm php php artisan storage:link ;;
			* ) echo "tinker, link" ;;
		esac
	fi
}