FROM php:8.2-apache

# Instalar extensiones de MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite de Apache (opcional pero útil)
RUN a2enmod rewrite

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html