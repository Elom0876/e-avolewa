FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN touch /var/www/html/database/database.sqlite

RUN chown -R www-data:www-data /var/www/html/storage \
    /var/www/html/bootstrap/cache \
    /var/www/html/database/database.sqlite

RUN php artisan config:clear || true
RUN php artisan storage:link || true

COPY ca-cert.pem /var/www/html/ca-cert.pem

EXPOSE 80

CMD php artisan migrate --force && php artisan db:seed --force && apache2-foreground