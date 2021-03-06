FROM php:7.3.6-fpm-stretch

RUN apt-get update \
        && apt-get install -y libzip-dev zip\
        && docker-php-ext-install pdo pdo_mysql zip\
        && usermod -u 1000 www-data \
        && apt-get install -y wget git \
        && curl -sL https://deb.nodesource.com/setup_14.x | bash - \
        && apt-get install -y nodejs

ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz

RUN rm -rf /var/www/html \
        && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www
RUN chown -R www-data:www-data /var/www
RUN ln -s public html

RUN usermod -u 1000 www-data

WORKDIR /var/www
USER www-data

EXPOSE 9000
ENTRYPOINT ["php-fpm"]
