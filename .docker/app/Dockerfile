FROM php:8.1-fpm

USER root
RUN apt-get update


# PHP dependencies
RUN apt-get install -y zip libzip-dev procps htop libmcrypt-dev libjpeg-dev \
      git libicu-dev libgmp-dev wget libxml2-dev libwebp-dev \
     libjpeg62-turbo-dev libpng-dev libxpm-dev libfreetype6-dev libgd-dev libbz2-dev
RUN apt-get install -y libxslt1-dev zlib1g-dev unzip

# GD Module with Freetype
RUN docker-php-ext-configure gd --with-external-gd \
    --with-webp \
    --with-jpeg \
    --with-xpm \
    --with-freetype
RUN docker-php-ext-install gd
RUN docker-php-ext-enable gd

# Other PHP modules
RUN docker-php-ext-install bcmath && \
    docker-php-ext-install bz2 && \
    docker-php-ext-install calendar && \
    docker-php-ext-install exif && \
    docker-php-ext-install gmp && \
    docker-php-ext-install iconv && \
    docker-php-ext-install intl && \
    docker-php-ext-install opcache && \
    docker-php-ext-install pcntl && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install shmop && \
    docker-php-ext-install soap && \
    docker-php-ext-install xsl && \
    docker-php-ext-install sockets && \
    docker-php-ext-install xml && \
    docker-php-ext-install zip

# Xdebug
RUN pecl install xdebug || true
RUN docker-php-ext-enable xdebug

# Add the dev user
RUN adduser dev --disabled-password --disabled-login -u 1000 || true

# Install Composer (as opposed to using the Docker Composer container)
RUN rm -f /usr/local/bin/composer /usr/local/bin/composer.phar
RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

# Magerun2
RUN wget https://files.magerun.net/n98-magerun2.phar
RUN mv n98-magerun2.phar /usr/bin/magerun && chmod +x /usr/bin/magerun

# WP CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN mv wp-cli.phar /usr/bin/wp && chmod +x /usr/bin/wp

# System dependencies and tools
RUN apt-get install -y nodejs npm strace vim dnsutils

# PHP Configuration
COPY php.ini /usr/local/etc/php/php.ini
COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY www.conf /usr/local/etc/php-fpm.d/www.conf

# Aliases
COPY aliases /home/dev/.bash_aliases
RUN chown dev: /home/dev/.bash_aliases && chmod u+x /home/dev/.bash_aliases

run npm install -g grunt

# Ready to do dev user set up
USER dev
RUN eval `ssh-agent -s`

ENV PHP_IDE_CONFIG="serverName=xdebug"
ENV XDEBUG_CONFIG="idekey=phpstorm"
WORKDIR /app
