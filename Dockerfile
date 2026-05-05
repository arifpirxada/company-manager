FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port
EXPOSE 10000

# Start Laravel server
CMD php -S 0.0.0.0:10000 -t public