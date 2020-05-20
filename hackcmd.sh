function docker() {
	FILE=$PWD/example/.hackcmd
	if [[ -f "$FILE" ]]; then
		case $* in
			"v"* ) command docker version ;;
			"i"* ) command docker info ;;
			* ) echo '/usr/local/bin/docker $1' ;;
		esac
	else
	    echo '/usr/local/bin/docker $1'
	fi
}
function artisan() {
	FILE=$PWD/example/.hackcmd
	if [[ -f "$FILE" ]]; then
		case $* in
			"tinker"* ) command docker-compose run --rm php php artisan tinker ;;
			"link"* ) command docker-compose run --rm php php artisan storage:link ;;
			* ) echo 'Commands:
  - docker v
  - docker i
  - artisan tinker
  - artisan link
' ;;
		esac
	else
	    echo 'Commands:
  - docker v
  - docker i
  - artisan tinker
  - artisan link
'
	fi
}
