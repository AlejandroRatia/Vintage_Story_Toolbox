FROM php:8.2-apache

ARG CACHEBUST=1

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN a2dismod mpm_event mpm_worker mpm_prefork 2>/dev/null || true && \
    a2enmod mpm_prefork

RUN a2enmod rewrite

RUN echo "AddType application/x-httpd-php .php" >> /etc/apache2/apache2.conf

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html