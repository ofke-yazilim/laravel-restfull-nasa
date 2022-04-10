# Hakkında
#### Swagger üzerinde görmek için : http://rover.okesmez.com/api/documentation
 - **Laravel 8** Framework'ü üzerine **Php 7.4** ile kodlanmıştır.
 - Docker için **dockerfile** ve **docker-compose.yaml** dosyaları oluşturulmuştur.
 - İçerisinde Restfull servisleri barındırmaktadır.
 - Kodlanan servislerin dökümantasyonu https://swagger.io/ altyapısına entegre edilmiştir.
 - Proje v1 ve v2 olarak hazırlanmıştır. Her ikisi de Swagger ekranında çalıştırılabilir durumdadır.
 - Canlı test için : http://rover.okesmez.com/api/documentation 
 - Local test için : http://localhost/api/documentation <br>

**http://rover.okesmez.com/api/v1/auth/login ve http://localhost/api/v1/auth/login servislerini kullanmak için gerekli olan token aşağıdaki bilgiler kullanılarak alınır.**
 <pre>
 Email : info@okesmez.com
 Password : 123456
 </pre>

# Projeyi Docker ile çalıştırma
İlk olarak Framework dizininde bulunan **.env.example** dosyasının adı **.env** olarak değiştirilmelidir.
****
 - Docker image oluşturmak için Dockerfile'ın bulunduğu dizinde aşağıdaki command çalıştırılmalıdır.<br>
`docker build -t rover-image:v1.1.5 .`
 - İmage oluşturulduktan sonra **Docker-compose.yaml** dosyası açılarak dosya içerisine oluşturulan versiyon yazılır.<br>
 - Aşağıdaki command çalıştırılarak. Docker ortamda proje ayağı kaldırılmış olur.<br>
  `docker-compose up -d --build`
> Yukarıdaki işlemlerden sonra birkaç dakika beklenmelidir. Mysql veritabanın ve Projenin ayağı kalkması biraz zaman alıyor.

## TEST
Plateau servisisine ait işlemler için unit test kodlandı. Test sonucunu görebilmek için aşağıdaki komutu ana dizinde çalıştırınız.
<br>`php /data/www/artisan test`

###  İşlem local bilgisayarda yapılıyorsa projeye ait linkler aşağıdadır.
**Servisler ve Kullanımları :** https://localhost/api/documentation (Servisler bu adresten test edilebilir.)<br>
**Phpmyadmin:**   http://localhost:8080/ (**username:** root **password:** Z5AajEapuLZuNuv)  

 - Projenin bulunduğu container içerisine girebilmek için aşağıdaki command çalıştırılmalıdır. <br>
   `docker-compose exec web sh` 
   
 - Yukarıdaki command ile container terminaline girilmiş olur. Proje kodlarının  bulunduğu yere ise`cd data/www` dosya yoluna gidilerek ulaşılır.

## Postman
- okesmez.com üzerinde çalışan projeyi postman üzerinde test etmek için ise aşağıdaki dosya import edilmelidir.<br>
https://github.com/ofke-yazilim/laravel-rover-movement/blob/main/rover-okesmez.com.postman_collection.json

## Dosyalar

 1. Route : https://github.com/ofke-yazilim/laravel-rover-movement/blob/main/framework/routes/web.php
 2. Controller : https://github.com/ofke-yazilim/laravel-rover-movement/tree/main/framework/app/Http/Controllers
 3. Model : https://github.com/ofke-yazilim/laravel-rover-movement/tree/main/framework/app/Models
 4. Seed : https://github.com/ofke-yazilim/laravel-rover-movement/tree/main/framework/database/seeders
 5. Migrations : https://github.com/ofke-yazilim/laravel-rover-movement/tree/main/framework/database/migrations
 6. Koşturulan artisan ve terminal kodları : https://github.com/ofke-yazilim/laravel-rover-movement/blob/main/configs/recompile.sh
 

