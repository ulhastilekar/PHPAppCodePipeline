#!/bin/bash
cd /var/www/html
yum install wget -y
wget https://getcomposer.org/composer.phar
sudo php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
sudo yum install php -y 
php composer-setup.php
php composer.phar install
