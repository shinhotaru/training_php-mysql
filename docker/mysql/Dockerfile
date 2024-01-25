FROM mysql:8.0.35-debian

RUN apt update
RUN apt -y install locales-all

ENV LANG ja_JP.UTF-8
ENV LANGUAGE ja_JP:ja
ENV LC_ALL ja_JP.UTF-8

COPY ./docker/mysql/mysqld_charset.cnf /etc/mysql/conf.d/mysqld_charset.cnf
