function php() {
	FILE=$PWD/.hackcmd
	if [[ -f "$FILE" ]]; then
		case $* in
			"artisan tinker"* ) command $compose php artisan tinker ;;
			"artisan link"* ) command $compose php artisan storage:link ;;
			* ) command "$@" ;;
		esac
	fi
}