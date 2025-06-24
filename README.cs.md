![Package Logo](project_logo.svg?raw=true "Project Logo")

abraflexi-client-config
=======================

Konfigurátor a sdílená konfigurace pro aplikace využívající php-abraflexi

[![Použití](http://img.youtube.com/vi/JJW6JAiqgAE/0.jpg)](http://www.youtube.com/watch?v=JJW6JAiqgAE)

Instalace Debian/Ubuntu
-----------------------

Pro Linux jsou k dispozici .deb balíčky. Prosím použijte repo:

```shell
sudo apt install lsb-release wget apt-transport-https bzip2

sudo wget -O /usr/share/keyrings/vitexsoftware.gpg https://repo.vitexsoftware.com/keyring.gpg
echo "deb [signed-by=/usr/share/keyrings/vitexsoftware.gpg]  https://repo.vitexsoftware.com  $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/vitexsoftware.list
sudo apt update

sudo apt install abraflexi-client-config
```

Pro webové aplikace je zde i balíček s předpřipravenou konfigurací pro Apache

```shell
sudo apt install apache-abraflexi-client-config
```

Youtube:
[![Instalace](http://img.youtube.com/vi/pToYZfh3dFE/0.jpg)](http://www.youtube.com/watch?v=pToYZfh3dFE)

Screenshot:
![Install Upgrade](doc/install-upgrade.png?raw=true "Install Upgrade Screenshot")

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

MultiFlexi
----------

Config for AbraFlexi is ready for run as [MultiFlexi](https://multiflexi.eu) application.

<img src="abraflexi-raiffeisenbank-statements.svg?raw=true" width="100" height="100"><img src="abraflexi-raiffeisenbank-transactions.svg?raw=true" width="100" height="100"><img src="abraflexi-raiffeisenbank-events.svg?raw=true" width="100" height="100">

See the full list of ready-to-run applications within the MultiFlexi platform on the [application list page](https://www.multiflexi.eu/apps.php).

[![MultiFlexi App](https://github.com/VitexSoftware/MultiFlexi/blob/main/doc/multiflexi-app.svg)](https://www.multiflexi.eu/apps.php)
