# Register dan Login mengunakan Media Sosial

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)]()

## 📝 Deskripsi
Aplikasi berbasis web yang digunakan untuk menampilkan artikel dan video materi untuk user yang telah terdaftar di database sistem ini. Di dalam file proyek ini, saya sudah menyediakan databasenya member_system.sql sehingga bisa diimport ke database. Sudah menggunakan  Client ID dan Secret Google dan FaceBook. Jumlah artikel dan video materi bergantung pada jenis keanggotaan user, yaitu :
*	1. default jenis keanggotaan (membership_types) user ketika pertama kali registrasi menggunakan google adalah Tipe A jika melakukan registrasi menggunakan akun Google atau Facebook. Jika user melakukan registrasi secara manual maka user dapat memilih sendiri jenis keanggotaan (membership_types).
*	2. 1 username (email) untuk 1 orang
 

## 🚀 Fitur Utama
*   Fitur 1: Registrasi dan Login mengunakan Media Sosial (Google dan Facebook)
*   Fitur 2: Registrasi dan Login secara manual
*   Fitur 3: akses untuk 3 tipe membership beserta page untuk Login:
	   - Tipe A hanya bisa mengakses 3 artikel dan 3 video  
	   - Tipe B bisa mengakses 10 artikel dan 10 video
	   - Tipe C bisa mengakses keseluruhan artikel dan video

## 🛠️ Teknologi yang Digunakan
*   1. XAMPP/Laragon
*	2. DBMS bisa menggunakan aplikasi HeidiSQL
*	3. PHP 7.4
*   4. MySQL
*	5. Text Editor seperti Visual Studio Code, Notepad++, Sublime, atau lain-lain

## 📋 Prasyarat
Hal yang perlu diperhatikan sebelum install file proyek  
*   1. Sudah install xampp atau laragon serta menggunakan PHP 7.4
*   2. Sudah install web browser seperti Mozill Firefox, Google Chrome, Safari, dan lain-lain
*	3. Aplikasi DBMS yang dirasa sudah familiar atau nyaman
*	4. Pastikan pc sudah terhubung dengan internet 

## ⚙️ Instalasi & Cara Menjalankan
1.  **Clone repositori:**
    ```bash
    git clone https://github.com/rizalnoerhamdan42/member_system
    ```
2.  **Masuk ke direktori:**
    ```bash
    cd nama-repo
    ```
3.  **Instal dependensi:**
    ```bash
    npm install  # atau pip install -r requirements.txt
    ```
4.  **Jalankan aplikasi:**
    ```bash
    npm start    # atau python main.py
    ```## 🤝 Kontribusi
	
5. **Import database juga member_system.sql di aplikasi DBMS kesayangan anda**
	  ``` 
    ```
 
6. ** Buka web browser dan ketikkan http://localhost/member_system/  **
	 ```

Kontribusi selalu diterima! Silakan buka *issue* atau kirim *pull request*.
 
