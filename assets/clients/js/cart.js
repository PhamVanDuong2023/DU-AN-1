// đếm số lượng sản phẩm trong giỏ hàng
$(document).ready(function () {
    var giohang = $("#giohang").children("tr");
    var soluongsp = giohang.length;
    var boxcart = $("#boxcart").children("span");
    boxcart.text(soluongsp);

    // var namesp2 = giohang.eq(1).children("td").eq(0).text();
    // var img2 = giohang.eq(1).children("td").eq(1).children("img").attr("src");
    // alert(namesp2 +"-----"+ img2);

    // xóa sản phẩm giỏ hàng
    $(".remove").click(function (e) {
        e.preventDefault();
        var tr = $(this).parent().parent();
        var namesp = tr.children("td").eq(0).text();
        tr.remove();
        // alert(tr);
        // cập nhật lại số lượng sản phẩm giỏ hàng
        var giohang = $("#giohang").children("tr");
        var soluongsp = giohang.length;
        var boxcart = $("#boxcart").children("span");
        boxcart.text(soluongsp);

    });
    //tăng số lượn sản phẩm và tính tiền theo số lượng sản phẩm
    $("#number").change(function (e) {
        e.preventDefault();
        var soluong = this.value;
        var tr = $(this).closest("tr");
        var tensp = tr.children("td").eq(0).text();
        var giasp = parseFloat(tr.find(".giasp").text());
        var tongtien = giasp * soluong;
        // alert(tongtien);
        tr.find(".tongtien").text(tongtien.toFixed(2));
    });

});