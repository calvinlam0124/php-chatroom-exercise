# All-in-one
The source code just contain 2 files (index.php and classes.php).

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
