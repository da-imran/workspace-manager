#!/bin/sh

echo "🚀 Starting Laravel App"

# Ensure APP_KEY is set
if [ ! -f .env ]; then
  echo "⚠️ .env file not found, creating a default .env"
  cp .env.example .env
fi

php artisan key:generate --show

php artisan config:cache
php artisan route:cache
php artisan migrate --force

php artisan serve --host=0.0.0.0 --port=10000
