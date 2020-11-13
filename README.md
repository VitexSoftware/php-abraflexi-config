![Package Logo](https://raw.githubusercontent.com/VitexSoftware/php-abraflexi-config/master/package_logo.png "Project Logo")

php-abraflexi-config
===================

Konfigurátor a sdílená konfigurace pro aplikace využívající php-abraflexi

[![Použití](http://img.youtube.com/vi/JJW6JAiqgAE/0.jpg)](http://www.youtube.com/watch?v=JJW6JAiqgAE)

Instalace Docker
----------------

    docker pull vitexsoftware/abraflexi-client-config

Instalace Debian/Ubuntu
-----------------------

Pro Linux jsou k dispozici .deb balíčky. Prosím použijte repo:

    wget -O - http://v.s.cz/info@vitexsoftware.cz.gpg.key|sudo apt-key add -
    echo deb http://v.s.cz/ stable main > /etc/apt/sources.list.d/ease.list
    apt update
    apt install php-abraflexi-config

Youtube:
[![Instalace](http://img.youtube.com/vi/pToYZfh3dFE/0.jpg)](http://www.youtube.com/watch?v=pToYZfh3dFE)

Screenshot:
![Install Upgrade](https://raw.githubusercontent.com/VitexSoftware/php-abraflexi-config/master/doc/install-upgrade.png "Install Upgrade Screenshot")


Po instalaci balíku jsou v systému k dispozici dva nové příkazy:

  * **abraflexi-client-config**         - nástroj příkazové řádky pro změnu hodnot v /etc/abraflexi/client.json
  * **abraflexi-client-config-checker** - slouží k otestování nastavené konfigurace
  * **abraflexi-client-reconfigure**    - dialogy k zadání přihlašovacích údajů

Závislosti
----------

Tento nástroj ke svojí funkci využívá následující knihovny:

 * [**PHP Ease Framework**](https://github.com/VitexSoftware/php-ease-core) - pomocné funkce např. logování
 * [**PHP-AbraFlexi**](https://github.com/Spoje-NET/php-abraflexi/)        - komunikace s [AbraFlexi](https://abraflexi.eu/)

Balíček je využíván těmito aplikacemi:

 * [abraflexi-testing-tools]( https://github.com/VitexSoftware/AbraFlexi-Tools )
 * [php-abraflexi-reminder]( https://github.com/VitexSoftware/php-abraflexi-reminder)
 * [php-abraflexi-matcher]( https://github.com/VitexSoftware/php-abraflexi-matcher )
 * [monitoring-plugins-abraflexi]( https://github.com/VitexSoftware/monitoring-plugins-abraflexi )