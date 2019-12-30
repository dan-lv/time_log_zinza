FROM php:7.2-fpm
RUN apt-get update -y && apt-get install -y openssl zip unzip git libpng-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring pdo_mysql gd zip
RUN curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar && \
    cp phpcs.phar /usr/local/bin/phpcs && \
    chmod +x /usr/local/bin/phpcs && \
    phpcs --config-set default_standard PSR2
RUN curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar && \
    cp phpcbf.phar /usr/local/bin/phpcbf && \
    chmod +x /usr/local/bin/phpcbf && \
    phpcbf --config-set default_standard PSR2
