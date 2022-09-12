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
                <img src="./assets/img/logo_100.png" alt="company logo">
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
            </div>
        </div>
    </div>
    <div class='content'>
        <div class='block'>
            <div class='bakery_img'>
                <img src="./assets/img/bakery1_255.png" alt="company logo">
                <div class='add_cart'>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div>加入購物車</div>
                </div>
            </div>
            <div class='bakery_name'>美濃麵包</div>
            <div class='bakery_price'>$35</div>
        </div>
        <div class='block'>
            <div class='bakery_img'>
                <img src="./assets/img/bakery2_255.png" alt="company logo">
                <div class='add_cart'>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div>加入購物車</div>
                </div>
            </div>
            <div class='bakery_name'>紅豆麵包</div>
            <div class='bakery_price'>$30</div>
        </div>
        <div class='block'>
            <div class='bakery_img'>
                <img src="./assets/img/bakery3_255.png" alt="company logo">
                <div class='add_cart'>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div>加入購物車</div>
                </div>
            </div>
            <div class='bakery_name'>蔥花麵包</div>
            <div class='bakery_price'>$45</div>
        </div>
        <div class='block'>
            <div class='bakery_img'>
                <img src="./assets/img/bakery1_255.png" alt="company logo">
                <div class='add_cart'>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div>加入購物車</div>
                </div>
            </div>
            <div class='bakery_name'>香酥菠蘿麵包</div>
            <div class='bakery_price'>$35</div>
        </div>
        <div class='block'>
            <div class='bakery_img'>
                <img src="./assets/img/bakery1_255.png" alt="company logo">
                <div class='add_cart'>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div>加入購物車</div>
                </div>
            </div>
            <div class='bakery_name'>海鹽羅宋</div>
            <div class='bakery_price'>$35</div>
        </div>
        <div class='block'>
            <div class='bakery_img'>
                <img src="./assets/img/bakery1_255.png" alt="company logo">
                <div class='add_cart'>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div>加入購物車</div>
                </div>
            </div>
            <div class='bakery_name'>香檸小吐司</div>
            <div class='bakery_price'>$35</div>
        </div>
        <div class='block'>
            <div class='bakery_img'>
                <img src="./assets/img/bakery1_255.png" alt="company logo">
                <div class='add_cart'>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div>加入購物車</div>
                </div>
            </div>
            <div class='bakery_name'>奶酥菠蘿麵包</div>
            <div class='bakery_price'>$35</div>
        </div>
    </div>
    <div class='foot_bar'></div>

    <!-- 遮罩 -->
    <div class='mask'></div>

    <!-- 側邊購物車列 -->
    <div class='side_bar'>
        <div class='cart_title'>購物車
            <i class="fa-solid fa-xmark side_x"></i>
        </div>
        <hr>
        <div class='cart_content'></div>
    </div>
    <div class='dialog_block'>
        <div class='left'>
            <div class='project_pic'></div>
        </div>
        <div class='right'>
            <h1 class='dialog_title'>TITLE</h1>
            
            <hr>
            <div class='dialog_content'>CONTENT</div>
            <div class='price'>NT$1588</div>
            <div class='count'>
                <div class='minus'>
                    <i class="fa-solid fa-minus"></i>
                </div>                
                <div class='number'>1</div>
                <div class='plus'>
                    <i class="fa-solid fa-plus"></i>
                </div>
            </div>
            <div class='btn'>
                <div class='cart'>加入購物車</div>
                <div class='buy'>立即購買</div>
            </div>
        </div>
        <i class="fa-solid fa-xmark dialog_x"></i>
    </div>
</body>
<script>
    $(document).ready(function() {
        <?php
            // include(__DIR__ . '/Pages/js/' . $NOW_Page . '.js');
            include(__DIR__ . '/Pages/js/index.js');
        ?>
    })
</script>

