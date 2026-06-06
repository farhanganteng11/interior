FROM php:8.5-fpm-alpine

# Install system dependencies & PHP extensions
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    git

RUN docker-php-ext-install pdo_mysql bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install laravel dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Setup Nginx configuration
RUN mkdir -p /run/nginx
COPY docker/nginx.conf /etc/nginx/http.d/default.conf

# Setup Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 10000

CMD nginx && php-fpm