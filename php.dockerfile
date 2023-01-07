FROM php:8-fpm-alpine

RUN apk --update add gcc make g++ zlib-dev

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql