FROM alpine:3.7
MAINTAINER Tuan<tuancode@icloud.com>

WORKDIR /app
VOLUME /app

COPY startup.sh /startup.sh

RUN apk add --update \
    mysql \
    mysql-client \
    && chmod +x /startup.sh \
    && rm -f /var/cache/apk/*

COPY ./conf/my.cnf /etc/mysql/my.cnf

EXPOSE 3306

CMD ["/startup.sh"]
