FROM php:7-apache

RUN apt-get update && \
  apt-get install git -y && \
  apt-get install wget -y

RUN a2enmod rewrite

RUN cd /usr/local/bin/ && curl -s https://getcomposer.org/installer | php

WORKDIR /var/www/nmsfr

CMD ["php", "/usr/local/bin/composer.phar", "update"]
