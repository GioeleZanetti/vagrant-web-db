#!/bin/bash

echo "installing php"
apt-get install php8.1 -y
apt-get install php-mysql -y
systemctl restart apache2