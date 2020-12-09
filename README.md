# Daftar Wilayah Indonesia PHP

Daftar seluruh wilayah yang ada di Indonesia mulai dari Kelurahan hingga Provinsi.

Sumber data berasal dari rajaapi.com 2018

## Contoh penggunaan

```code
$id = new Indonesian(dirname(__FILE__) . '/data');

// Daftar provinsi
print_r($id->getProvince());

// Daftar Kota di Provinsi Banten
print_r($id->getCity(36));

// Daftar Kecamatan di Kab Tangerang - Banten
print_r($id->getKecamatan(36, 3603));

// Daftar Kelurahan di Kecamatan Rajeg, Kab Tangerang - Banten
print_r($id->getKelurahan(36, 3603, 3603170));
```
