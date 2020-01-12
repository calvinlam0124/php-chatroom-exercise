# Composer
The source code managed by composer that follow PSR-2 and PSR-4. That also implement some features to keep the source code high quality.

### Feature
- PHPUnit
- Local git hook
- PHP-CS-fixer
- Docker
- docker-compose
- Knative

### Requirement
- PHP 7.4+
- ext-json

### Basic usage
```sh
# run in your local machine
php index.php

# or run in docker continer
DOCKER_IMAGE_NAME=local-chatroom-cli
docker build -t $DOCKER_IMAGE_NAME $(pwd)
docker run --rm -it $DOCKER_IMAGE_NAME
```
