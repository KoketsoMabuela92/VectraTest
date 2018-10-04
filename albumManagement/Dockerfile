FROM php:7.1.8-apache

MAINTAINER Koketso Mabuela

COPY . /srv/app

COPY vhost.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R root:www-data /srv/app \
&& a2enmod rewrite

RUN chown -R root:www-data /srv/app/storage

RUN chown -R root:www-data /srv/app/bootstrap
