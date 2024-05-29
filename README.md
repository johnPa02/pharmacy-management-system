# README

## Giới thiệu

Đây là hướng dẫn để cấu hình và chạy sản phẩm minh họa của dự án quản lý nhà thuốc. Hướng dẫn này sẽ giúp bạn thiết lập môi trường, khởi chạy ứng dụng, và truy cập vào các thành phần của dự án bao gồm front end, back end và cơ sở dữ liệu. Nếu ứng dụng/website yêu cầu thông tin đăng nhập, chúng cũng sẽ được liệt kê trong tài liệu này.

## Yêu cầu hệ thống

- Docker
- Docker Compose

## Các bước thiết lập và chạy ứng dụng

### Bước 1: Tải và cài đặt Docker và Docker Compose

Đảm bảo rằng Docker và Docker Compose đã được cài đặt trên thiết bị của bạn. Nếu chưa, bạn có thể tải và cài đặt từ các liên kết sau:

- Docker: [Tải Docker](https://www.docker.com/products/docker-desktop)
- Docker Compose: [Tải Docker Compose](https://docs.docker.com/compose/install/)

### Bước 2: Tải mã nguồn dự án

Tải mã nguồn dự án từ repository hoặc nhận từ người phát triển và giải nén vào một thư mục trên thiết bị của bạn.

### Bước 3: Tạo tệp `.env`

Trong thư mục gốc của dự án, tạo một tệp `.env` với nội dung sau:

```plaintext
DB_HOST=db
DB_NAME=pharmacy_db
DB_USER=user
DB_PASSWORD=userpassword
```

### Bước 4: Khởi động Docker Compose

Mở terminal hoặc command prompt, điều hướng đến thư mục chứa tệp `docker-compose.yml`, và chạy lệnh sau để khởi động tất cả các dịch vụ:

```sh
docker-compose up -d
```

Lệnh này sẽ tự động tải về các image cần thiết từ Docker Hub và khởi động các container cho ứng dụng.

## Truy cập ứng dụng

### Ứng dụng web

- URL: [http://localhost:8083](http://localhost:8083)

### phpMyAdmin

- URL: [http://localhost:8082](http://localhost:8082)

## Thông tin đăng nhập

Ứng dụng yêu cầu thông tin đăng nhập để truy cập vào các tài khoản quản trị và nhân viên. Dưới đây là thông tin đăng nhập mẫu:

### Tài khoản quản trị (Admin)

- **Username**: admin@gmail.com
- **Password**: 123456

### Tài khoản nhân viên (Staff)

- **Username**: duocsi01@gmail.com
- **Password**: 123456

## Cấu trúc thư mục dự án

```
pharmacy-management-system/
├── app/
│   ├── middleware/
│   │   └── AuthMiddleware.php
│   ├── model/
│   │   ├── Account.php
│   │   ├── Employee.php
│   │   ├── Customer.php
│   │   ├── Drug.php
│   │   ├── Sale.php
│   │   ├── SaleDetail.php
│   │   ├── Supplier.php
│   │   ├── Admin.php
│   │   └── Pharmacist.php
│   ├── view/
│   │   ├── account/
│   │   │   ├── login.php
│   │   │   ├── register.php
│   │   ├── employee/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── index.php
│   │   ├── customer/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── index.php
│   │   ├── supplier/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── index.php
│   │   ├── drug/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── index.php
│   │   ├── sales/
│   │   │   ├── new_sale.php
│   │   │   ├── view_sales.php
│   │   ├── details/
│   │   │   └── view_details.php
│   │   └── layout.php
├── core/
│   ├── Controller.php
│   ├── Model.php
│   ├── Router.php
│   ├── Database.php
├── public/
│   ├── index.php
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── script.js
├── config/
│   └── config.php
├── docker-compose.yml
├── init-db/
│   └── init.sql
```

## Hỗ trợ

Nếu có bất kỳ câu hỏi hoặc vấn đề nào liên quan đến việc cấu hình và chạy ứng dụng, vui lòng liên hệ với Toàn qua email phanqu6ctoan@gmail.com để được hỗ trợ thêm.