FROM php:8.3.10-fpm
RUN apt-get update && apt-get install -y \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    openssl \
    zip \
    unzip \
    curl \
    nodejs \
    npm \
    bash \
    git \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install zip pdo pdo_mysql

WORKDIR /app

RUN git clone "https://github.com/Moha-ak15/NoMoreWaste.git" .

RUN mv .env.example .env
RUN npm install

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer update -W
RUN composer install
EXPOSE 80
RUN php artisan key:generate
RUN php artisan migrate

RUN rm -rf /root/.composer

CMD php artisan serve --host=0.0.0.0 --port=80
