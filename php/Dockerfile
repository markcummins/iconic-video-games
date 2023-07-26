FROM php:8.0-apache

RUN a2enmod rewrite
    
RUN apt update

RUN apt install -y \
      g++ \
      libicu-dev \
      libpq-dev \
      libzip-dev \
      zip \
      zlib1g-dev \ 
      libpng-dev \
      libjpeg-dev \
      libfreetype6-dev \
      libzip-dev
      
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install \
      intl \
      opcache \
      pdo \
      pdo_pgsql \
      pgsql \ 
      gd \
      zip

WORKDIR /var/www/laravel_docker

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer