FROM alpine:3.16

# nginxのインストール
RUN apk update && \
    apk add --no-cache nginx
RUN mkdir -p /run/nginx
# RUN apk add openssl
# ADD ssl /etc/nginx/ssl

# フォアグラウンド
CMD nginx -g "daemon off;"