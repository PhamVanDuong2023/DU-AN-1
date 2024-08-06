// đếm số lượng sản phẩm trong giỏ hàng
$(document).ready(function () {
    var giohang = $("#giohang").children("tr");
    var soluongsp = giohang.length;
    var boxcart = $("#boxcart").children("span");
    boxcart.text(soluongsp);

    
    $("#number").change(function (e) {
        e.preventDefault();
        var soluong = this.value;
        var tr = $(this).closest("tr");
        var tensp = tr.children("td").eq(0).text();

        var giaspText = tr.find(".giasp").text().replace(/,/g, '');
        var giasp = parseInt(giaspText);
        
        var tongtien = giasp * soluong;
        //  alert(tongtien);
        tr.find(".tongtien").text(tongtien.toLocaleString('en-US'));
    });

});



