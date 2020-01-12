FROM composer:1.9.1 as php-composer
COPY . /var/www/html
WORKDIR /var/www/html
RUN composer global require hirak/prestissimo
RUN composer install --no-dev --ignore-platform-reqs

FROM php:7.4.1-cli-buster
WORKDIR /opt/app
COPY . /opt/app
COPY --from=php-composer /var/www/html/vendor /opt/app/vendor
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
CMD ["php", "demo.php"]
