FROM php:8.2-apache

COPY feira_matematica/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html