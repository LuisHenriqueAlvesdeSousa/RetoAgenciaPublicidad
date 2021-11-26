#!/bin/bash
#Actualizamos los repositorios
apt-get update

#Instalacion de ssh y claves publicas y privadas
apt install openssh-server -y


#Instalacion y configuracion de apache2
apt install apache2 -y
cp -r /vagrant_data/Proyecto /var/www/html/
cp /vagrant_data/000-default.conf /etc/apache2/sites-available/000-default.conf

#Intalacion y configuracion de FTP
apt install vsftpd -y
cp /vagrant_data/vsftpd.conf /etc/vsftpd.conf
service vsftpd restart

#Intalacion y configuracion de php
apt install php libapache2-mod-php php-mysql -y
apt install composer -y
apt install ruby -y
cp /vagrant_data/dir.conf /etc/apache2/mods-enabled/dir.conf
composer require lorddashme/php-cryptor
gem install stripe
service apache2 restart

#Instalacion y configuracion de mysql
apt install mysql-server -y
mysql < /vagrant_data/retoPubliGrupo1.sql
service mysql restart

