FROM dunglas/frankenphp:latest

RUN install-php-extensions pdo_mysql mysqli

COPY . /app/public

ENV SERVER_NAME=":80"