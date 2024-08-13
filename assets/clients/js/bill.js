$(document).ready(function () {
    $("#button").click(function (e) {
        e.preventDefault(); // Ngăn chặn form submit mặc định

        let isValid = true;

        // Kiểm tra các trường input
        $('#myForm input.form-control').each(function () {
            if ($(this).val() === "") {
                isValid = false;
                $(this).css('border', '1px solid red');
            } else {
                $(this).css('border', '');
            }
        });

        // Kiểm tra các trường select
        $('#myForm select.custom-select').each(function () {
            if ($(this).val() === null || $(this).val() === "") {
                isValid = false;
                $(this).css('border', '1px solid red');
            } else {
                $(this).css('border', '');
            }
        });

        if (isValid) {
            var selectedPayment = $('input[name="payment"]:checked').val();

            if (selectedPayment == "1") {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'id_pt',
                    value: selectedPayment
                }).appendTo('#myForm');

                $("#myForm").submit();


            } else if (selectedPayment == "2") {

                $('<input>').attr({
                    type: 'hidden',
                    name: 'id_pt',
                    value: selectedPayment
                }).appendTo('#myForm');
                

                // Lấy tất cả dữ liệu từ form ban đầu
                
                $("#myForm").submit();
            } else {
                alert("Vui lòng chọn phương thức thanh toán.");
            }
        } else {
            alert("Vui lòng điền đầy đủ thông tin!");
        }
    });
    $("#myForm").on("submit", function (e) {
        // Lấy thông tin của Tỉnh/Thành phố
        var selectedProvinceOption = $("#thaibinh option:selected");
        var provinceName = selectedProvinceOption.data("province-name");
        var provinceId = selectedProvinceOption.val();

        // Lấy thông tin của Quận/Huyện
        var selectedDistrictOption = $("#thaithuy option:selected");
        var districtName = selectedDistrictOption.data("district-name");
        var districtId = selectedDistrictOption.val();

        // Lấy thông tin của Xã/Phường
        var selectedWardOption = $("#hongdung option:selected");
        var wardName = selectedWardOption.data("ward-name");
        var wardId = selectedWardOption.val();

        // Thêm input ẩn cho Tỉnh/Thành phố
        if (provinceId !== "") {
            $(this).append('<input type="hidden" name="province_name" value="' + provinceName + '">');
        }

        // Thêm input ẩn cho Quận/Huyện
        if (districtId !== "") {
            $(this).append('<input type="hidden" name="district_name" value="' + districtName + '">');
        }

        // Thêm input ẩn cho Xã/Phường
        if (wardId !== "") {
            $(this).append('<input type="hidden" name="ward_name" value="' + wardName + '">');
        }
    });
});
