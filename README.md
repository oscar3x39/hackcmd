Hackcmd is a custom your command in your folder directory.

### How to install environment

via Mac OSX
```
brew install php
brew install libyaml
pecl install yaml
```

## How to setup
```
git clone git@github.com:oscar3x39/hackcmd.git ~/.hackcmd
ln -s ~/.hackcmd/hackcmd /usr/local/bin/hackcmd
echo "source ~/.hackcmd/hackcmd.sh" > ~/.zshrc
```

## How to used

touch A `.hackcmd` in your root directory
```
env:
    compose: docker-compose run --rm php

alias:
    php:
        'artisan tinker':
            command: $compose php artisan tinker
        'artisan link':
            command: $compose php artisan storage:link
```

## Manual
```
hackcmd .hackcmd
```

### How It Work.
```
#!/usr/bin/env bash
function artisan() {
	FILE=$PWD/.aliases
	if [[ -f "$FILE" ]]; then
		case $* in
            "tinker"* ) command docker-compose run php php artisan tinker ;;
            "link"* ) command $compose php artisan storage:link ;;
		esac
	fi
}
```