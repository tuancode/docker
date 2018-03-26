FROM php:7.1-fpm-alpine

MAINTAINER Tuan <tuancode@icloud.com>

ENV PHPIZE_DEPS \
    autoconf \
    g++ \
    make \
    file \
    re2c \
    curl

ENV EXT_DEPS \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    libmcrypt-dev \
    openssl-dev \
    icu-dev \
    openldap-dev \
    sqlite-dev

ENV PHP_EXTS \
    bcmath \
    gd \
    ldap \
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

RUN apk add --update --no-cache --virtual .build-deps ${PHPIZE_DEPS} \
    && apk add --update --no-cache ${EXT_DEPS} \
    # Install PHP Core Extensions
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-configure ldap --with-libdir=lib/ \
    && docker-php-ext-install ${PHP_EXTS} \
    # Install PECL Extensions
    && pecl channel-update pecl.php.net \
    && pecl install ${PECL_EXTS} \
    && docker-php-ext-enable ${PECL_EXTS} \
    # Install Composer
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    # Clean up
    && apk del .build-deps \
    && rm -rf /var/cache/apk/*

