FROM httpd:2.4-alpine
MAINTAINER Tuan <tuancode@icloud.com>

RUN echo "Include /usr/local/apache2/conf.d/default.conf" >> /usr/local/apache2/conf/httpd.conf;

COPY conf/default.conf /usr/local/apache2/conf.d/default.conf

WORKDIR /usr/local/apache2
