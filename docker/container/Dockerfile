FROM php:7.0-apache

RUN apt-get update && \
  apt-get install git -y && \
  apt-get install wget -y

RUN cd /usr/local/bin/ && curl -s https://getcomposer.org/installer | php

RUN a2enmod rewrite
