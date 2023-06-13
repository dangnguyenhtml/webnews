<?php
if (isset($_GET['p'])){
	$id=$_GET['p'];
	$conn = mysqli_connect("localhost", "root", "", "news");
	$sql = "SELECT * FROM news WHERE id = '$id' ";
	$News=mysqli_query($conn,$sql);
	$row_News=mysqli_fetch_array($News);
    $genre = $row_News['genre'];
    $sqlup = "UPDATE news SET view = view + 1 WHERE id = '$id' ";
    mysqli_query($conn,$sqlup);
}
?>
<html>
<head>

<meta charset="utf-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Bài tập lớn nhóm 15</title>
<link rel = "preconnect" href = "https://fonts.googleapis.com">
<link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="CSS-003.css">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="base.css">
<link rel="stylesheet" href="./assets/css/style.css">
<link rel="stylesheet" href="font/fontawesome-free-5.15.3-web/css/all.min.css">

</head>


<body class="home_seven">

<!-- <div class="se-pre-con"></div> -->
<!--  <img src=""> -->
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
<div class="grid grid_text">



<div class="collapse navbar-collapse" id="navbar-menu">

<ul class="nav navbar-nav navbar-left" data-in="" data-out="">
	
	<main class="page_main_wrapper">
		<div class="mt-20">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
							</div>
					<div class="col-xs-12">
						<h1 class="mt-0" style="font-size : 35px;" ><?php echo $row_News['newsTitle'];?></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row row-m">
				<div class="col-sm-8 col-p main-content">
					<div class="">

						<div class="post_details_inner">
							<div class="details_block2">
								
					            <div style="display: block">
									<div class="zalo-share-button pull-left" data-href="https://sao.baophapluat.vn/tin-tuc/chi-tiet/32992/" data-oaid="3309444029871377181" data-layout="1" data-color="blue" data-customize="false"></div>
								
								</div>
								<br>
								<div class="clearfix"></div>
								<br>
                                								<div class="fix_content">
                                    



	<style>
		#img{
			width: 980px;
			height:auto;
			background-size: contain ;
		}
	</style>
		<tr>
			<td><img id="img" alt="" class="img-responsive center-block" src="assets/image/news image/<?php echo $row_News['newsImage'];?>" ></td>
		</tr>
		
	

<style>
	#textContent {
		font-size : 20px;
		line-height: 1.3;
	}
 </style>
<p style="text-align:center;" id="textcontent" ><?php echo $row_News['textContent'];?></p>









<!-- !Bài liên quan ---------- ---------- ---------- ---------- ---------- ---------- ---------- ---------- ---------- ---------- -->
											
<!-- /Bài liên quan ---------- ---------- ---------- ---------- ---------- ---------- ---------- ---------- ---------- ---------- -->





		

</div>
</div> <div style="margin_top : 15px" class="new_caterlory-block">
                                <p class="new_caterlory-block-header">
                                    TIN LIÊN QUAN
                                </p>
                                <?php
                                $sql = "SELECT * FROM news WHERE id <> '$id' AND genre = '$genre' ORDER BY RAND() LIMIT 0,3 ";
                                $TinMoiNhat3 =  mysqli_query($conn,$sql);
                                while ($row_TinMoiNhat_3 = mysqli_fetch_array($TinMoiNhat3)){
                                ?>
                                <div class="news_main-side-list">
                                    <a href="html-003.php?p=<?php echo $row_TinMoiNhat_3['id'] ?>" class="main_side-list-link">
                                        <div class="side_list-items">
                                            <div class="list_items-img img-container">
                                            <img src="assets/image/news image/<?php echo $row_TinMoiNhat_3['newsImage'];?>" alt="">
                                            </div>
                                            <p class="list_items-text"><?php echo $row_TinMoiNhat_3['newsTitle'];?></p>
                                        </div>
                                    </a>
                                 <?php }?>
                                
                                    
                                </div>
                                
                                
                            </div>



</body>

</html>

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