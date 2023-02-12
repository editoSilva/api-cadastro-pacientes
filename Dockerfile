FROM php:8.1-fpm

# set your user name, ex: user=bernardo
ARG user=editosilva
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip


# syntax=docker/dockerfile:1
# FROM ubuntu:latest
# RUN apt-get update && apt-get install -y supervisor
# RUN mkdir -p /var/wwww/supervisor
# COPY ./docker/supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
# # 
# CMD ["/usr/bin/supervisord"]


RUN apt-get install -y --no-install-recommends supervisor
COPY ./docker/supervisord/supervisord.conf /etc/supervisor
COPY ./docker/supervisord/conf /etc/supervisord.d/
### Supervisor permite monitorar e controlar vários processos (LINUX)
### Bastante utilizado para manter processos em Daemon, ou seja, executando em segundo plano
# CMD ["/usr/bin/supervisord"]
RUN docker-php-ext-install pdo pdo_mysql

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

RUN apt-get update

# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www

# CMD ["/etc/init.d/nginx",  "restart"]

# CMD ["/usr/bin/supervisord"]

USER $user

# CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]

# CMD /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf

# CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]