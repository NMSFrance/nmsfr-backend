FROM php:7.0-apache

RUN apt-get update && \
  apt-get install git -y && \
  apt-get install wget -y

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
        libmcrypt-dev \
        libpng12-dev \
        libjpeg-dev \
        libpng-dev \
        vim \
    && docker-php-ext-install iconv mcrypt \
    && docker-php-ext-configure gd \
        --enable-gd-native-ttf \
        --with-freetype-dir=/usr/include/freetype2 \
        --with-png-dir=/usr/include \
        --with-jpeg-dir=/usr/include \
    && docker-php-ext-install gd \
    && docker-php-ext-install mbstring \
    && docker-php-ext-enable opcache gd

RUN cd /usr/local/bin/ && curl -s https://getcomposer.org/installer | php
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite
