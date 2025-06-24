![Package Logo](project_logo.svg?raw=true "Project Logo")

abraflexi-client-config
=======================

Configurator and shared configuration for applications using php-abraflexi

[![Usage](http://img.youtube.com/vi/JJW6JAiqgAE/0.jpg)](http://www.youtube.com/watch?v=JJW6JAiqgAE)

Debian/Ubuntu Installation
-------------------------

For Linux, .deb packages are available. Please use the repository:

```shell
sudo apt install lsb-release wget apt-transport-https bzip2

sudo wget -O /usr/share/keyrings/vitexsoftware.gpg https://repo.vitexsoftware.com/keyring.gpg
echo "deb [signed-by=/usr/share/keyrings/vitexsoftware.gpg]  https://repo.vitexsoftware.com  $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/vitexsoftware.list
sudo apt update

sudo apt install abraflexi-client-config
```

For web applications, there is also a package with preconfigured settings for Apache

```shell
sudo apt install apache-abraflexi-client-config
```

Youtube:
[![Installation](http://img.youtube.com/vi/pToYZfh3dFE/0.jpg)](http://www.youtube.com/watch?v=pToYZfh3dFE)

Screenshot:
![Install Upgrade](doc/install-upgrade.png?raw=true "Install Upgrade Screenshot")

After installing the package, two new commands are available in the system:

* **abraflexi-client-config**         - command line tool for changing values in /etc/abraflexi/client.json
* **abraflexi-client-config-checker** - used to test the configured settings
* **abraflexi-client-reconfigure**    - dialogs for entering login credentials

Dependencies
------------

This tool uses the following libraries for its functionality:

* [**PHP Ease Framework**](https://github.com/VitexSoftware/php-ease-core) - helper functions, e.g., logging
* [**PHP-AbraFlexi**](https://github.com/Spoje-NET/php-abraflexi/)        - communication with [AbraFlexi](https://abraflexi.eu/)

The package is used by these applications:

* [abraflexi-testing-tools]( https://github.com/VitexSoftware/AbraFlexi-Tools )
* [php-abraflexi-reminder]( https://github.com/VitexSoftware/php-abraflexi-reminder)
* [php-abraflexi-matcher]( https://github.com/VitexSoftware/php-abraflexi-matcher )
* [monitoring-plugins-abraflexi]( https://github.com/VitexSoftware/monitoring-plugins-abraflexi )

MultiFlexi
----------

Config for AbraFlexi is ready for run as [MultiFlexi](https://multiflexi.eu) application.

See the full list of ready-to-run applications within the MultiFlexi platform on the [application list page](https://www.multiflexi.eu/apps.php).

[![MultiFlexi App](https://github.com/VitexSoftware/MultiFlexi/blob/main/doc/multiflexi-app.svg)](https://www.multiflexi.eu/apps.php)
