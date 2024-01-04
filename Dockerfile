FROM php:7.1-cli

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update \
    && apt-get install -y nginx \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/

RUN mkdir -p /app && rm -fr /usr/share/nginx/html && ln -s /app /usr/share/nginx/html

RUN rm -rf /etc/nginx/conf.d/default.conf
ADD nginx/default.conf /etc/nginx/conf.d/default.conf
ADD php/www.conf /etc/php/7.1/fpm/pool.d/www.conf

RUN sed -i "s/user  nginx;/user  www-data;/g" /etc/nginx/nginx.conf

RUN mkdir /var/run/php

ADD run.sh /run.sh
RUN chmod 755 /run.sh

WORKDIR /app
RUN chmod -R 777 /app

ADD . /app
RUN composer install --optimize-autoloader --no-dev
RUN chown www-data:www-data /app -R

EXPOSE 80

CMD ["/run.sh"]

