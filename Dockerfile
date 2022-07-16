#PHP fpm Dockerfile
FROM php:8.0-fpm-alpine3.15
COPY . /var/www/html
WORKDIR /var/www/html/src


#INSTALL composer
#RUN apt-get update && apt-get install -y curl
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

expose 9000

CMD ["php-fpm"]
