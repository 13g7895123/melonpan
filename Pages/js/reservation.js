// 商品HTML模板
var html_template =
    "<div class='block' id='block{{count}}'> " +
    "<div class='bakery_img'>" +
    "<img src='./assets/img/bakery1_255.png' alt='PRODUCT'>" +
    "<div class='add_cart'>" +
    "<i class='fa-solid fa-cart-shopping'></i>" +
    "<div>加入購物車</div>" +
    "</div>" +
    "</div>" +
    "<div class='bakery_inf'>" +
    "<div class='bakery_name'>{{product_name}}</div>" +
    "<div class='bakery_price'>${{product_price}}</div>" +
    "</div>" +
    "</div>";

// 取得資料
var product_list = get_data('product_list');
// console.log(product_list);

// 顯示資料
for (i = 0; i < product_list.length; i++) {
    var chtml = html_template
        .replace('{{count}}', i)
        .replace('{{product_name}}', product_list[i].name)
        .replace('{{product_price}}', product_list[i].cost);
    $('.reservation').append(chtml);
}

function get_data(action) {

    var res;
    $.ajax({
        type: "POST",
        url: ajax_url + '?action=' + action,
        dataType: "JSON",
        async: false,
        success: function (data) {
            if (data.success) {
                res = data.data;
            } else {
                alert(data.msg);
            }
        }, error: function () {
            alert("獲取資料失敗", "error");
        }
    });

    return res;
}