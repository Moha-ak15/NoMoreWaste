FROM php:8.3.10-fpm
RUN apt-get update && apt-get install -y \
    openssl \
    zip \
    unzip \
    curl \
    nodejs \
    npm \
    openssh-client \
    bash
WORKDIR /app
COPY . .
COPY .env.example .env

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install
RUN composer require dompdf/dompdf
EXPOSE 80
RUN php artisan key:generate
RUN php artisan migrate
# CMD php artisan serve --host=0.0.0.0 --port=80
