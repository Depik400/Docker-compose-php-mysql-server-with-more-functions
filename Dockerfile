FROM php:7.3.3-apache



RUN apt-get update && apt-get install -y \
            curl \
            wget \
            libfreetype6-dev \
            libjpeg62-turbo-dev \
            libmcrypt-dev
RUN docker-php-ext-install mysqli gd



EXPOSE 80

