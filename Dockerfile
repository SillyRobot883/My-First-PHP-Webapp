# Use PHP Apache base image
FROM php:7.4-apache

# Enable Apache modules
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html/

# Copy web files
COPY index.php /var/www/html/
COPY login.php /var/www/html/

# Create admin directory first
RUN mkdir -p /var/www/html/admin

# Copy admin files
COPY admin/panel.php /var/www/html/admin/
COPY admin/.env /var/www/html/admin/

# Set proper permissions for the files
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 644 /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && chmod 640 /var/www/html/admin/.env

# Use a build argument to set the FLAG
ARG FLAG
ENV FLAG=${FLAG}

# Create a custom Apache configuration file
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Apache configuration: Set ServerName to prevent warnings
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose port 80
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]
