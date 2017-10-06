FROM ubuntu:xenial
RUN mkdir -p /var/www/html
ADD . /var/www/html
RUN apt-get update -y && apt-get install -y software-properties-common language-pack-en-base
RUN LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php
RUN apt-get update && \
    apt-get install -y  php7.1 php7.1-mbstring php7.1-mysql php7.1-dom php7.1-zip curl nano vim &&\
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


WORKDIR /var/www/html
RUN useradd -m web
RUN chmod 777 /var/www/html
RUN chmod 777 -R /var/www/html
USER web
RUN ls
RUN pwd
RUN composer install
#RUN php artisan key:generate



