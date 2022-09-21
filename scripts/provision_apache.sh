#!/bin/bash

echo "Apache2 provisioning - begin"
apt-get install apache2 -y     # Install Apache2
a2enmod rewrite                # Enable mod_rewrite
service apache2 restart        # Start apache
echo "Apache2 provisioning - end"