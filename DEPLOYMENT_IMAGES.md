# Deployment Notes - Image Paths and Storage

## Mengapa gambar tidak muncul

Aplikasi ini saat ini menampilkan gambar dari field database dengan path yang dibungkus `asset('storage/' . $path)`. Artinya browser akan mencari file di:

- `/storage/fe/images/...`

Namun source image awal ada di:

- `public/fe/images/...`

Jadi jika file tidak tersedia di `public/storage/fe/images`, gambar akan tampil sebagai broken image.

## Aturan penting ketika deploy

1. Pastikan `public/storage` terhubung ke `storage/app/public`.
2. Pastikan folder `storage/app/public/fe/images` berisi semua file gambar yang dibutuhkan.
3. Pastikan file yang ada di database menggunakan path relatif yang sama, contohnya:
   - `fe/images/gallery1.jpg`
   - `fe/images/slider1.jpg`
   - `fe/images/profile-1.jpg`

## Perintah yang harus dijalankan

Di project Laravel, jalankan:

```bash
php artisan storage:link
```

Jika Anda mempunyai gambar static di `public/fe/images`, salin atau deploy juga ke:

```bash
storage/app/public/fe/images
```

Contoh perintah di Linux/macOS:

```bash
mkdir -p storage/app/public/fe/images
cp -R public/fe/images/* storage/app/public/fe/images/
```

Contoh perintah di Windows CMD:

```cmd
mkdir storage\app\public\fe\images
xcopy /E /I public\fe\images storage\app\public\fe\images
```

Contoh perintah di PowerShell:

```powershell
New-Item -ItemType Directory -Force -Path storage\app\public\fe\images
Copy-Item -Path public\fe\images\* -Destination storage\app\public\fe\images -Recurse -Force
```

## Pastikan setelah deploy

- `public/storage/fe/images` ada dan berisi file gambar
- browser dapat membuka URL seperti:
  - `http://your-domain/storage/fe/images/gallery1.jpg`
  - `http://your-domain/storage/fe/images/slider1.jpg`

Jika URL tersebut berhasil menampilkan gambar, maka view aplikasi juga seharusnya bisa render gambar dari database.

## Catatan tambahan

Jika nanti Anda ingin menyederhanakan path gambar, gunakan satu dari dua cara:

- Simpan data gambar di database sebagai path `storage/fe/images/...` langsung, atau
- Ubah view agar menampilkan `asset($path)` tanpa `storage/` jika semua gambar berada di `public/fe/images`.

Untuk sekarang, cara yang paling aman adalah memastikan `public/storage/fe/images` tersedia dan dapat diakses.
