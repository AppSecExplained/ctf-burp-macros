FROM php:7.4-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev && \
    docker-php-ext-configure gd --with-jpeg=/usr/include/ && \
    docker-php-ext-install gd

RUN a2enmod rewrite headers

RUN echo "<Directory /var/www/html>\n\tAllowOverride All\n\tRequire all granted\n\tHeader add Access-Control-Allow-Origin \"*\"\n\tHeader add Access-Control-Allow-Methods \"*\"\n</Directory>" > /etc/apache2/conf-available/custom.conf && \
    echo "AddType application/x-httpd-php .phtml" >> /etc/apache2/conf-available/custom.conf && \
    a2enconf custom

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html
