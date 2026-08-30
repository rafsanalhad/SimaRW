# Stage 1: Build a PHP base image with necessary extensions
FROM php:8.2-fpm as vendor

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . .

# Install composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Stage 2: Create the final production image with Nginx
FROM nginx:alpine

# Install PHP
RUN apk --no-cache add php82-fpm php82-opcache

# Remove default Nginx config
RUN rm /etc/nginx/http.d/default.conf

# Create a symlink for php-fpm
RUN ln -s /usr/bin/php82 /usr/bin/php

# Add user for laravel application
RUN addgroup -g 1000 -S www && \
    adduser -u 1000 -S www -G www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Copy the Nginx configuration file
COPY --from=vendor /var/www/docker/nginx.conf /etc/nginx/http.d/default.conf

# Copy application code from the 'vendor' stage
COPY --from=vendor /var/www /var/www

# Expose port 80
EXPOSE 80

# Set up entrypoint
COPY --from=vendor /var/www/docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
