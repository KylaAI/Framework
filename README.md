# Kyla Framework
Framework ini adalah framework sederhana yang pada awalnya dibentuk khusus untuk memproses data pada sistem Kyla baik itu Telegram maupun Line. Seiring berjalannya waktu, framework ini mengalami banyak perubahan dan pada akhirnya kami berfokus untuk mengembangkan framework ini dalam project yang berbeda. Framework ini menggunakan konsep MVC(Model, Controller, View). Dengan konsep ini kita dapat menyelesaikan suatu proyek secara tim dengan fleksibel dimana front-end hanya mengurusi bagian tampilan dan back-en hanya mengurus proses data sebelum di tampilkan ke pengguna.

## Apa saja yang dibutuhkan
..* PHP Versi >= 5.6 (Disarankan Versi &=7)
..* Webserver Apache
..* Pengetahuan dasar framework MVC

## Installasi & Penggunaan
Dalam penginstallan framework ini ada beberapa hal yang perlu diperhatikan. 

### Config
Folder *App/Config* digunakan untuk meletakkan konfigurasi framework ini baik berupa database hingga path view. Dalam pemanggilan konfigurasi kalian bisa menggunakan script berikut.

```php
    use Config\Config;
    Config::get('namaconfig');
```

Seperti contoh saya akan mengambil config Database.php

```php
    use Config\Config;
    Config::get('database');
```

Hal yang perlu diperhatikan ketika membuat konfigurasi adalah penggunaan huruf besar di awal nama file. Seperti contoh konfigurasi database dengan nama *Database.php*.

### Helpers
Folder *App/Helpers* digunakan sebagai tempat meletakkan library pendukung untuk mengoptimalkan kinerja framework. Penamaan pada file juga menggunakan huruf besar diawal.

### Bootstrap
Folder *App/Bootstrap* merupakan folder yang berisi file autoload, App dan helper.

#### Autoload
Autoload pada folder *App/Bootstrap* digunakan untuk melakukan register autoload yang nantinya akan digunakan untuk memanggil class. Root folder yang dipanggil berada di folder App. Seperti contoh script berikut.

```php
use  Config\Config;
```
Script tersebut akan memanggil App/Config/Config.php sehingga tidak dapat mengakses class diluar folder App. Gunakan nama file dan class dengan nama yang sama, karena autoload tidak dapat memanggil class dengan nama file yang berbeda. Dalam setiap class yang dibuat harus menuliskan namespace sesuai dengan lokasi folder. Seperti contoh namespace untuk file dan class Config sebagai berikut.

```
namespace Config;
```

#### App
App pada folder *App/Bootstrap* digunakan untuk mengatur proses pemilihan controller, method, serta mengatur URL. Untuk URL sendiri menggunakan sistem segment. Berikut gambaran segment pada URL.
```
Website/public/Controller/Method/Parameter(1)/Parameter(n)
```
Dengan seperti ini pemilihan controller berdasarkan url.
#### Helper
Helper pada folder *App/Bootstrap* digunakan untuk menyimpan function yang akan digunakan pada framework. File ini tidak menggunakan class sehingga untuk pemanggilan tinggal memanggil functionnya saja. Seperti contoh ingin mengambil segment ke 1 pada URL.

```php
echo segment(1);
```

Dimana akan memanggil script ini pada file helper.php

```php
function segment($n){
  if(!isset(SEGMENT[$n])){
    return "Segment Not Found";
  }
  return SEGMENT[$n];
}
```

### Http
Pada folder ini proses pengolahan dan penampilan data berlangsung.

#### Controllers
Folder ini digunakan untuk meletakkan controller yang nantinya akan dipakai pada website. Untuk penamaan controller dengan format sebagai berikut.

```
NamacontrollerController.php
```

Nama controller menggunakan huruf besar di awal, lalu tambahkan Controller di akhir nama untuk memberitahukan kepada sistem bahwa file tersebut adalah file controller. Untuk contoh silahkan dilihat penamaan file *App/Http/Controllers/HomeController.php*
