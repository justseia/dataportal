FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
      supervisor \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git \
      curl \
      gnupg \
      libicu-dev \
      g++ \
      build-essential \
      libjpeg-dev \
      libfreetype6-dev \
      libjpeg62-turbo-dev \
      libmcrypt-dev \
      libgd-dev \
      jpegoptim optipng pngquant gifsicle \
      libonig-dev \
      libxml2-dev \
      && docker-php-ext-install pdo pdo_pgsql \
      && docker-php-ext-install bcmath \
      && docker-php-ext-install gd \
      && docker-php-ext-install zip \
      && docker-php-ext-install intl \
      && docker-php-ext-install sockets  \
      && apt-get clean \
      && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
      apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install mbstring exif pcntl bcmath gd

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini
COPY ./_docker/nginx/conf.d/nginx.conf /etc/nginx/conf.d/nginx.conf

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

WORKDIR /var/www
