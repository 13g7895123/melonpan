// 設定初始值
$('input[name="material_name"]').val('');
$('input[name="weight"]').val('');
$('input[name="total_price"]').val('');

// 取得輸入數值
var material = $('input[name="material_name"]').val();
var weight = $('input[name="weight"]').val();
var unit = $('select[name="unit"]').val();
var total_price = $('input[name="total_price"]').val();

var list_count = 0;

$('.add').click(function () {

    // 確定不為空值
    if (material == '') {
        alert('數值有誤，請重新確認!');
    } else if (material != '' && weight != '' && total_price != '') {
        alert('click');
        list_count += 1;
        // 新增BOT項目
        $('.bot').append(
            "<div class='list'>" +
            "<div class='list_field se_num'>" + list_count + ".</div>" +
            "<div class='list_field name'>" + material + "</div>" +
            "<div class='list_field weight'>" + weight + "</div>" +
            "<div class='list_field unit'>" + unit + "</div>" +
            "<div class='list_field total_price'>" + total_price + "元</div>" +
            "<div class='list_field arrow'><i class='fa-solid fa-arrow-right'></i></div>" +
            "<div class='list_field g_price'>$" + "(g)</div>" +
            "<div class='list_field btn_cancel'>X</div>" +
            "</div>"
        );

        // 新增最後確定項目
    }
});



