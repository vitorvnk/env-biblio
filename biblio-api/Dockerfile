FROM php:8.1-fpm

# set your user name, ex: user=bernardo
ARG user=vitor
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Instalar o Node.js e o NPM
RUN curl -sL -max-time 120 https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs

# Set working directory
WORKDIR /var/www

# Copy custom configurations PHP
COPY ./build/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

USER $user
