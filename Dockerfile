# Usa a imagem base oficial do PHP com Apache
FROM php:8.2-apache

# Instala a extensão PDO MySQL necessária para o seu CRUD
RUN docker-php-ext-install pdo pdo_mysql

# Habilita o mod_rewrite do Apache (útil para URLs amigáveis futuras)
RUN a2enmod rewrite

# Altera o Document Root do Apache para a pasta public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf 