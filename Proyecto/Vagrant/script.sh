#!/bin/bash
#Actualizamos los repositorios
sudo apt-get update

#Instalacion de ssh y claves publicas y privadas
sudo apt install openssh-server -y
ssh-keygen


#Instalacion y configuracion de apache2
sudo apt install apache2 -y
#cp index.php /var/www/html/
#cp error.php /var/www/html/
sudo cp /vagrant_data/000-default.conf /etc/apache2/sites-available/000-default.conf

#Intalacion y configuracion de FTP
sudo apt install vsftpd -y
sudo cp /vagrant_data/vsftpd.conf /etc/vsftpd.conf
sudo service vsftpd restrart

#Intalacion y configuracion de 
sudo apt install php libapache2-mod-php php-mysql -y
sudo cp /vagrant_data/dir.conf /etc/apache2/mods-enabled/dir.conf
sudo service apache2 restrart

#Instalacion y configuracion de mysql
sudo apt install mysql-server -y
sudo service mysql restrart
sudo mysql < /vagrant_data/retoPuliGrupo1.sql



