#!/bin/bash
#Actualizamos los repositorios
sudo apt-get update

#Instalacion de ssh y claves publicas y privadas
sudo apt install openssh-server -y
ssh-keygen
ssh-copy-id 2gdaw01@172.20.224.101

#Instalacion y configuracion de apache2
sudo apt install apache2 -y
cp index.php /var/www/html/
cp error.php /var/www/html/
cp 000-default.conf /etc/apache2/sites-available/

#Intalacion y configuracion de FTP
sudo apt install vsftpd -y
cp vsftpd.conf /etc/
sudo service vsftpd restrart

#Intalacion y configuracion de 
sudo apt install php libapache2-mod-php php-mysql -y
cp dir.conf /etc/apache2/mods-enabled/
sudo service apache2 restrart

#Instalacion y configuracion de mysql
sudo apt install mysql-server -y
sudo mysql_secure_installation


