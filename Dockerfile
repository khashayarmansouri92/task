# Use the official PHP image as a base image
FROM php:8.1-fpm

# Install any dependencies required by your project (e.g., Composer, npm)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    libmongoc-dev

# Install PHP extensions, including MongoDB extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy the Laravel project files to the container
COPY . /var/www/html

# Install Laravel dependencies
RUN composer install

# Expose port 9090
EXPOSE 9090

# Start PHP-FPM server
CMD ["php-fpm"]
