FROM php:7.4-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

COPY ./app /var/www/html/app
COPY ./core /var/www/html/core
COPY ./public /var/www/html
COPY ./config /var/www/html/config

WORKDIR /var/www/html

CMD ["apache2-foreground"]
