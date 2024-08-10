FROM node:20.5 AS builder

WORKDIR /usr/src/votoscopio

COPY . .

RUN npm ci

RUN npm run build

FROM php:8.3 AS app

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /usr/src/votoscopio

FROM app AS dependencies

COPY --from=builder /usr/src/votoscopio .

RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

FROM dunglas/frankenphp:php8.3 AS extensions

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN install-php-extensions \
    pdo_mysql \
    gd \
    intl \
    zip \
    opcache

FROM extensions AS final

COPY --from=dependencies /usr/src/votoscopio /app

RUN php artisan migrate:fresh --force

RUN php artisan app:seed-pools

RUN php artisan optimize
