# Use an existing PHP image as the base
FROM php:8.3-apache

# Install PDO extension
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy custom php.ini, if needed
# COPY php.ini /usr/local/etc/php/php.ini

# Set the working directory
# WORKDIR /var/www/html

# Expose port 80
# EXPOSE 80