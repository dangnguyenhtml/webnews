<?php
$conn = mysqli_connect("localhost", "root", "", "news");
if($_GET['p']){
    $Genre=$_GET['p'];
}
?>
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
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="base.css">
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
        <!-- stikcy header end -->
        <!-- content start -->
        <div class="content">
            
            <div class="main-content">
               <?php
               $sql = "SELECT * FROM news WHERE genre = '$Genre' ORDER BY id DESC ";
               $GenrePage = mysqli_query($conn,$sql);
               while($row_Genre = mysqli_fetch_array($GenrePage)){
               
               ?>
                
                <div class="content-element width-33 margin-bottom-12 mobile-style">
                    <div class="content-about content-about-mobile">
                        <div class="content-about-image img-height-180">
                            <img src="./assets/image/news image/<?php echo $row_Genre['newsImage'] ?>" alt="" class="content-image">
                        </div>
                    </div>
                    <div class="content-des">
                        <a href="html-003.php?p=<?php echo $row_Genre['id'] ?>" class="link">
                        <p class="content-header-text margin-bottom-12">
                       <?php echo $row_Genre['newsTitle'] ?>
                        </p>
                        </a>
                       
                        <div class="content-des-bot">
                            <div class="editorial-office">
                                <img src="./assets/image/editorial office/tintuc.png" alt="" class="editorial-office-logo">
                            </div>
                          
                        </div>
                    </div>
                </div>
                <?php } ?>
               
            </div>
        </div>
        <!-- content end -->
        <div class="show-more-btn-container">
            <div class="show-more-content-btn">
                <p>XEM THÊM</p>
                <i class="fas fa-chevron-right arr-right-icon"></i>
            </div>
        </div>
        <!-- footer search start -->
        <div class="footer-search">
            <div class="header_nav_nameWeb">
                <a href="index.php" class="header_nav_nameWeblink color"> NEWS EVEYDAY</a>
                <p class="header_nav_nameWebtext">Thông tin mỗi ngày</p>
             </div>
            <form action="" method="" class="search-box">
                <input type="text" class="search-box-input" placeholder="Nhập nội dung tìm kiếm">
                <div class="search-btn">
                    <i class="fas fa-search search-icon"></i>
                </div>
            </form>
        </div>
        <!-- footer search end -->
        <!-- main footer start -->
        <footer>
            <<div class="footer">
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

            
        </footer>
        <!-- main footer end -->
    </div>
</body>

</html>