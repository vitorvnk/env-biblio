FROM openresty/openresty:buster-fat

COPY ./nginxReloader.sh /usr/local/openresty/bin/nginxReloader.sh
COPY ./docker-entrypoint.sh /usr/local/openresty/bin/docker-entrypoint.sh

RUN chmod +x /usr/local/openresty/bin/nginxReloader.sh
RUN chmod +x /usr/local/openresty/bin/docker-entrypoint.sh

RUN apt-get update && apt-get install -y --no-install-recommends apt-utils
RUN apt-get install inotify-tools -y

ENTRYPOINT [ "/usr/local/openresty/bin/docker-entrypoint.sh" ]
CMD [ "sh", "-c", "nginx -g 'daemon off;' && inotifywait -r -e modify,create,delete /etc/nginx/conf.d/ && nginx -s reload" ]
