FROM php:8.3.6-fpm-alpine

WORKDIR /var/www

COPY . .

# Install system dependencies
RUN apk add --no-cache \
    bash \
    curl \
    git \
    unzip \
    libzip-dev \
    postgresql-dev \
    oniguruma-dev \
    icu-dev \
    zlib-dev \
    libpng-dev \
    libxml2-dev \
    libjpeg-turbo-dev \
    libmcrypt-dev \
    libxslt-dev \
    freetype-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip intl xml gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader
RUN chmod -R 755 storage bootstrap/cache

ENV APP_ENV=production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

EXPOSE 10000

CMD ["/laravel-deploy.sh"]