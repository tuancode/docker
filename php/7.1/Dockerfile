FROM php:7.1-fpm-alpine
MAINTAINER Tuan <tuancode@icloud.com>

# Install PHP Core Extensions
RUN apk --update add freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev \
    && docker-php-ext-configure gd \
        --with-freetype-dir=/usr/include/ \
        --with-png-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/ \
    NPROC=$(getconf _NPROCESSORS_ONLN) \
    && docker-php-ext-install -j${NPROC} bcmath gd pdo_mysql mcrypt ftp zip \

# Install PECL Extensions
RUN pecl install redis-3.1.6 xdebug-2.6.0 \
    && docker-php-ext-enable redis xdebug

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"; \
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"; \
    php composer-setup.php; \
    php -r "unlink('composer-setup.php');"; \
    echo 'alias composer="php /var/www/html/composer.phar" > ~/.zshrc';
