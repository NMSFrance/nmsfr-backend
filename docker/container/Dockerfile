FROM php:7-apache

RUN apt-get update && \
  apt-get install git -y && \
  cd /usr/local/bin && \
  curl -sS https://getcomposer.org/installer | php && \
  alias composer="/usr/local/bin/composer.phar" && \
  composer install

RUN a2enmod rewrite
