FROM php:8.2-apache

# Instala dependências e extensões PostgreSQL
RUN apt-get update && apt-get install -y \
    git zip unzip libpq-dev libpng-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Habilita mod_rewrite do Apache
RUN a2enmod rewrite

# Copia o código (o volume sobrescreve depois)
COPY ./src /var/www/html

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configura o Apache para usar /public como DocumentRoot
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

EXPOSE 80
