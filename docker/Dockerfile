FROM php:7.4-fpm-buster

ENV PATH="./vendor/bin:${PATH}" \
    NGINX_SERVER_NAME="_" \
    PHP_OPCACHE_VALIDATE_TIMESTAMPS="0" \
    PHP_OPCACHE_MAX_ACCELERATED_FILES="6000" \
    PHP_OPCACHE_MEMORY_CONSUMPTION="128"

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
       procps \
       libfreetype6-dev \
       libjpeg62-turbo-dev \
       libpng-dev \
       libonig-dev \
       libxml2-dev \
       supervisor \
       sqlite3 \
       nginx \
    && docker-php-ext-install mbstring pdo pdo_mysql opcache pcntl \
    && pecl install apcu xdebug-2.9.5 \
    && docker-php-ext-enable apcu xdebug \
    && pecl install redis \
    && docker-php-ext-enable redis

COPY  docker/php/php-fpm.d/docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY docker/php/conf.d/*.ini /usr/local/etc/php/conf.d/
COPY docker/php/php.ini /usr/local/etc/php/php.ini

COPY docker/nginx/h5bp /etc/nginx/h5bp

COPY docker/supervisor/supervisord.conf /etc/supervisor/supervisord.conf
COPY docker/supervisor/conf.d/*.conf /etc/supervisor/conf.d-available/

COPY docker/run-app.sh /usr/local/bin/run-app
COPY docker/php/composer-installer.sh /usr/local/bin/composer-installer

ADD https://github.com/kelseyhightower/confd/releases/download/v0.11.0/confd-0.11.0-linux-amd64 /usr/local/bin/confd
COPY docker/confd/conf.d/ /etc/confd/conf.d/
COPY docker/confd/templates/ /etc/confd/templates/

RUN chmod +x /usr/local/bin/confd \
    && chmod +x /usr/local/bin/run-app \
    && chmod +x /usr/local/bin/composer-installer \
    && /usr/local/bin/composer-installer \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && composer --version

# Copy the application
COPY --chown=www-data:www-data . /var/www/html

EXPOSE 80

CMD ["/usr/local/bin/run-app"]
