FROM php:7.3.3-apache



RUN apt-get update && apt-get install -y \
            curl \
            wget \
            libfreetype6-dev \
            libjpeg62-turbo-dev \
            libmcrypt-dev \
            libwebp-dev \
            libpng-dev libxpm-dev 
            
RUN docker-php-ext-install mysqli
RUN docker-php-ext-configure gd \
    --with-gd \
    --with-webp-dir \
    --with-jpeg-dir \
    --with-png-dir \
    --with-zlib-dir \
    --with-xpm-dir \
    --with-freetype-dir

    RUN docker-php-ext-install gd



EXPOSE 80

