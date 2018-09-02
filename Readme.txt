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
- View chỉ xuất dữ liệu và xử lý logic đơn giản.
