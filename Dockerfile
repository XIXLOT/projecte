# Utilitzar una imatge base de PHP amb Apache
FROM php:8.3-apache

# Habilitar el mòdul PHP
RUN docker-php-ext-install mysqli

# Copiar els arxius del projecte dins del contenidor
COPY . /var/www/html/

# Exposar el port 80 per servir l'aplicació
EXPOSE 80
