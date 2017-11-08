# QHotspot freeRADIUS3 Management Panel for pfSense 
![QHotspot](QHotspot-logo.png)
## Getting Started

* Türkçe açıklamalar için lütfen [tıklayınız](README-tr.md).

**!!! This project is under construction. We are not responsible for any problems that may occur in your system.**

**This installation is a new panel installation. For the old ghost panel, please use [this branch](https://bitbucket.org/qtechnics/qhotspot/src/ghost/).

This project aims to set up a Hotspot panel powered by Laravel, MySQL, PDO, freeRADIUS3 on pfSense with a command and make necessary adjustments. 

It also includes the control application of Unifi antennas as an extra.

### Prerequirements

* Fresh installed pfSense 2.3.x or higher

### Installing

####Important
**If you are using 2.3.x, go to System -> Update -> Update Settings and select Firmware Branch "Security / Errata only (2.3.x)".**

Connect to pfSense console with popular SSH Client on SSH 
And run the following command :

**Note : root user must be logged in. Not admin.**

```
fetch -o install.sh https://goo.gl/yzXRnL && sh install.sh
```

#####Default Configs
* Default mysql root password is ``qhotspot`` and port ``3306``
* Default mysql freeRADIUS username and password both ``qhotspot`` and remote access allowed.
* Default mysql watchdog cron trigger time is every minute
* Default freeRADIUS3 test username and password both ``test``
* Default freeRADIUS3 mysql test username and password both ``testmysql``
* Default Captive Portal zone name is ``QHOTSPOT``
* Default Unifi Controller port is ``8080 (http)`` & ``8443 (https)`` 


## Roadmap
* ~~Install MySQL 5.6~~
* ~~Install PHP MySQL Extensions~~
* ~~Install freeRADIUS3 package~~
* ~~Install cron package~~
* ~~freeRADIUS3 CA & certificate create~~
* ~~freeRADIUS3 settings~~
* ~~freeRADIUS3 EAP settings~~
* ~~freeRADIUS3 test user create~~
* ~~freeRADIUS3 mysql test user create~~
* ~~pfSense CaptivePortal settings~~
* Web panel design
* Web panel integration to MySQL
* Logging & Signing of the law of the Republic of Turkey No.5651
* ...[more](https://bitbucket.org/qtechnics/qhotspot/issues?kind=enhancement&kind=proposal)

## Built With
* [PHPStorm](https://www.jetbrains.com/phpstorm/) - Best PHP IDE
* [Git](https://git-scm.com/) - Versioning System
* [GitKraken](https://www.gitkraken.com/) - Best Git GUI
* [Composer](https://getcomposer.org/) - PHP Package Manager
* [Larevel](https://laravel.com) - A PHP Framework For Web Artisans
* [InfyOm AdminLTE](https://github.com/InfyOmLabs/adminlte-templates) - AdminLTE templates for InfyOm Laravel Generator
* [InfyOm Laravel Generator](https://github.com/InfyOmLabs/laravel-generator) - API, Scaffold, CRUD Laravel Generator
* [Defender](https://github.com/artesaos/defender) - Defender is a Access Control List (ACL) Solution for Laravel 5.*
* [Laravel Localization](https://github.com/mcamara/laravel-localization) - Easy localization for Laravel 5.*
* [pfSense Shell](https://doc.pfsense.org/index.php/Using_the_PHP_pfSense_Shell) - pfSense PHP Shell
* [unifi-pfSense](https://github.com/gozoinks/unifi-pfsense) - UniFi Controller software on pfSense and other FreeBSD systems

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Authors

* **Muzaffer Ali AKYIL** - *Initial work* - [Victorious](https://muzaffer.akyil.net)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Resources & Special Thanks

* [Fatih ATA - Logo Creator](mailto:fatihata@gmail.com)
* [Serdar Bayram - Blog](https://www.serdarbayram.net/)
* [Samet Yılmaz - Blog](http://sametyilmaz.com.tr/)
* [pfSense Forums](https://forum.pfsense.org)
* [freeBSD Forums](https://forums.freebsd.org/)