# gymmanager

GymManager es una app de gestión de inscripciones para poder apuntarse a clases como en un gym, donde se pueden apuntar socios a clases,
y así poder gestionar mejor, además de que el administrador encargado tendrá la opción de gestionar estas inscripciones.


- Para ejecutar la aplicación es necesario Symfony y php como fuente principal.

Updates y composers:
sudo apt update
sudo apt install php-cli php-sqlite3 unzip curl -y
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
composer --version

composer install

(var, para los permisos si es necesario):
mkdir -p var
chmod 777 var

Migrations para la database:
php bin/console doctrine:migrations:migrate

php bin/console make:migration
php bin/console doctrine:migrations:migrate

Fixtures:
php bin/console doctrine:fixtures:load
