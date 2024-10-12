FROM php:8.1
RUN apt-get update -y && apt-get install -y \
    openssl \
    git \
    curl \
    zip \
    git \
    unzip \
    libonig-dev \
    libzip-dev \
    libpq-dev \
    postgresql \
    postgresql-client \
    nano \
    nodejs \
    npm

RUN docker-php-ext-configure pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql zip exif pcntl mbstring

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . /app
RUN composer install
RUN npm install
RUN npm install vite -g
RUN npm run build

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
EXPOSE 8080
