FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev zip \
    libpq-dev nodejs npm \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader

# Required Laravel setup
RUN php artisan storage:link || true
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Build assets
RUN npm install && npm run build

EXPOSE 10000

CMD php -S 0.0.0.0:10000 -t public