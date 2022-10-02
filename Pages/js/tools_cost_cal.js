// 建立模板
var item_html = "<div class='list'>" +
    "<div class='list_field se_num'>{{se_num}}.</div>" +
    "<div class='list_field name'>{{name}}</div>" +
    "<div class='list_field weight'>{{weight}}</div>" +
    "<div class='list_field mul_sign'>*</div>" +
    "<div class='list_field g_price'>{{g_price}}</div>" +
    "<div class='list_field equal_sign'>=</div>" +
    "<div class='list_field total_price'>{{total_price}}(元)</div>" +
    "<div class='list_field btn_cancel' id='{{del_id}}' data_del_id='{{delid}}'>X</div>" +
    "</div>";

// 載入材料
var material_list = get_data('material_list');
$('#material').empty();
for (i = 0; i < material_list.length; i++) {
    $('#material').append(
        '<option value' + material_list[i].id + '>' + material_list[i].name + '</option>'
    );
}

var item_list = [];

// 新增按鈕
$('.add').click(function () {
    // 取得輸入數值
    material = $('select[id="material"]').val();
    weight = $('input[name="weight"]').val();
    // console.log(material + ': ' + weight + 'g');

    if (material != '' && weight != '') {

        // 取得材料單位價格
        g_price = get_data('material_gprice', material);

        total_price = Math.round((weight * g_price) * 1000) / 1000;

        // 新增BOT項目
        item_list.push({
            name: material,
            weight: weight,
            g_price: g_price,
            total_price: total_price
        });
        // console.log(item_list);
        show_list();

        // 新增後狀態
        $('input[name="weight"]').val('');
        $('#material').focus();
    }
});

//按下Enter鍵等同送出
$('input[name="weight"]').keypress(function (e) {
    code = (e.keyCode ? e.keyCode : e.which);
    if (code === 13) {
        $('.add').click();
        return false;
    }
});

$('.dia_mask').click(function () {
    $('.dia_mask').css('display', 'none');
    $('#dia_pname').css('display', 'none');
});



function get_data(action, param1) {

    var res;
    $.ajax({
        type: "POST",
        url: ajax_url + '?action=' + action,
        data: {
            param1: param1
        },
        dataType: "JSON",
        async: false,
        success: function (data) {
            if (data.success) {
                res = data.data;
            } else {
                alert(data.msg);
            }
        }, error: function () {
            // alertLayer("獲取資料失敗", "error");
        }
    });

    return res;
}

var test_count = 0;

function show_list() {

    $('.bot').html('');

    var total = 0;
    for (i = 0; i < item_list.length; i++) {

        var del_item_id = 'del_item_' + i;

        total = Math.round((total + item_list[i].total_price) * 1000) / 1000;
        // console.log('total: ' + item_list[i].total_price);

        var current_html = item_html
            .replace('{{se_num}}', i + 1)
            .replace('{{name}}', item_list[i].name)
            .replace('{{weight}}', item_list[i].weight)
            .replace('{{g_price}}', item_list[i].g_price)
            .replace('{{total_price}}', item_list[i].total_price)
            .replace('{{del_id}}', del_item_id)
            .replace('{{delid}}', i);

        $('.bot').append(current_html);

        // 刪除按鈕
        $('#' + del_item_id).click(function () {
            remove_item($(this).attr('data_del_id'));
        });
    }

    if (item_list.length > 0) {
        $('.bot').append(
            "<div class='last_row'>" +
            "<div class='count_total'>一共" + item_list.length + "筆食材，總成本為" + total + "元</div>" +
            "<div class='btn_confirm'>確定新增</div>" +
            "</div>"
        );

        $('.btn_confirm').click(function () {

            // 顯示視窗
            $('.dia_mask').css('display', 'block');
            $('#dia_pname').css('display', 'flex');

            // FOCUS INPUT
            $('#product_name').val('');
            $('#product_name').focus();
        });

        $('#dia_btn').click(function () {

            test_count += 1;

            var product_name = $('#product_name').val();

            if (test_count == item_list.length) {
                $.ajax({
                    type: "POST",
                    url: ajax_url + '?action=submit',
                    data: {
                        product: product_name,
                        data: JSON.stringify(item_list),
                        total: total
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.success) {
                            alert('新增完畢!');
                            history.go(0);
                        } else {
                            alert(data.msg);
                        }
                    }, error: function () {
                        alert('更新資料有誤!');
                    }

                });
                test_count = 0;
            }
        });

        //按下Enter鍵等同送出
        $('input[name="product_name"]').keypress(function (e) {
            code = (e.keyCode ? e.keyCode : e.which);
            if (code === 13) {
                $('.dia_btn').click();
                return false;
            }
        });
    }
}

function remove_item(id) {
    item_list.splice(id, 1);
    show_list();
}