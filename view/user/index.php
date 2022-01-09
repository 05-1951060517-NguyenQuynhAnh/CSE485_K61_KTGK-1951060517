<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Danh sách Nhân viên</title>
</head>
<body>
    <main>
    <h5 class="text-center text-primary mt-5" >Danh sách Nhân viên</h5>
    
    <div>
        <a href="index.php?controller=user&action=add" class="btn btn-primary ms-5">Thêm</a>
    </div>
    <?php
    include_once  'view/commons/message.php';
    ?>
    <table class="table ms-5">
        <thead>
        <tr>
                    <th scope="col">Mã nhân viên</th>
                    <th scope="col">Họ và tiên</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col">Phòng ban</th>
                    <th scope="col">Lương</th>
                    <th scope="col">Ngày làm việc</th>
                    <th scope="col">Thay đổi</th>
                    </tr>
                </thead>
    <?php
        foreach($users as $user){
            ?>
                <tbody>
                <tr>
                <th scope="row"><?php echo $user['maNV']; ?></th>
                    <td><?php echo $user['hovaten']; ?></td>
                    <td><?php echo $user['chucvu']; ?></td>
                    <td><?php echo $user['phongban']; ?></td>
                    <td><?php echo $user['luong']; ?></td>
                    <td><?php echo $user['ngayvaolam']; ?></td>
                    <td>
                    <?php
                    //khai báo 3 url xem, sửa, xóa
                    $urlDetail =
                        "index.php?controller=user&action=detail&id=" . $user['maNV'];
                    $urlEdit =
                        "index.php?controller=user&action=edit&id=" . $user['maNV'];
                    $urlDelete =
                        "index.php?controller=user&action=delete&id=" . $user['maNV'];
                    ?>
                    <a href="<?php echo $urlDetail?>">Chi tiết</a> &nbsp;
                    <a href="<?php echo $urlEdit?>"><i class="bi bi-pencil-square"></i></a> &nbsp;
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa?')"
                       href="<?php echo $urlDelete?>">
                       <i class="bi bi-trash"></i>
                    </a>
                </td>
                    
                </tr>
                </tbody>
    <?php
           
        }
    ?>
     </table>
    </main>
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>
</html>