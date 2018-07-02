MAINTAINER Vítězslav Dvořák <info@vitexsoftware.cz>
FROM vitexsoftware/flexipeehp

COPY src/ 			/usr/lib/php-flexibee-config/
COPY debian/conf/composer.json  /usr/share/php-flexibee-config/
COPY bin/*                      /usr/bin/
COPY client.json                /etc/flexibee/

