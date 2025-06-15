# Gaskeun Express

Sistem manajemen ekspedisi sederhana berbasis PHP.

## 📁 Struktur Folder

```
gaskeun-express/
├── app/                 # Berisi controller, core, dan model aplikasi
│   ├── controllers/
│   ├── core/
│   ├── models/
│   └── .htaccess        # Rename dari app.htaccess
├── public/              # Folder publik yang diakses dari browser
│   ├── assets/
│   ├── css/
│   ├── js/
│   ├── img/
│   ├── index.php        # Front controller
│   └── .htaccess        # Rename dari publik.htaccess
├── .gitignore
├── README.md
```

## 🔧 Instalasi

1. Clone atau salin folder ini ke direktori `htdocs`:
    ```
    C:\laragon\htdocs\gaskeun-express\
    ```

2. Ubah nama file berikut:
    - `app/app.htaccess` → `app/.htaccess`
    - `public/publik.htaccess` → `public/.htaccess`

3. Import database:
    - Gunakan file `db_prakbasdat`
    - Masukkan ke database MySQL melalui phpMyAdmin

4. Akses proyek melalui browser:
    ```
    http://localhost/gaskeun-express/public/
    ```

## ✅ Fitur Utama

- CRUD data ekspedisi (paket, kurir, layanan, dll)
- Pemantauan pelacakan
- Log aktivitas melalui trigger
- Tampilan dashboard dan laporan via view SQL

## 🤝 Kontributor

Kelompok 3 - Praktikum Basis Data  
