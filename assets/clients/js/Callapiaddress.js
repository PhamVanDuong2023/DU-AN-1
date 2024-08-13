$(document).ready(function () {
    $.ajax({
        url: "https://vapi.vnappmob.com/api/province/",
        method: "GET",
        success: function (data) {
            var thaibinhSelect = $("#thaibinh");
            thaibinhSelect.append('<option value="">Chọn tỉnh/thành phố</option>');
            if (data && data.results) {
                $.each(data.results, function (index, province) {
                    console.log(province);
                    
                    thaibinhSelect.append('<option value="' + province.province_id + '" data-province-name="' + province.province_name + '">' + province.province_name + '</option>');
                });
            } else {
                console.error("Dữ liệu không chứa key 'results' hoặc cấu trúc không đúng");
            }
        }
    });
    $("#thaibinh").change(function () {
        var thaibinhCode = $(this).val();
        if (thaibinhCode) {
            $.ajax({
            
                url: "https://vapi.vnappmob.com/api/province/district/" + thaibinhCode,
                method: "GET",
                success: function (data) {

                    var thaithuySelect = $("#thaithuy");
                    thaithuySelect.empty();
                    thaithuySelect.append('<option value="">Chọn huyện/quận</option>');

                    
                    if (data && data.results) {
                        $.each(data.results, function (index, district) {
                            
                            
                            thaithuySelect.append('<option value="' + district.district_id + '" data-district-name="' + district.district_name + '">' + district.district_name + '</option>');
                        });
                    } else {
                        console.error("Dữ liệu không chứa key 'results' hoặc cấu trúc không đúng");
                    }

                    // Xóa và thêm mặc định vào dropdown xã/phường
                    $("#hongdung").empty();
                    $("#hongdung").append('<option value="">Chọn xã/phường</option>');
                },
                error: function (xhr, status, error) {
                    console.error("Lỗi khi lấy dữ liệu: ", status, error);
                }
            });
        } else {
            // Xóa và thêm mặc định vào dropdown huyện/quận
            $("#thaithuy").empty();
            $("#thaithuy").append('<option value="">Chọn huyện/quận</option>');

            // Xóa và thêm mặc định vào dropdown xã/phường
            $("#hongdung").empty();
            $("#hongdung").append('<option value="">Chọn xã/phường</option>');
        }
    });
    $("#thaithuy").change(function () {
        var thaithuyCode = $(this).val();
        if (thaithuyCode) {
            $.ajax({
                url: "https://vapi.vnappmob.com/api/province/ward/" + thaithuyCode,
                method: "GET",
                success: function (data) {
                    var hongdungSelect = $("#hongdung");
                    hongdungSelect.empty();
                    hongdungSelect.append('<option value="">Chọn xã/phường</option>');
                    $.each(data.results, function (index, ward) {
                        hongdungSelect.append('<option value="' + ward.ward_id+ '" data-ward-name="' + ward.ward_name + '">' + ward.ward_name + '</option>');
                    });
                }
            });
        } else {
            $("#hongdung").empty();
            $("#hongdung").append('<option value="">Chọn xã/phường</option>');
        }
    });

    
});

