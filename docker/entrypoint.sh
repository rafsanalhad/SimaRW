#!/bin/sh

# Start PHP-FPM
/usr/sbin/php-fpm82 -D

# Start Nginx
nginx -g 'daemon off;'
