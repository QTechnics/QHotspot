# QHotspot pfSense için freeRADIUS3 Yönetim Paneli 
![QHotspot](QHotspot-logo.png)
## Başlarken

* For English [use this file](README.md).

**!!! Bu proje daha yapım aşamasındadır. Sisteminize gelebilecek zararlardan sorumlu değiliz.**

**Bu kurulum yeni panel kurulumdur. Eski versiyon olan Ghost panel kurulumu için lütfen [bu branch'ı](https://bitbucket.org/qtechnics/qhotspot/src/ghost/) kullanınız.**

Bu proje Laravel, MySQL, PDO, freeRADIUS3 gibi gereksinimleri pfSense'ye otomatik olarak kurup ayarlarının yapılmasını hedeflemektedir. 

Ekstra olarak Unifi antenlerinin kontrol yazılımı da projeye dahil edilmiştir.

### Gereksinimler

* Temiz kurulmuş pfSense 2.3.x yada üstü

### Kurulum

####Önemli
**Eğer pfSense'nin 2.3.x sürümünü kullanıyorsanız System -> Update -> Update Settings altında bulunan Firmware Branch alanında "Security / Errata only (2.3.x)" seçiniz.**

Herahngi bir SSH istemci yazılımı ile pfSense'ye SSH üzerinden bağlanıp aşağıdaki komutu çalıştırıp direktifleri takip ediniz:

**Not : SSH'a root kullanıcısı ile bağlanın admin değil !**

```
fetch -o install.sh https://goo.gl/yzXRnL && sh install.sh
```

#####Varsayılan Ayarlar
* MySQL varsayılan root şifresi ``qhotspot`` ve port ``3306`` dır.
* MySQL varsayılan freeRADIUS kullanıcısı ve şifresi ``qhotspot`` ve uzak bağlantıya açıktır.
* Varsayılan servis kontrol aralığı 1 dakikadır
* Varsayılan freeRADIUS3 test kullanıcı adı ve şifresi ``test`` tir.
* Varsayılan freeRADIUS3 MySQL test kullanıcı adı ve şifresi ``testmysql`` tir.
* Varsayılan Captive Portal bölge ismi ``QHOTSPOT`` tur.
* Varsayılan Unifi Controller portu ``8080 (http)`` & ``8443 (https)`` tür. 


## Yol Haritası
* ~~MySQL 5.6 Kurulum~~
* ~~PHP MySQL eklentileri kurulum~~
* ~~freeRADIUS3 paketi kurulum~~
* ~~cron paketi kurulum~~
* ~~freeRADIUS3 CA & sertifika oluşturma~~
* ~~freeRADIUS3 ayarları~~
* ~~freeRADIUS3 EAP ayarları~~
* ~~freeRADIUS3 test kullanıcısı oluşturma~~
* ~~freeRADIUS3 mysql test kullanıcısı oluşturma~~
* ~~pfSense CaptivePortal ayarları~~
* Web panel tasarımı
* Web panel MySQL entegrasyonu
* 5651 sayılı kanun gereği log tutulması ve imzalanması.
* ...[daha fazla](https://bitbucket.org/qtechnics/qhotspot/issues?kind=enhancement&kind=proposal)

## Bunlarla Yapıldı
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

## Katkıda Bulunma

Davranış kurallarımıza ilişkin ayrıntılar ve bize katkıda bulunma talepleri gönderme süreci için lütfen [CONTRIBUTING.md](CONTRIBUTING.md) adresini okuyun.

## Yazarlar

* **Muzaffer Ali AKYIL** - *Fikir sahibi* - [Victorious](https://muzaffer.akyil.net)

## Lisans

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Kaynaklar & Teşekkür

* [Fatih ATA - Logo Tasarımı](mailto:fatihata@gmail.com)
* [Serdar Bayram - Blog](https://www.serdarbayram.net/)
* [Samet Yılmaz - Blog](http://sametyilmaz.com.tr/)
* [pfSense Forums](https://forum.pfsense.org)
* [freeBSD Forums](https://forums.freebsd.org/)