FROM php:7.1-fpm-jessie

MAINTAINER Tuan <tuancode@icloud.com>

ENV TOOLS \
    multitail

ENV EXT_DEPS \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    libicu-dev \
    libsqlite3-dev

ENV PHP_EXTS \
    bcmath \
    gd \
    opcache \
    pdo_mysql \
    pdo_sqlite \
    mcrypt \
    intl \
    zip

ENV PECL_EXTS \
    apcu \
    redis \
    xdebug

RUN apt-get update && apt-get install -y --no-install-recommends ${TOOLS} ${EXT_DEPS} \
    # Install PHP Core Extensions
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install ${PHP_EXTS} \
    # Install PECL Extensions
    && pecl channel-update pecl.php.net \
    && pecl install ${PECL_EXTS} \
    && docker-php-ext-enable ${PECL_EXTS} \
    # Install Composer
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Permission fix
RUN usermod -u 1000 www-data
