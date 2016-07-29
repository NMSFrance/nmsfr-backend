FROM php:7-apache

RUN docker-php-ext-install pdo msql
RUN docker-php-ext-install pdo mysqli

RUN a2enmod rewrite
