// 設定初始值
$('input[name="material_name"]').val('');
$('input[name="weight"]').val('');
$('input[name="total_price"]').val('');

var material, weight, unit, total_price;
var list_count = 0;

var material_list = [];

// 測試用資料
// material_list = [
//     { name: '肉鬆', weight: 3, unit: '公斤', total_price: 700, g_price: 0 },
//     { name: '蜂蜜', weight: 3, unit: '公斤', total_price: 1000, g_price: 0 },
//     { name: '糖', weight: 1, unit: '公斤', total_price: 40, g_price: 0 },
// ];

// 建立模板
var item_html = "<div class='list'>" +
    "<div class='list_field se_num'>{{se_num}}.</div>" +
    "<div class='list_field name'>{{name}}</div>" +
    "<div class='list_field weight'>{{weight}}</div>" +
    "<div class='list_field unit'>{{unit}}</div>" +
    "<div class='list_field total_price'>{{total_price}}元</div>" +
    "<div class='list_field arrow'><i class='fa-solid fa-arrow-right'></i></div>" +
    "<div class='list_field g_price'>每公克{{g_price}}元</div>" +
    "<div class='list_field btn_cancel' id='{{del_id}}' data_del_id='{{delid}}'>X</div>" +
    "</div>";

show_list();

$('.add').click(function () {

    // 取得輸入數值
    material = $('input[name="material_name"]').val();
    weight = $('input[name="weight"]').val();
    unit = $('select[name="unit"]').val();
    total_price = $('input[name="total_price"]').val();

    // 確定不為空值
    if (material === '') {
        alert('材料不可為空，請重新確認');
    } else if (material != '' && weight != '' && total_price != '') {

        g_price = cal_gprice(weight, unit, total_price);

        // 新增BOT項目
        material_list.push({
            name: material,
            weight: weight,
            unit: unit,
            total_price: total_price,
            g_price: g_price
        });
        show_list();

        // 新增後狀態
        $('.material_name').val('');
        $('.weight').val('');
        $('.total_price').val('');
        $('input[name="material_name"]').focus();
    }
});

function show_list() {

    $('.bot').html('');

    for (i = 0; i < material_list.length; i++) {

        var del_item_id = 'del_item_' + i;

        var current_html = item_html
            .replace('{{se_num}}', i + 1)
            .replace('{{name}}', material_list[i].name)
            .replace('{{weight}}', material_list[i].weight)
            .replace('{{unit}}', material_list[i].unit)
            .replace('{{total_price}}', material_list[i].total_price)
            .replace('{{g_price}}', material_list[i].g_price)
            .replace('{{del_id}}', del_item_id)
            .replace('{{delid}}', i);

        $('.bot').append(current_html);

        // 刪除按鈕
        $('#' + del_item_id).click(function () {
            console.log('123');
            remove_item($(this).attr('data_del_id'));
        });
    }

    if (material_list.length > 0) {
        $('.bot').append(
            "<div class='last_row'>" +
            "<div class='count_total'>一共新增" + material_list.length + "筆食材資訊</div>" +
            "<div class='btn_confirm'>確定新增</div>" +
            "</div>"
        );
    }
}

function cal_gprice(weight, unit, total_price) {    // 計算每公克價格

    if (unit == '公斤') {
        weight *= 1000;
    } else if (unit == '台斤') {
        weight *= 600;
    }
    return Math.round((total_price / weight) * 1000) / 1000;    // 取到小數第三位
}

function remove_item(id) {
    material_list.splice(id, 1);
    show_list();
}


