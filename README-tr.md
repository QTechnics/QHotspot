# QHotspot pfSense için freeRADIUS3 Yönetim Paneli (Ghost Sürümü)
![QHotspot](QHotspot-logo.png)
## Başlarken

* For English [use this file](README.md).

**!!! Bu branch minumum pfSense 2.4.4 gerektirir.

**!!! Bu proje daha yapım aşamasındadır. Sisteminize gelebilecek zararlardan sorumlu değiliz.**

**!!!Bu brnch eski Ghost Panel kurulumdur. Yeni QHotspot Panel kurulumu için lütfen [bu branch'ı](https://bitbucket.org/qtechnics/qhotspot/src/) kullanınız.**

### Gereksinimler

* Temiz kurulmuş pfSense 2.4.4 yada üstü

### Kurulum

Kurulum videosu : https://youtu.be/Fl9omolHmz0

####Önemli
**Eğer pfSense'nin 2.3.x sürümünü kullanıyorsanız System -> Update -> Update Settings altında bulunan Firmware Branch alanında "Security / Errata only (2.3.x)" seçiniz.**

Herahngi bir SSH istemci yazılımı ile pfSense'ye SSH üzerinden bağlanıp aşağıdaki komutu çalıştırıp direktifleri takip ediniz:

**Not : SSH'a root kullanıcısı ile bağlanın admin değil !**

```
fetch -o install.sh https://goo.gl/mc8cqn && sh install.sh
```

#####Varsayılan Ayarlar
* MySQL varsayılan root şifresi ``qhotspot`` ve port ``3306`` dır.
* MySQL varsayılan freeRADIUS kullanıcısı ve şifresi ``qhotspot`` ve uzak bağlantıya açıktır.
* Varsayılan servis kontrol aralığı 1 dakikadır
* Varsayılan freeRADIUS3 test kullanıcı adı ve şifresi ``test`` tir.
* Varsayılan freeRADIUS3 MySQL test kullanıcı adı ve şifresi ``testmysql`` tir.
* Varsayılan Captive Portal bölge ismi ``QHOTSPOT`` tur.
* Varsayılan Unifi Controller portu ``8080 (http)`` & ``8443 (https)`` tür. 
* Varsayılan Ghost Panel portu ``81``, kullanıcı adı ``admin`` ve şifresi ``ghost`` tur.

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
* 5651 sayılı kanun gereği log tutulması ve imzalanması.
* ...[daha fazla](https://bitbucket.org/qtechnics/qhotspot/issues?kind=enhancement&kind=proposal)

## Bunlarla Yapıldı
* [PHPStorm](https://www.jetbrains.com/phpstorm/) - Best PHP IDE
* [Git](https://git-scm.com/) - Versioning System
* [GitKraken](https://www.gitkraken.com/) - Best Git GUI
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