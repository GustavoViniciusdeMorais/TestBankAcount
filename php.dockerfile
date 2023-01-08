FROM php:8-fpm-alpine

RUN apk --update add gcc make g++ zlib-dev

# RUN set -ex \
#   && apk --no-cache add \
#     postgresql-dev

# RUN docker-php-ext-install pdo pdo_pgsql

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql