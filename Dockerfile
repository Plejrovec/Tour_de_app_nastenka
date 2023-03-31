FROM php:8.0-apache
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
COPY . /var/www/html

RUN echo "output_buffering = off" > /usr/local/etc/php/conf.d/disable-output-buffering.ini
RUN chown -R www-data:www-data /var/www/html/
# Copy the PHP files to the container

#RUN sed -i 's/Options /&Indexes /' /etc/apache2/apache2.conf
# Expose port 80 for incoming traffic
ENTRYPOINT exec apache2-foreground
COPY / /var/www/html/
RUN chown -R www-data:www-data /var/www
EXPOSE 80
USER www-data:www-data