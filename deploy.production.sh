#!/usr/bin/env bash
git reset --hard HEAD
git checkout master
git pull origin master
#php artisan route:cache
#php artisan config:cache
mkdir /var/logs 2>/dev/null
mkdir /var/logs/preetham_inc 2>/dev/null
chown -R apache:apache /var/www/html/preetham_inc
chown -R apache:apache /var/logs/preetham_inc
chmod -R 755 /var/www/html/preetham_inc/storage
/usr/local/bin/composer install --optimize-autoloader
rm -rf /etc/httpd/conf.d/preetham.info.conf
rm -rf /etc/nginx/conf.d/preetham.info.conf
ln -s /var/www/html/preetham_inc/deployment/httpd.production.conf /etc/httpd/conf.d/preetham.info.conf
ln -s /var/www/html/preetham_inc/deployment/nginx.production.conf /etc/nginx/conf.d/preetham.info.conf
service httpd restart
service nginx restart
