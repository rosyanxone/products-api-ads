# Products API
<p>
    Test Case Full-Stack Web Developer Submission  ADS x MSIB 6
</p> 

## Introduction
<p>
    Seleksi program MSIB 6 Posisi full-stack web developer di ADS Digital Partner. Evaluasi pengetahuan teknis, keterampilan pemrograman, dan kemampuan analitis. Aplikasi dibuat untuk memenuhi seleksi FSWD di ADS digital partner. Test case yang dipilih dan dikerjakan sesuai petunjuk adalah test case FSWD 2. Kriteria Aplikasi/API Endpoint: dapat menampilkan daftar Kategori, menampilkan daftar Produk dan CRUD, dapat menampilkan urutan sesuai kriteria, dapat menambah produk asset dan menghapus asset.
</p>

## Table of Contents
- [Installation](#installation)
- [API Docs](#api-docs)

## Installation
Prerequisite
- [PHP](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [XAMPP](https://www.apachefriends.org/download.html) or similar
- [Node.js](https://nodejs.org/en/download)

Clone Repositry
```bash
git clone https://github.com/rosyanxone/products-api-ads.git
```
Install dependencies
```bash
composer install
npm install && npm run dev
```
Start SQL server

Set Database name at .ENV file
```env
DB_DATABASE=ads_products_api
```
Do migrate & seeding database
```bash
php artisan migrate:fresh --seed
```
Run application
```bash
php artisan serve
```

## API Docs
### Endpoint
> http://127.0.0.0.1:8000/api
### Register
- Path
  + /register
- Method
  + `POST`
- Request Body
```javascript
{
    "name": string
    "email": string
    "password": string
    "password_confirmation": string
}
```
- Responses
```javascript
{
    "status": string
    "message": string
    "data": object
}
```
- Postman Example
![image](https://github.com/rosyanxone/products-api-ads/assets/73805258/38f0bfc0-81f6-472c-9eb9-2dfca12f887d)
### Login
- Path
  + /login
- Method
  + `POST`
- Request Body
```javascript
{
    "email": string
    "password": string
}
```
- Responses
```javascript
{
    "status": string
    "message": string
    "data": object
}
```
- Postman Example
![image](https://github.com/rosyanxone/products-api-ads/assets/73805258/a8c9e742-2db2-4417-8fc0-231c3b1cdedd)

### Insert Bearer Token
- Postman Example
![image](https://github.com/rosyanxone/products-api-ads/assets/73805258/3e76a26e-caad-4c7b-a97f-0471e324ca76)

### Categories
- Path
  + /categories 
- Method
  + `GET`
- Responses
```javascript
{
    "status": string
    "message": string
    "data": array
}
```
- Postman Example
![image](https://github.com/rosyanxone/products-api-ads/assets/73805258/3a93d234-ef6b-48d3-ae6f-48505edf9a61)

### Categories by Product Amount
- Path
  + /categories/descending 
- Method
  + `GET`
- Responses
```javascript
{
    "status": string
    "message": string
    "data": array
}
```
- Postman Example
![image](https://github.com/rosyanxone/products-api-ads/assets/73805258/f30e6887-6f74-4adc-a3eb-480fa6f9712c)

### Products
- Path
  + /products 
- Method
  + `GET`
- Responses
```javascript
{
    "status": string
    "message": string
    "data": array
}
```
- Postman Example
![image](https://github.com/rosyanxone/products-api-ads/assets/73805258/4f77014c-9823-436e-87fd-bcd1ead275cc)

### Products by the most expensive price
- Path
  + /products/sorted
- Method
  + `GET`
- Responses
```javascript
{
    "status": string
    "message": string
    "data": array
}
```
- Postman Example
![image](https://github.com/rosyanxone/products-api-ads/assets/73805258/2fa47090-2ac5-4216-b98e-763885234be9)

### Create Product
- Path
  + /product/store
- Method
  + `POST`
- Request Body
```javascript
{
    "category_id": integer
    "name": string
    "price": integer
    "images": array
}
```
- Responses
```javascript
{
    "status": string
    "message": string
    "data": oject
}
```
- Postman Example
![image](https://github.com/rosyanxone/products-api-ads/assets/73805258/72217469-b897-4f8e-bf97-e13c6c548076)

### Update Product
- Path
  + /product/update/{id}
- Method
  + `POST`
- Request Body
```javascript
{
    "category_id": integer
    "name": string
    "price": integer
}
```
- Responses
```javascript
{
    "status": string
    "message": string
    "data": oject
}
```
- Postman Example
![image](https://github.com/rosyanxone/products-api-ads/assets/73805258/8937ad4f-acd9-4e5f-96b6-12ce9a30e3a9)

### Delete Product
- Path
  + /product/destroy/{id}
- Method
  + `DELETE`
- Responses
```javascript
{
    "status": string
    "message": string
    "data": null
}
```
- Postman Example
![image](https://github.com/rosyanxone/products-api-ads/assets/73805258/7fdc658d-cfcf-4f35-9753-787e041f34e0)

### Create Product Asset
- Path
  + /product-asset/store
- Method
  + `POST`
- Request Body
```javascript
{
    "product_id": integer
    "image": string
}
```
- Responses
```javascript
{
    "status": string
    "message": string
    "data": oject
}
```
- Postman Example
![image](https://github.com/rosyanxone/products-api-ads/assets/73805258/839a5db1-692c-4013-9b11-9a599f38a89f)

### Delete Product Asset
- Path
  + /product-asset/destroy/{id}
- Method
  + `DELETE`
- Responses
```javascript
{
    "status": string
    "message": string
    "data": null
}
```
- Postman Example
![image](https://github.com/rosyanxone/products-api-ads/assets/73805258/9282dce0-3881-424c-ab14-6df51d96f0f0)
