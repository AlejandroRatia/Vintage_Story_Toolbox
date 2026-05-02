FROM php:8.2-apache

# Instalar extensiones de MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Asegurarse de que PHP procesa archivos .php
RUN echo "AddType application/x-httpd-php .php" >> /etc/apache2/apache2.conf

# Copiar el código fuente
COPY . /var/www/html/

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html