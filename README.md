Hackcmd is a custom your command in your folder directory.

## Example

```
docker i // docker info
docker v // docker version
artisan tinker // docker-compose run --rm php php artisan tinker
artisan link // docker-compose run --rm php php artisan storage:link
```

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

touch A `.hackcmd` in your root directory
```
env:
    compose: docker-compose run --rm php
alias:
    'docker':
        'v':
            command: docker version
        'i':
            command: docker info
    'artisan':
        'tinker':
            command: $compose php artisan tinker
        'link':
            command: $compose php artisan storage:link
```

## Manual
```
hackcmd .hackcmd
```