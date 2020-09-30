FROM php:7.3.6-fpm-stretch as builder

RUN apt-get update \
        && apt-get install -y libzip-dev zip\
        && docker-php-ext-install pdo pdo_mysql zip\
        && usermod -u 1000 www-data \
        && apt-get install -y wget git \
        && curl -sL https://deb.nodesource.com/setup_14.x | bash - \
        && apt-get install -y nodejs

RUN rm -rf /var/www/html \
        && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www
RUN chown -R www-data:www-data /var/www
RUN ln -s public html

RUN usermod -u 1000 www-data

ENTRYPOINT ["./.docker/entrypoint.sh"]

FROM php:7.3.6-fpm-stretch

RUN apt-get update \
        && docker-php-ext-install pdo pdo_mysql \
        && usermod -u 1000 www-data \
        && apt-get install -y mysql-client

WORKDIR /var/www
RUN rm -rf /var/www/html \
            && ln -s public html
COPY --from=builder /var/www .

CMD ["vendor/bin/heroku-php-apache2",  "public/"]