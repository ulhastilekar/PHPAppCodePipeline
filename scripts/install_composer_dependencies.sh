#!/bin/bash
cd /var/www/html
yum install wget -y
sudo amazon-linux-extras install -y php7.2
wget https://getcomposer.org/composer.phar
sudo php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php composer-setup.php
php composer.phar install
php composer.phar update
