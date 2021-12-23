# MTC

Personel > Adres birden çok'a ilişki CRUD sistemi.

- Laravel Framework 8.77.1
- Bootstrap v5.1

## Docker

- Nginx: 1.21.4
- Php: 7.4.20-fpm
- Mysql: 8.0.27
- Memcached 1.6.12

## Kurulum

### 1. İndirme

Repoyu MTC isimli klasöre klonluyoruz.

```
git clone https://github.com/onuronat001/MTC MTC
```

### 2. Docker

Eğer docker yoksa; https://docs.docker.com/ adresinden docker için gerekli kurulumları yapabilirsiniz.

```
cd ~/MTC/
docker-compose up -d
```
> Docker containerlarımızı hazır hale getiriyoruz.
> - Nginx web sunucumuz 8000 üzerinden yayın yapıyor.
> - Mysql veritabanı sunucumuz 3307 üzerinden yayın yapıyor (MTC Application ise bridge network kullandığı için Laravel env de 3306 portunda).
> - Memcache standart portu olan 11211 üzerinden hazır.

### 3. Migration

Docker containerlarımız çalışınca artık laravel için veritabanını hazır hale getiriyoruz.

```
docker exec mtc_app_1 php artisan migrate
```

> Migration ile tüm tablolar oluşturuluyor.

### 4. Factory Seed

Tinker kullanarak person tablosune dummy data girebiliriz. Bunun için aşağıdaki komutu kullanabilirsiniz. "{row_count}" değeri kayıt miktarını temsil eder.

```
docker exec -it mtc_app_1 php artisan tinker --execute='Person::factory({row_count})->create()'
```


### 1. Personel Listeleme

| Tip | Değer |
| --- | --- |
| Adress | http://localhost:8000/person |

> Listelemede sayfalama kullanılıyor. Her sayfada 10 kayıt.

### 2. Yeni Personel

| Tip | Değer |
| --- | --- |
| Adress | http://localhost:8000/person/new |

> Form validasyon yapılıyor (Server-Side).

### 3. Personel Güncelleme

| Tip | Değer |
| --- | --- |
| Adress | http://localhost:8000/person/edit/{person_id} |

> Form validasyon yapılıyor (Server-Side).

### 4. Personel Silme

| Tip | Değer |
| --- | --- |
| Adress | http://localhost:8000/person/remove/{person_id} |

> Migration da db tarafında relationship yapıldı ve delete cascade olarak ayarlandı. Silinin bir personelin adresleri de siliniyor.

### 5. Adres Listeleme

| Tip | Değer |
| --- | --- |
| Adress | http://localhost:8000/address/{person_id} |

> Adresler listelenirken cache mekanizması çalışıyor 5 dakikalık cache yapıyor. Bir kayıt eklendiğinde, güncellendiğinde veya silindiğinde bu cache temizleniyor.

### 6. Yeni Adres Ekleme

| Tip | Değer |
| --- | --- |
| Adress | http://localhost:8000/address/new/{person_id} |

> Form validasyon yapılıyor (Server-Side).

### 7. Adres Güncelleme

| Tip | Değer |
| --- | --- |
| Adress | http://localhost:8000/address/edit/{address_id} |

> Form validasyon yapılıyor (Server-Side).

### 8. Adres Silme

| Tip | Değer |
| --- | --- |
| Adress | http://localhost:8000/address/remove/{address_id} |
