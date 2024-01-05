FROM php:apache

WORKDIR /var/www/html

COPY ./src /var/www/html

EXPOSE 80