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

Các chức năng nâng cao
- Chức năng ratting: đánh giá sản phẩm dựa vào số sao của người dùng.
- Chức năng chèn hình ảnh vào bài viết: sử dụng ckeditor và ckfinder để chèn thêm hình ảnh vào ô textarea.
- Chức năng comment.

Quản lý và sử dụng các API của bên thứ 3

Chức năng thống kê:
- Thống kê tổng số(sản phẩm, đơn hàng, liên hệ, người dùng)
- Vẽ biểu đồ thống kê(Biểu đồ đường, biểu đồ tròn, biểu đồ ngang)
- 8 người dùng mới nhất
- Phản hồi mới nhất
- 7 Đơn hàng mới nhất
- Thống kê lưu lượng(Tỷ lệ đơn hàng chuyển thành công, tỷ lệ bình luận có phản hồi, tỷ lệ check phản hồi, tỷ lệ đơn hàng bị hủy) 
