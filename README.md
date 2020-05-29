Hackcmd is a custom your command in your folder directory.

### Environment

via Mac OSX
```
brew install php
brew install libyaml
pecl install yaml
```

## Getting started
```
git clone git@github.com:oscar3x39/hackcmd.git ~/.hackcmd
ln -s ~/.hackcmd/hackcmd /usr/local/bin/hackcmd
echo "source ~/.hackcmd/hackcmd.sh" >> ~/.zshrc
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
```

and run it
```
hackcmd .hackcmd
```

## Example

```
docker i // docker info
docker v // docker version
```