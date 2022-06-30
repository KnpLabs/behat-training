FROM composer:2.3.7 as composer

###############################################################################

FROM php:8.1.6-fpm-buster

WORKDIR /app

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        unzip

RUN docker-php-ext-install -j"$(nproc)" pdo_mysql && \
    rm -rf /tmp/pear

COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_HOME /home/docker/composer

RUN useradd docker -d /home/docker -u 1000 && \
    mkdir -p /home/docker/opcache /home/docker/composer /app && \
    chown -R docker:docker /home/docker /app

USER docker

COPY composer.* /app/

RUN composer install --prefer-dist --no-scripts --no-dev \
    && composer clear-cache

CMD ["php-fpm"]