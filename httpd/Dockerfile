FROM alpine:3.7
MAINTAINER Tuan <tuancode@icloud.com>

RUN apk --update add \
    apache2 \
    apache2-utils \
    apache2-proxy \
    apache2-ssl \
    && rm -rf /var/cache/apk/*

# Create folder for apache PID file and virtual host configuration file
RUN mkdir -p /run/apache2 /etc/apache2/vhost.d

COPY conf/httpd.conf /etc/apache2/httpd.conf

WORKDIR /var/www

EXPOSE 80 443

ENTRYPOINT ["httpd"] 
CMD ["-D", "FOREGROUND", "-X"]
