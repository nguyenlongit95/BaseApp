Cách cài đặt App
- Coppy thư mục dự án vào thư mục htdocs
- Chạy lệnh: php artisan migrate
- Chạy lệnh: php artisan db:seed
- Nếu trên nền Linux hoặc MACOS thì chạy lệnh sau: chmod -R 777 storage đẻ cấp quyền truy cập cho thư mục storage

Cấu trúc CSDL cơ bản của hệ thống:
- CategoriesBlog
- CategoriesProduct
- Products
- Blogs
- Articles
- Comments
- ImageProducts
- CustomProperties
- Contacts
- Linked
- Ratting
- Slider
- User
- Orders
- OrderDetails
- InfoOfPage
- StateOrder
- TokenAPI

Cấu trục hệ thống cơ bản
- Cấu trúc cơ bản của hệ thống sử dụng Repositories Pattern để xây dựng CURD cho các chức năng cơ bản.
- Việc truy vấn dữ liệu sẽ được viết chủ yếu trong Model, controller chỉ xử lý Bussiness và logic.
- View chỉ xuất dữ liệu và xử lý logic nghiệp vụ đơn giản.

Về phía quản trị
- Hệ thống được viết với model và tối ưu lệnh truy vấn cho tất cả các DBMS
- Hệ thống chia ra làm 3 luồng cho việc quản lý
- Hệ thống 1 dành cho Sản phẩm: CategoriesProduct - Product - ImageProduct - Ratting - CustomProperties - Order - OrderDetails - StateOrders
- Hệ thống 2 dành cho Blog: CategoriesBlog - Blogs- Comments
- Hệ thống 3 dánh cho Article
- Ngoài ra các thành phần khác như Info, TokenAPI, Slider, Users là 1 hệ thống riêng.
- Các hệ thống chính sẽ nằm trong phần System Elements của sidebar
- Các hệ thống phụ sẽ nằm ở phần Orther Elelemts
