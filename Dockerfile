# Utilise une image PHP officielle avec Apache
FROM php:8.2-apache

# Active mod_rewrite pour Apache (utile pour Laravel, Symfony, etc.)
RUN a2enmod rewrite

# Copie tous les fichiers de ton projet dans le dossier Apache
COPY . /var/www/html/

# Donne les bons droits
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Change le répertoire de travail
WORKDIR /var/www/html

# Ouvre le port 80
EXPOSE 80
