<?php
    include_once(__DIR__ . './__Class/ClassLoad.php');

    $NOW_Page = 'main';

    // if (BaseWork::_get('PageName') != "" && file_exists(BaseWork::_get('PageName') . '.php')) {
    //     $NOW_Page = BaseWork::_get('PageName'); //帶入目前PageName
    // }
?>

<!DOCTYPE html>
<html lang="zh-tw" >
<head>
    <meta charset="UTF-8">
    <title>美濃麵包</title>

    <!-- 引入JQuery -->
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    
    <!-- 引入Bootstrap的CSS -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/css/bootstrap.min.css">

    <!-- 引入font-awesome的CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <!-- 引入Bootstrap的js -->
    <script src="https://cdn.staticfile.org/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>

    <!-- 引入Vue.js -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js'></script>

</head>
<body>

    <link rel="stylesheet" type="text/css" href="./assets/css/index.css">

    <div class='nav_bar'>
        <div class='nav_bar_main'>
            <div class='nav_left'>
                <a href="?PageName=main"><img src="./assets/img/logo_100.png" alt="company logo"></a>
            </div>
            <div class='nav_mid'></div>
            <div class='nav_right'>
                <div class='group user'>
                    <i class="fa-solid fa-user"></i>
                    <!-- <div>會員資訊</div> -->
                </div>
                <div class='group cart'>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <!-- <div>購物車</div> -->
                </div>            
                <div class='group contact'>
                    <i class="fa-solid fa-comment"></i>
                    <!-- <div>聯繫我們</div> -->
                </div>     
                <div class='group tools'>
                    <a href="?PageName=tools_cost_cal"><i class="fa-solid fa-screwdriver-wrench"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class='content'>
        <?php
            include('./Pages/' . $NOW_Page . '.php');
        ?>        
    </div>
    <div class='foot_bar'></div>    
</body>
<script>
    $(document).ready(function() {
        <?php
            include(__DIR__ . '/Pages/js/' . $NOW_Page . '.js');
            // include(__DIR__ . '/Pages/js/index.js');
        ?>
    })
</script>

