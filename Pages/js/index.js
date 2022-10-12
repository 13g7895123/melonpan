$('.cart').click(function () {

    $('.side_bar').css('right', '0');
    $('.mask').css('display', 'block');
});

$('.side_x').click(function () {

    $('.side_bar').css('right', '-300px');
    $('.mask').css('display', 'none');
});

$('.dialog_x').click(function () {

    $('.dialog_block').css('display', 'none');
    $('.mask').css('display', 'none');
});

$('.mask').click(function () {

    $('.side_bar').css('right', '-300px');
    $('.dialog_block').css('display', 'none');
    $('.mask').css('display', 'none');
});

// 加入購物車按鈕
$('.add_cart').each(function () {
    $(this).click(function () {

        // var w = $(window).width();
        // var h = $(window).height();
        // console.log((w - 800) / 2);
        // console.log((h - 768) / 2);
        // $('.dialog_block').css('left', '259');
        // $('.dialog_block').css('top', '76');

        $('.dialog_block').css('display', 'flex');
        $('.mask').css('display', 'block');

        // 透過節點找到名稱 & 價格
        var name = $(this).parent().parent().find('.bakery_name').text();
        var price = $(this).parent().parent().find('.bakery_price').text();
        $('.dialog_title').html(name);
        $('.price').html('NT' + price);

        // 數量加減
        var number = parseInt($('.number').text());
        if (number > 0) {
            $('.minus').click(function () {
                if (number > 1) {
                    number -= 1;
                    $('.number').html(number);
                }
            });
        } else {
            $('.minus').attr('disabled', 'disabled');
        }
        $('.plus').click(function () {
            number += parseInt(1);
            $('.number').html(number);
        });
    });
});