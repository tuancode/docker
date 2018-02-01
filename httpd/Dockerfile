FROM alpine:3.7

MAINTAINER Tuan <tuancode@icloud.com>

RUN apk --update add \
    apache2 \
    apache2-utils \
    apache2-proxy \
    apache2-ssl \
    && rm -rf /var/cache/apk/*

# Create folder for apache crete PID file
RUN mkdir -p /run/apache2/

COPY conf/httpd.conf /etc/apache2/httpd.conf

EXPOSE 80 443

ENTRYPOINT ["httpd"] 
CMD ["-D", "FOREGROUND"]
