FROM nginx:1.21.6-alpine as nginx

COPY ./public/ /usr/src/app/public/

COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf