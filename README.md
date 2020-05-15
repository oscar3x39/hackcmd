hackcmd is a custom your command in your folder directory.

### How to install environment

via Mac OSX
```
brew install php
brew install libyaml
pecl install yaml
```

## How to setup
```
git clone https://github.com/oscar3x39/hackcmd.git ~/.hackcmd
ln -s ~/.hackcmd/hackcmd /usr/local/bin/hackcmd
echo "source ~/.hackcmd/hackcmd.sh" > ~/.zshrc
```

## How to used

touch A `.aliases` in your root directory
```
env:
    compose: docker-compose run --rm php

alias:
    'php artisan $param':
        command: '$compose php artisan $param'
        workdir:
            - ./src
        root: true
    'gs':
        command: 'git status'
```

## Manual
```
hackcmd .aliases
```

## Global Setting
```
export HACKCMD_DIR="~/code"
```