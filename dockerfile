FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Copy composer.lock and composer.json
COPY composer.* /var/www/laraveldocker/

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libmcrypt-dev \
    mariadb-client \
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
    libzip-dev \
    zip \
    ca-certificates \
    gnupg

# Install Node.js & npm (Node 18)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql gd zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www && useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory & permissions
COPY . /var/www
COPY --chown=www:www . /var/www

# Change user
USER www

# Expose port
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
