FROM php:8.2-apache

# Instala dependências e extensões PostgreSQL
RUN apt-get update && apt-get install -y \
    git zip unzip libpq-dev libpng-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Habilita mod_rewrite do Apache
RUN a2enmod rewrite

WORKDIR /var/www/html

# Configura o Apache para usar /public como DocumentRoot
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# COPIA O CÓDIGO FONTE PARA DENTRO DO CONTAINER
COPY ./src /var/www/html

# Instala as dependências do Composer durante o build
RUN if [ -f "composer.json" ]; then \
    composer install --no-interaction --optimize-autoloader --no-dev; \
    fi

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache 2>/dev/null || true

# Copia o script de entrada
COPY docker-entrypoint.sh /usr/local/bin/
RUN sed -i 's/\r$//' /usr/local/bin/docker-entrypoint.sh \
    && chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]