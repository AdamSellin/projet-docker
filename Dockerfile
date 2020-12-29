# Dockerfile
FROM php:7.4-apache
COPY php/ /var/www/html/
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
EXPOSE 80