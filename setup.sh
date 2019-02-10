#!/bin/bash
####
# This script will update an ev3dev robot and install the latest version
# of Snap ev3dev
####

sudo apt-get update
sudo apt-get install lighttpd php7.0-cgi
# also installs php-common php7.0-cli php7.0-common php7.0-json php7.0-opcache php7.0-readline

sudo usermod -a -G ev3dev www-data
sudo chown robot:robot /var/www/html
ln -s /var/www/html

#Enable the fastcgi module and the php configuration
sudo lighty-enable-mod fastcgi 
sudo lighty-enable-mod fastcgi-php

#Reload the lighttpd daemon
sudo service lighttpd force-reload

git clone -b ev3dev --single-branch https://github.com/Madrok/Snap.git html
