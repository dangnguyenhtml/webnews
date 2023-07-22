<?php 
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "news");
    
    
?>
<!DOCTYPE html>
<HTML lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Bao moi</title>
        <link rel = "preconnect" href = "https://fonts.googleapis.com">
        <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
        <!-- <link href = "https: //fonts.googleapis.com/css2? family = Roboto: wght @ 300; 400; 500; 700 & display = swap "rel =" stylesheet "> -->
        <link rel="stylesheet" href="base.css">
        <link rel="stylesheet" href="main.css">
        
        <link rel="stylesheet" href="./assets/css/style.css">
        <link rel="stylesheet" href="font/fontawesome-free-5.15.3-web/css/all.min.css">
    </head>
    <body>
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
        <body>
            <div class="grid">
                <div class="body_page">
                    <div class="body_news-main">
                       <?php
                        
                            $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 0,1 ";
                            mysqli_query($conn,$sql);
                    
                        $TinMoiNhat1 =  mysqli_query($conn,$sql);
                        $row_TinMoiNhat_1 = mysqli_fetch_array($TinMoiNhat1);
                        ?>
                        <a href="html-003.php?p=<?php echo $row_TinMoiNhat_1['id'] ?>" class="news_main-img">
                            <div class="main_img img-container">
                                <img src="assets/image/news image/<?php echo $row_TinMoiNhat_1['newsImage']; ?>" alt="">
                            </div>
                            <p class="news_main-img-text"><?php echo $row_TinMoiNhat_1['newsTitle']; ?></p>
                        </a>
                        <div class="news_main-side">
                            <?php
                                $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 1,3 ";
                                
                        
                            $TinMoiNhat3 =  mysqli_query($conn,$sql);
                            while ($row_TinMoiNhat_3 = mysqli_fetch_array($TinMoiNhat3)){
                            ?>
                            
                                <div class="news_side">
                                    <div class="news_side-img img-container">
                                    <img src="assets/image/news image/<?php echo $row_TinMoiNhat_3['newsImage'];?>" alt="">
                                    </div>
                                    <a href="html-003.php?p=<?php echo $row_TinMoiNhat_3['id'] ?>" class="news_side-link">
                                    <p class="news_side-text"><?php echo $row_TinMoiNhat_3['newsTitle']; ?></p>
                                    </a>
                                </div> 
                             
                            
                            <?php } ?>
                        </div>
                        <div class="new_caterlory">
                            <div class="new_caterlory-block">
                                <p class="new_caterlory-block-header">
                                    TIN XÃ HÔI
                                </p>
                                <div class="news_main-side-list">
                                    <?php
                                        $NewsGenre='XH';
                                       $sql = "SELECT * FROM news WHERE genre = '$NewsGenre' ORDER BY id DESC LIMIT 0,3 ";
                                      
                                       $TinXaHoi =  mysqli_query($conn,$sql); 
                                       while($row_TinXaHoi = mysqli_fetch_array($TinXaHoi)){
                                    ?>
                                    <a href="html-003.php?p=<?php echo $row_TinXaHoi['id'] ?>" class="main_side-list-link">
                                        <div class="side_list-items">
                                            <div class="list_items-img img-container">
                                                <img src="assets/image/news image/<?php echo $row_TinXaHoi['newsImage'];?>" alt="">
                                            </div>
                                            <p class="list_items-text"><?php echo $row_TinXaHoi['newsTitle'];?></p>
                                        </div>
                                    </a>
                                    <?php 
                                    }
                                    ?>
                                    
                                </div>
                                <a href="index1.php?p=<?php echo $NewsGenre ?>" class="new_caterlory-link">Xem Thêm</a>
                                
                            </div>
                            <div class="new_caterlory-block">
                                <p class="new_caterlory-block-header">
                                    TIN THỂ THAO
                                </p>
                                <div class="news_main-side-list">
                                    <?php
                                    $NewsGenre='TT';
                                    $sql = "SELECT * FROM news WHERE genre = '$NewsGenre' ORDER BY id DESC LIMIT 0,3 ";
                                   
                                    $TinTheThao =  mysqli_query($conn,$sql); 
                                    while($row_TinTheThao = mysqli_fetch_array($TinTheThao)){
                                    ?>
                                    <a href="html-003.php?p=<?php echo $row_TinTheThao['id'] ?>" class="main_side-list-link">
                                        <div class="side_list-items">
                                            <div class="list_items-img img-container">
                                                <img src="assets/image/news image/<?php echo $row_TinTheThao['newsImage'];?>" alt="">
                                            </div>
                                            <p class="list_items-text"><?php echo $row_TinTheThao['newsTitle'];?></p>
                                        </div>
                                    </a>
                                    <?php } ?>
                                    
                                    
                                </div>
                                <a href="index1.php?p=<?php echo $NewsGenre ?>" class="new_caterlory-link">Xem Thêm</a>
                                
                            </div> <div class="new_caterlory-block">
                                <p class="new_caterlory-block-header">
                                    TIN KINH TẾ
                                </p>
                                <div class="news_main-side-list">
                                    <?php
                                    $NewsGenre='KT';
                                    $sql = "SELECT * FROM news WHERE genre = '$NewsGenre' ORDER BY id DESC LIMIT 0,3 ";
                                   
                                    $TinKinhTe =  mysqli_query($conn,$sql); 
                                    while($row_TinKinhTe = mysqli_fetch_array($TinKinhTe)){
                                    ?>

                                    <a href="html-003.php?p=<?php echo $row_TinKinhTe['id'] ?>" class="main_side-list-link">
                                        <div class="side_list-items">
                                            <div class="list_items-img img-container">
                                                <img src="assets/image/news image/<?php echo $row_TinKinhTe['newsImage'];?>" alt="">
                                            </div>
                                            <p class="list_items-text"><?php echo $row_TinKinhTe['newsTitle'];?></p>
                                        </div>
                                    </a>
                                    <?php } ?>
                                </div>
                                <a href="index1.php?p=<?php echo $NewsGenre ?>" class="new_caterlory-link">Xem Thêm</a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="new_right">
                        <div class="new_right-list">
                            <?php
                             $sql = "SELECT * FROM news ORDER BY view DESC LIMIT 0,7 ";
                             $hotNews = mysqli_query($conn,$sql); 
                             while($row_hotNews = mysqli_fetch_array($hotNews)){
                            ?>
                            <a href="html-003.php?p=<?php echo $row_hotNews['id'] ?>" class="new_right-items-link">
                                <div class="new_right-items">
                                    <div class="new_right-items-img img-container">
                                        <img src="assets/image/news image/<?php echo $row_hotNews['newsImage'];?>" alt="">
                                    </div>
                                    <p class="new_right-items-text">
                                    <?php echo $row_hotNews['newsTitle'];?>
                                    </p>
                                </div>
                            </a>
                            <?php } ?>
                        </div>
                                
                        <?php 
                            $sql = "SELECT * FROM ads ORDER BY id LIMIT 0,1 ";
                            $ads = mysqli_query($conn,$sql); 
                            $rowADS = mysqli_fetch_array($ads);
                            
                        ?>
                        <div class="new-right_spam">
                            <a href="<?php echo $rowADS['advertisingTenants']; ?>"><img src="assets/image/QC/<?php echo $rowADS['adsBanner']; ?>" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <div class="footer-search">
            <div class="header_nav_nameWeb">
                <a href="index.php" class="header_nav_nameWeblink color"> NEWS EVEYDAY</a>
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
        </div>
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
    </body>
