#!/bin/bash
#Actualizamos los repositorios
sudo apt-get update

#Instalacion de ssh y claves publicas y privadas
sudo apt install openssh-server -y
ssh-keygen


#Instalacion y configuracion de apache2
sudo apt install apache2 -y

sudo cp /vagrant_data/index.php /var/www/html/

#cp index.php /var/www/html/
#cp error.php /var/www/html/

sudo cp /vagrant_data/000-default.conf /etc/apache2/sites-available/000-default.conf

#Intalacion y configuracion de FTP
sudo apt install vsftpd -y
sudo cp /vagrant_data/vsftpd.conf /etc/vsftpd.conf

sudo service vsftpd restart

#Intalacion y configuracion de 
sudo apt install php libapache2-mod-php php-mysql -y
sudo apt install composer -y
sudo apt install ruby -y
sudo cp /vagrant_data/dir.conf /etc/apache2/mods-enabled/dir.conf
composer require lorddashme/php-cryptor
gem install stripe
sudo service apache2 restart

#Instalacion y configuracion SMPT
sudo apt install mailutils -y
sudo cp /vagrant_data/main.cf /etc/postfix/main.cf
sudo service postfix restart;

#Instalacion y configuracion de mysql
sudo apt install mysql-server -y
sudo mysql < /vagrant_data/retoPubliGrupo1.sql
sudo service mysql restart

