# Dockerfile
FROM php:7.4-apache
COPY php/ /var/www/html/
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN apt-get update && docker-php-ext-install pdo_mysql
RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions gd xdebug
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
EXPOSE 80