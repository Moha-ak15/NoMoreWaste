FROM php:8.3.10-fpm
RUN apk update && apk add --no-cache \
    openssl \
    zip \
    unzip \
    curl \
    nodejs \
    npm \
    openssh \
    bash \
    git
WORKDIR /app

RUN git clone "https://github.com/Moha-ak15/NoMoreWaste.git" .

RUN mv .env.example .env

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install
EXPOSE 80
RUN php artisan key:generate
RUN php artisan migrate

RUN apk del openssl zip unzip curl nodejs npm openssh bash git
RUN rm -rf /var/cache/apk/*
RUN rm -rf /root/.composer

CMD php artisan serve --host=0.0.0.0 --port=80
