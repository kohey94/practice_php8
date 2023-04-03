FROM php:8.0-fpm

# Install and enable mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql

WORKDIR /var/www/html
