function docker() {
	FILE=$PWD/.hackcmd
	if [[ -f "$FILE" ]]; then
		case $* in
			"tinker"* ) command docker-compose run --rm php php artisan tinker ;;
			* ) /usr/local/bin/docker $1 ;;
		esac
	else
	    /usr/local/bin/docker $1;;
	fi
}
function artisan() {
	FILE=$PWD/.hackcmd
	if [[ -f "$FILE" ]]; then
		case $* in
			"tinker"* ) command docker-compose run --rm php php artisan tinker ;;
			"link"* ) command docker-compose run --rm php php artisan storage:link ;;
			* ) Commands:
tinker
tinker
link ;;
		esac
	else
	    Commands:
tinker
tinker
link;;
	fi
}
