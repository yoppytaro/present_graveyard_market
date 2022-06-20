FROM php:7.4-fpm 
COPY php.ini /usr/local/etc/php/
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \ 
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    vim \
  && docker-php-ext-install zip pdo_mysql opcache
RUN docker-php-ext-configure gd \
  -with-freetype=/usr/include/ \
  --with-jpeg=/usr/include/ \
  && docker-php-ext-install gd
WORKDIR /var/www
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1 
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
RUN composer global require "laravel/installer"