<?php
   if(isset($_GET['search'])){
      $search = $_GET['search'];
   }
   $conn = mysqli_connect("localhost", "root", "", "news");
?>
<html>
 <head>
 <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Webnews</title>
        <link rel = "preconnect" href = "https://fonts.googleapis.com">
        <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="./assets/css/style.css"
        <link href = "https: //fonts.googleapis.com/css2? family = Roboto: wght @ 300; 400; 500; 700 & display = swap "rel =" stylesheet "> 
        <link rel="stylesheet" href="base.css">
        <link rel="stylesheet" href="main.css">
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
                <div class="new_caterlory-block">
                                <p class="new_caterlory-block-header">
                                    KẾT QUẢ TÌM KIẾM 
                                </p>
                                <?php
                                if(isset($_GET['trang'])){
                                   $trang=$_GET['trang'];
                                   echo $trang;
                                }
                                else{
                                   $trang=1;
                                }
                                $soTin = 8;
                                $batdau=($trang - 1) * $soTin ;
                                
                                    $sql = "SELECT * FROM news  WHERE newsTitle REGEXP '$search' LIMIT $batdau,$soTin";
                                    $search1= mysqli_query($conn,$sql);
                                 while($row = mysqli_fetch_array($search1)){

                                ?>
                                <div class="news_main-side-list">
                                    <a href="html-003.php?p=<?php echo $row['id'] ?>" class="main_side-list-link">
                                        <div class="side_list-items">
                                            <div class="list_items-img img-container">
                                                <img src="assets/image/news image/<?php echo $row['newsImage']; ?>" alt="">
                                            </div>
                                            <p class="list_items-text"><?php echo $row['newsTitle'] ?></p>
                                        </div>
                                    </a>   
                                </div>
                                <?php }?>
                                <style>
                                   #phantrang {text-align : center}
                                   #phantrang a:hover{background-color:#09F}
                                   #phantrang a {background-color: var(--primary-color);color:var(--text-color);padding: 10px;margin-right:20px; text-decoration: none;}
                                </style>
                                <div id="phantrang">
                                <?php
                                $sql = "SELECT * FROM news  WHERE newsTitle REGEXP '$search'";
                                $search1= mysqli_query($conn,$sql);
                                $soTin1 = mysqli_num_rows($search1);
                              $soTrang = ceil($soTin1/$soTin);
                              for($i=1 ; $i<= $soTrang ;$i++){
                                 ?>
                                 <a <?php if($i==$trang){ echo "style='background-color:green'";}?> href="search.php?search=<?php echo $search ?>&trang=<?php echo $i ?>"> <?php echo $i ?></a>
                                 <?php
                              }
               
                                ?>
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
</html>
