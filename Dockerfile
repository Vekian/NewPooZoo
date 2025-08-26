FROM php:8.1-apache

# Extensions utiles pour le dev
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    git unzip vim \
    && docker-php-ext-install pdo pdo_mysql intl zip gd

# Activer mod_rewrite
RUN a2enmod rewrite

# Activer l'affichage des erreurs PHP
RUN echo "display_errors=On\nerror_reporting=E_ALL\n" > /usr/local/etc/php/conf.d/dev.ini

WORKDIR /var/www/html
