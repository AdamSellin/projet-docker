# Dockerfile
FROM php:7.4-apache
COPY php/ /var/www/html/
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions gd xdebug
RUN apt-get update && docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
EXPOSE 80

FROM mysql:latest
ENV MYSQL_ROOT_PASSWORD root123
ENV MYSQL_DATABASE docker_contact
ENV MYSQL_USER root
ENV MYSQL_PASSWORD root123
ADD setup.sql /docker-entrypoint-initdb.d
EXPOSE 3306
