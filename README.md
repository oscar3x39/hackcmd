hackcmd is a custom your command in your folder directory.

## How to used

touch A `.hackcmd` in your root directory
```
env:
    compose: docker-compose run --rm php
php:
    alias:
        - php artisan $param
        - $compose php artisan $param
    WORKDIR:
        - ./src
    ROOT: true
```

Manual
```
hackcmd .hackcmd
```

Global setting
```
export HACKCMD_DIR="~/code"
```


## How to install
Basic
```
git clone https://github.com/oscar3x39/hackcmd.git ~/.hackcmd
mv ~/.hackcmd/hackcmd /usr/local/bin/
echo "source ~/.hackcmd/hackcmd.sh" > ~/.zshrc
```