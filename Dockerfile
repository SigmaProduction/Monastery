FROM php:8.2-fpm

# Install required system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install zip pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www/html

# Copy Laravel project files
COPY . .

# Install project dependencies
RUN composer install
