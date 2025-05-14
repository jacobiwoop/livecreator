# Utilise l'image officielle de PHP avec Apache
FROM php:8.2-apache

# Active le module mod_rewrite (utile pour .htaccess)
RUN a2enmod rewrite

# Installe les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Copie ton fichier de configuration PHP personnalisé
COPY php.ini /usr/local/etc/php/

# Copie tous les fichiers du projet dans le conteneur
COPY . /var/www/html/

# Définit le répertoire de travail (optionnel mais clair)
WORKDIR /var/www/html/orph/

# Modifie la racine du document Apache
RUN echo "DocumentRoot /var/www/html/orph/" > /etc/apache2/sites-available/000-default.conf

# Fixe les permissions appropriées
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Expose le port 80 (Render l'utilise par défaut)
EXPOSE 80
