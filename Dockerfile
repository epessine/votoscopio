FROM node:20.5 AS builder

WORKDIR /usr/src/votoscopio

COPY . .

RUN npm ci
RUN npm run build

FROM dunglas/frankenphp:php8.3 AS extensions

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN install-php-extensions \
    pdo_mysql \
    gd \
    intl \
    zip \
    opcache

FROM extensions AS final

COPY --from=builder /usr/src/votoscopio /app
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
RUN php artisan migrate:fresh --force
RUN php artisan app:seed-pools
RUN php artisan optimize
