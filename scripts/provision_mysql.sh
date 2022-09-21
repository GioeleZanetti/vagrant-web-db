#!/bin/bash

echo "MySql provisioning - begin"

# Install mysql-server
apt-get install mysql-server -y

# Abilitare le connessioni da altri server
echo "Updating bind address"
sed -i "s/.*bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/mysql.conf.d/mysqld.cnf

# Riavviare mysql in modo da applicare le modifiche
echo "Restarting mysql service"
service mysql restart

echo "MySql provisioning - end"

echo "Creating database"

DBNAME=vagrant
DBUSER=vagrant
DBPASSWD=vagrant

echo "Creating new db $DBNAME"

# creating database
mysql -uroot -e "CREATE DATABASE IF NOT EXISTS $DBNAME"

# creating user and giving privileges over database
mysql -uroot -e "CREATE USER '$DBUSER'@'%' identified by '$DBPASSWD'"
mysql -uroot -e "grant all privileges on $DBNAME.* to '$DBUSER'@'%'"

# opening database port
apt-get install ufw -y
ufw --force enable
ufw allow 3306

# creating table for test data
mysql -uroot --database=$DBNAME -e "create table test(id int auto_increment primary key, message varchar(255) not null)"
mysql -uroot --database=$DBNAME -e "insert into test values(1, 'IL DATABASE FUNZIONA')"