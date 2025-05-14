# Utilise l'image officielle de PHP avec Apache
FROM php:8.2-apache

# Active mod_rewrite (utile pour Laravel, .htaccess, etc.)
RUN a2enmod rewrite

# Installe les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Copie le fichier php.ini personnalisé (si tu en as un)
COPY php.ini /usr/local/etc/php/

# Copie seulement le contenu du dossier "orph" dans le dossier racine d'Apache
COPY ./orph /var/www/html/

# Fixe les permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Définir le dossier de travail
WORKDIR /var/www/html

# Expose le port 80 (Render le fait automatiquement)
EXPOSE 80
