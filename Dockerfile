FROM php:8.2 as build

RUN php build.php

FROM nginx:alpine as nginx-prod

WORKDIR /app

COPY --from=build build/ static/
COPY ./nginx.conf /etc/nginx/nginx.conf
