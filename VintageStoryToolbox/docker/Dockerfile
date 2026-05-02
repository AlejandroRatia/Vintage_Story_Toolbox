FROM php:8.2-apache

# Instalar extensiones de MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite y fijar MPM prefork
RUN a2dismod mpm_event mpm_worker 2>/dev/null || true && \
    a2enmod mpm_prefork rewrite

# Asegurarse de que PHP procesa archivos .php
RUN echo "AddType application/x-httpd-php .php" >> /etc/apache2/apache2.conf

# Copiar el código fuente
COPY . /var/www/html/

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html