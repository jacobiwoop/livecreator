
# Image officielle avec Apache
FROM php:8.2-apache

# Active mod_rewrite (utile pour .htaccess, Laravel, etc.)
RUN a2enmod rewrite

# Installe les extensions nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Active affichage des erreurs (fichier copié ensuite)
COPY php.ini /usr/local/etc/php/

# Copie tous les fichiers du projet
COPY . /var/www/html/

# Fixe les permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Définir le répertoire de travail
WORKDIR /var/www/html

# Ouvre le port (Render expose 80 automatiquement)
EXPOSE 80
