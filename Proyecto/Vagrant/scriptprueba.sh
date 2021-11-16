#!/bin/bash
#Actualizamos los repositorios
apt-get update

apt install mysql-server -y

service mysql start
mysql -u root --password="" -e "update mysql.user set authentication_string=password(''), plugin='mysql_native_password' where user='root';"
mysql -u root --password="" -e "flush privileges;"

mysql -u root -p < /vagrant_data/retoPubliGrupo1.sql
