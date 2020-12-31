# Dockerfile
FROM php:7.4-apache
RUN apt-get update && docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY ./sql-scripts/ /docker-entrypoint-initdb.d/
COPY ./sql-scripts/setup.sql .
