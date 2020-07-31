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
```

## Add Alias
```
alias hackcmd="hackcmd .hackcmd && source ~/.hackcmd/hackcmd.sh"
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
        'attach'
            command: docker attach $2
```

and run it
```
hackcmd
```

## Example

```
docker i // docker info
docker v // docker version
docker attach e8413e0b83d1 // attach container
```