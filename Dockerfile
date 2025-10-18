FROM dunglas/frankenphp:latest

# Install system dependencies and PHP extensions (remove pgsql, keep mysqli)
RUN apt-get update && apt-get install -y wget unzip curl \
    && install-php-extensions \
        mysqli \
        gd \
        zip \
        opcache \
        exif \
        imagick \
        intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Set up Caddy directories and permissions
RUN mkdir -p /data/caddy/pki /config/caddy \
    && chown -R www-data:www-data /data/caddy /config/caddy \
    && setcap CAP_NET_BIND_SERVICE=+eip /usr/local/bin/frankenphp

# Download and extract WordPress core files
RUN cd /tmp \
    && wget https://wordpress.org/latest.tar.gz \
    && tar -xzf latest.tar.gz \
    && mv wordpress/* /var/www/html/ \
    && rm -rf /tmp/wordpress latest.tar.gz \
    && chown -R www-data:www-data /var/www/html

# Caddyfile
COPY Caddyfile /etc/frankenphp/Caddyfile

WORKDIR /var/www/html
USER www-data
