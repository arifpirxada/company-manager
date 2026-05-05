FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev zip \
    libpq-dev nodejs npm \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Build frontend
RUN npm install && npm run build

# Fix permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 10000

CMD php artisan key:generate --force && \
    php artisan storage:link || true && \
    php -S 0.0.0.0:10000 -t public