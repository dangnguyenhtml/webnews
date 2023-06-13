<!-- <?php
// session_start();
// if (!isset($_SESSION['userID'])) {
//     header('location: http://localhost/BTL%20DUY/login.php');
// }
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo mới</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/insert.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/update.css">
</head>

<body>
    
    <div class="wrapper">
        <!-- header top start -->
        <header>
            <div class="header_nav">
                <div class="header_nav_nameWeb">
                   <a href="index.php" class="header_nav_nameWeblink"> NEWS EVEYDAY</a>
                   <p class="header_nav_nameWebtext">Thông tin mỗi ngày</p>
                </div>
                <form action="search.php" method="GET" >
               <div class="header__nav-search">
                   
                   <input class="header__nav-search-input" type="text" placeholder="Nhập nội dung tìm kiếm" name = "search">
                            <div class="header__nav-search-icon">
                               <input class= "input" type="submit" value = 'tìm kiếm' name = "btnSearch">
                            </div>
                            </div>
                   </form>
                 
                         
                
                <a href="login.php" class="header_nav-user">
                    <i class="fas fa-user"></i>
                </a>
                </div>
                <div class="header_list-backgound">
                    <div class="header_nav-list">
                        <div class="list_news">
                            <div class="header_list-items">
                            
                                </div>
                            </div>
        
                        </div>
                        
                </div>
            
            </div>
        </header>
        <!-- header top end -->
        <!-- sticky header start -->
        <div class="sticky-header">
            <div class="main-nav">
                <a href="index.php" class="main-nav-element">TIN TỨC</a>
                <a href="insert.php" class="main-nav-element">THÊM BÀI VIẾT</a>
                <a href="update.php" class="main-nav-element">SỬA BÀI VIẾT</a>
                <a href="delete.php" class="main-nav-element">XÓA BÀI VIẾT</a>
                <a href="login.php" class="main-nav-element">ĐĂNG NHẬP</a>
            </div>
            
        </div>
        <!-- stikcy header end -->
        <!-- content start -->
        <div class="content">
             <?php
            $conn = mysqli_connect("localhost", "root", "", "news");
            if ($conn->connect_error) {
                die("Connection failed:" . $conn->connect_error);
            } else {
                $sql = "SELECT * FROM news";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<form action='' method='POST'>
                        <table>
                            <tr style = 'background-color: #5499c8; color: #fff'>
                                <th>Tiêu đề</th>
                                <th>Ảnh báo</th>
                                <th>Ảnh tòa soạn</th>
                                <th>Chọn</th>
                            </tr>";
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr style = 'background-color: green; color: #fff'>
                            <td><?php echo $row['newsTitle']?></td>
                            <td><img style='width: 100px; height: auto;' src='assets/image/news image/<?php echo $row['newsImage'] ?>' alt=''></td>
                            <td><img style='width: 100px; height: auto;' src='assets/image/news image/<?php echo $row['officeImage']?>' alt=''></td>
                            <td><input type='checkbox' name='select' value='<?php echo $row['id'] ?>'></td>
                            
                            
                            </tr>
                            
                    <?php }
                    echo "</table>
                            <input type='submit' value='Chọn' name='updateSubmit'>
                            </form>";
                } else {
                    echo "Không có dữ liệu để hiển thị";
                }
              
                if(isset($_POST['updateSubmit']) && isset($_POST['select'])){
                    $selectNewsID = $_POST['select'];
                    $sql = "SELECT * FROM news WHERE id = '$selectNewsID'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $oldTitle = $row['newsTitle'];
                    $oldGenre = $row['genre'];
                    $oldNewsImage = $row['newsImage'];
                    $oldNewsOfficeImage = $row['officeImage'];
                    $oldTextContent = $row['textContent'];
                    echo "<form action='' method='POST' class='insert-news' enctype='multipart/form-data'>
                    <p class='insert-des'>Chọn ảnh tiêu đề bài viết</p>
                    <input type='hidden' value='{$oldNewsImage}' name='oldNewsImage'>
                    <input type='hidden' value='{$oldNewsOfficeImage}' name='oldNewsOfficeimage'>
                    <input type='hidden' value='{$selectNewsID}' name='selectedID'>
                    <input class='cusor-pointer' type='file' name='newsImage' id='newsImage' accept='image/gif, image/jpeg, image/png'>
                    <p class='insert-des'>Chọn ảnh báo đăng</p>
                    <input class='cusor-pointer' type='file' name='newsOfficeImage' id='newsOfficeImage' accept='image/gif, image/jpeg, image/png'>
                    <p class='insert-des'>Tiêu đề bài viết</p>
                    <input type='text' name='newsTitle' id='' class='input-des-insert' value='{$oldTitle}'>
                    <p class='insert-des'>Thể loại</p>
                    <input type='text' name='newsGenre' id='' class='input-des-insert' value='{$oldGenre}'>
                    <p class='insert-des'>Nội dung</p>
                    <textarea id='' name='newsTextContent' rows='10' cols='100' style='padding: 0 8px; outline: none;'>{$oldTextContent}</textarea></br>
                    <input type='submit' value='Cập nhật' name='updateNewsBtn' class='insertSubmitBtn'>
                    </form>";
                }

                if(isset($_POST['updateNewsBtn'])){
                    $newsSelected = $_POST['selectedID'];
                    $newTitle = $_POST['newsTitle'];
                    $newNewsImage;
                    $defaultNewsImage = $_POST['oldNewsImage'];
                    if($_FILES['newsImage']['name'] == ""){
                        $newNewsImage = $defaultNewsImage;
                    } else {
                        $dirNewsImage = "assets/image/news image/";
                        $newNewsImage = $dirNewsImage . basename($_FILES['newsImage']['name']);
                        move_uploaded_file($_FILES['newsImage']['tmp_name'], $newNewsImage);
                        $a =  basename($_FILES['newsImage']['name']);
                    }
                    $newNewsOfficeImage;
                    $defaultNewsOfficeImage = $_POST['oldNewsOfficeimage'];
                    if($_FILES['newsOfficeImage']['name'] == ""){
                        $newNewsOfficeImage = $defaultNewsOfficeImage;
                    } else {
                        $dirOfficeImage = "assets/image/editorial office/";
                        $newNewsOfficeImage = $dirOfficeImage . basename($_FILES['newsOfficeImage']['name']);
                        move_uploaded_file($_FILES['newsOfficeImage']['tmp_name'], $newNewsOfficeImage);
                        $b = basename($_FILES['newsOfficeImage']['name']);
                    }
                    $newGenre = $_POST['newsGenre'];
                    $newTextContent = $_POST['newsTextContent'];
                    $sqlUpdate = "UPDATE news SET newsImage='$a',newsTitle='$newTitle',textContent='$newTextContent',officeImage='$b',genre='$newGenre' WHERE id = '{$newsSelected}'";
                    $resultUpdate = $conn->query($sqlUpdate);
                    if($resultUpdate==true){
                        echo "<script>alert('Cập nhật thành công.')</script>";
                    } else {
                        echo "<script>alert('Cập nhật thất bại, có lỗi xảy ra.')</script>";
                    }
                  
                }
            }
            $conn->close();
            ?>
        </div>
        <!-- footer search start -->
       
        <!-- footer search end -->
        <!-- main footer start -->
        <div class="footer">
            <div class="footer-top">
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">Bắc Giang</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">ITO</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">Tuyển Nhật Bản</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">Hà Nội</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">Bộ Giáo Dục Và Đào Tạo</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">Mỹ</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">Chủ Tịch Quốc Hội</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">F1</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">Bộ Giáo Dục Và Đào Tạo</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">Mỹ</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">Chủ Tịch Quốc Hội</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">F1</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">Bộ Giáo Dục Và Đào Tạo</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">Mỹ</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">Chủ Tịch Quốc Hội</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
                <span class="footer-top-element">
                    <a href="#" class="footer-top-content">F1</a>
                    <i class="fas fa-circle dot-icon"></i>
                </span>
            </div>
            <div class="footer-bottom">
                <div class="contact footer-bottom-element">
                    <p class="footer-heading">
                        LIÊN HỆ
                    </p>
                    <a href="#" class="footer-element-detail">Giới thiệu</a>
                    <a href="#" class="footer-element-detail">Điều khoản sử dụng</a>
                    <a href="#" class="footer-element-detail">Quảng cáo</a>
                </div>
                <div class="other footer-bottom-element">
                    <p class="footer-heading">
                        KHÁC
                    </p>
                    <a href="#" class="footer-element-detail">Tổng hợp</a>
                </div>
                <div class="about">
                    <p class="lisense">
                        Giấy phép số 1818/GP-TTĐT do Sở Thông tin và Truyền thông Hà Nội cấp ngày 05/05/2017
                    </p>
                    <p class="owner">
                        Đơn vị chủ quản: Công ty Cổ phần Công nghệ EPI * Chịu trách nhiệm: Võ Quang
                    </p>
                    <p class="address">
                        Địa chỉ: Tầng 5, Tòa nhà Báo Sinh Viên VN, D29 Phạm Văn Bạch, Yên Hòa, Cầu Giấy, Hà Nội
                    </p>
                    <p class="tel">
                        Tel: (024) 3-212-3232, số máy lẻ 6666. contact.baomoi@epi.com.vn
                    </p>
                </div>
            </div>
        </div>
        <!-- main footer end -->
    </div>
</body>

</html>