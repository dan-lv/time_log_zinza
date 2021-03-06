FROM php:7.2-fpm
RUN apt-get update -y && apt-get install -y openssl zip unzip git libpng-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring pdo_mysql gd zip
