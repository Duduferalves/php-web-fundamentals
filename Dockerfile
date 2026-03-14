# Usa a imagem base oficial do PHP com Apache
FROM php:8.2-apache

# Instala a extensão PDO MySQL necessária para o seu CRUD
RUN docker-php-ext-install pdo pdo_mysql

# Habilita o mod_rewrite do Apache (útil para URLs amigáveis futuras)
RUN a2enmod rewrite