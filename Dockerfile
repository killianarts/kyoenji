FROM dunglas/frankenphp:latest

# Install system dependencies and PHP extensions
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

# Source Appliku env vars during build (for DB, etc.)
COPY env/envs_export.sh /tmp/envs_export.sh
RUN source /tmp/envs_export.sh

# Set up Caddy directories and permissions
RUN mkdir -p /data/caddy/pki /config/caddy \
    && chown -R www-data:www-data /data/caddy /config/caddy \
    && setcap CAP_NET_BIND_SERVICE=+eip /usr/bin/frankenphp

# Copy WordPress core from local code dir
COPY code/ /var/www/html/
RUN chown -R www-data:www-data /var/www/html

# Caddyfile
COPY Caddyfile /etc/caddy/Caddyfile

WORKDIR /var/www/html
USER www-data
