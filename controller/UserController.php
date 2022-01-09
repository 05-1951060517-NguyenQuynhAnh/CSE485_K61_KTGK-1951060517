<?php
    require_once 'model/UserModel.php';
    class UserController{
        // Điều khiển về mặt logic giữa UserModel và User View
        function index(){
            // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu
            $userModel = new UserModel();
            $users = $userModel->getAllUsers();
            // Sau khi truy vấn được dữ liệu, tôi sẽ đổ ra UserView/index.php tương ứng
            require_once 'view/user/index.php';
        }

        function detail(){
            // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu
            $userID = $_GET['id'];
            $userModel = new UserModel();
            $users = $userModel->getUser($userID);
            // Sau khi truy vấn được dữ liệu, tôi sẽ đổ ra UserView/index.php tương ứng
            require_once 'view/user/detail.php';
        }
        public function add(){
            $error = '';
            //xử lý submit form
            if (isset($_POST['submit'])) {
                $userName = $_POST['name'];
                //xử lý validate, nếu mà để trống tên sách
    //            thì báo lỗi và không cho submit form
                if (empty($userName)) {
                    $error = "Name không được để trống";
                }
                else {
                    //gọi model để insert dữ liệu vào database
                    $arr_users = new UserModel();
                    //gọi phương thức để insert dữ liệu
                    //nên tạo 1 mảng tạm để lưu thông tin của
    //                đối tượng dựa theo cấu trúc bảng
                    $bookArr = [
                        'name' => $userName
                    ];
                    $isInsert = $arr_users->insert($bookArr);
                    if ($isInsert) {
                        $_SESSION['success'] = "Thêm mới thành công";
                    }
                    else {
                        $_SESSION['error'] = "Thêm mới thất bại";
                    }
                    header("Location: index.php?controller=user&action=index");
                    exit();
                }
            }
            //gọi view
            require_once 'view/user/add.php';
        }

        function edit(){
            // Kiểm tra nếu người dùng nhấn submit
            // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu

            // Nếu ko show ra view UserView/edit.php tương ứng
        }
        function delete(){
                $userID = $_GET['id'];
                if (!is_numeric($userID)) {
                    header("Location: index.php?controller=user&action=index");
                    exit();
                }
        
                $userModel = new UserModel();
                $isDelete = $userModel->delete($userID);
        
                if ($isDelete) {
                    //chuyển hướng về trang liệt kê danh sách
                    //tạo session thông báo mesage
                    $_SESSION['success'] = "Xóa bản ghi #$userID thành công";
                }
                else {
                    //báo lỗi
                    $_SESSION['error'] = "Xóa bản ghi #$userID thất bại";
                }
        
                header("Location: index.php?controller=user&action=index");
                exit();
        }
    }



?>