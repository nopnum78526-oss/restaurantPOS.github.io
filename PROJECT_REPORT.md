# Restaurant Management System Project Report

## 1. วัตถุประสงค์ (Objectives)
1.  เพื่อพัฒนาระบบบริหารจัดการร้านอาหารที่ครบวงจร (สั่งอาหาร, จัดการเมนู, จัดการโต๊ะ, รายงานผล)
2.  เพื่อศึกษาการพัฒนาเว็บแอปพลิเคชันด้วยภาษา PHP และฐานข้อมูล MySQL
3.  เพื่อเพิ่มประสิทธิภาพในการทำงานของพนักงานและการบริการลูกค้า
4.  เพื่อลดความผิดพลาดในการจดออเดอร์และการคำนวณเงิน

## 2. เครื่องมือที่ใช้ (Tools & Technologies)
*   **Language**: PHP 8.x
*   **Database**: MySQL (MariaDB)
*   **Server**: Apache (via XAMPP)
*   **Frontend**: HTML5, CSS3, Bootstrap 5
*   **Editor**: VS Code

## 3. การออกแบบฐานข้อมูล (Database Design)
### ER-Diagram (Entity Relationship Diagram)
*   **Users**: เก็บข้อมูลผู้ใช้งาน (Admin, Staff, Customer)
*   **Menu**: เก็บรายการอาหาร ราคา รูปภาพ
*   **Tables**: เก็บข้อมูลโต๊ะอาหารและสถานะ
*   **Orders**: เก็บข้อมูลคำสั่งซื้อรวม (Head)
*   **Order_Items**: เก็บรายละเอียดรายการอาหารในแต่ละคำสั่งซื้อ (Line Items)

**Relationships**:
*   Users (1) ---- (N) Orders
*   Tables (1) ---- (N) Orders
*   Orders (1) ---- (N) Order_Items
*   Menu (1) ---- (N) Order_Items

### Database Schema
*   `users`: id, name, email, password, role
*   `menu`: menu_id, name, description, price, image, status
*   `tables`: table_id, table_name, status
*   `orders`: order_id, user_id, table_id, total_price, status, order_time
*   `order_items`: id, order_id, menu_id, qty, price

## 4. แผนภาพการทำงาน (Diagrams)

### Use Case Diagram
*   **Admin**: Login, Manage Menu, Manage Tables, View Dashboard, Manage Users.
*   **Staff**: Login, View Orders, Update Order Status (Cooking/Served), Clear Tables.
*   **Customer**: Register, Login, View Menu, Add to Cart, Select Table, Place Order, View Order History.

### Workflow Diagram (Order Process)
1.  **Customer** Login -> View Menu -> Add Items to Cart.
2.  **Customer** Go to Cart -> Select Table -> Confirm Order.
3.  **System** creates Order (Status: Pending) -> Updates Table Status (Occupied).
4.  **Staff** sees Order on Dashboard -> Changes Status to "Cooking" -> "Served".
5.  **Staff** changes Status to "Completed" (Payment received) -> Table Status becomes "Available".

## 5. สรุปผลการทำงานของแต่ละระบบ (System Summary)

### 5.1 ระบบสมาชิก (Authentication)
*   รองรับการสมัครสมาชิก (Register) และเข้าสู่ระบบ (Login)
*   มีการแบ่งระดับผู้ใช้งาน (Role-based): Admin, Staff, Customer
*   มีระบบ Session เพื่อตรวจสอบสิทธิ์การเข้าถึงหน้าต่างๆ

### 5.2 ระบบจัดการเมนู (Menu Management)
*   Admin สามารถเพิ่ม ลบ แก้ไข รายการอาหารได้
*   รองรับการอัปโหลดรูปภาพประกอบเมนู
*   สามารถเปิด/ปิดสถานะเมนูได้ (เช่น ของหมด)

### 5.3 ระบบสั่งอาหาร (Ordering System)
*   ลูกค้าสามารถเลือกเมนูลงตะกร้าสินค้าได้
*   ระบบคำนวณราคารวมอัตโนมัติ
*   ลูกค้าต้องเลือกโต๊ะก่อนยืนยันคำสั่งซื้อ

### 5.4 ระบบจัดการออเดอร์ (Order Management)
*   พนักงาน (Staff) สามารถดูรายการออเดอร์ที่เข้ามาใหม่ได้แบบ Real-time (เมื่อรีเฟรช)
*   มีการแสดงสถานะของแต่ละออเดอร์ชัดเจน (สีต่างๆ)
*   สามารถเปลี่ยนสถานะออเดอร์ได้ตามขั้นตอนการทำงานจริง

### 5.5 ระบบจัดการโต๊ะ (Table Management)
*   Admin สามารถเพิ่มลดจำนวนโต๊ะได้
*   สถานะโต๊ะจะเปลี่ยนอัตโนมัติเมื่อมีการสั่งอาหาร (Available -> Occupied)
*   เมื่อออเดอร์เสร็จสิ้น สถานะโต๊ะจะกลับมาว่าง (Available)

### 5.6 ระบบ Dashboard
*   แสดงยอดขายรายวัน
*   แสดงจำนวนออเดอร์วันนี้
*   แสดง 5 อันดับเมนูขายดี
