FROM php:8.3.6-fpm-alpine

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

WORKDIR /var/www

ENV APP_ENV=production

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]