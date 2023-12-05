Validator({
    form: '#form-add-2',
    formGroupSelector:'.form-group',
    errorSelector: '.form-message',
    rules:[
        Validator.isRequired('#a_price', 'Vui nhập giá sản phẩm'),
        Validator.isRequired('#a_color_id', 'Vui lòng chọn màu sắc'),
        Validator.isRequired('#a_rom_id', 'Vui lòng chọn dung lượng'),
        Validator.isRequired('#a_type_id', 'Vui lòng chọn loại'),
        Validator.isRequired('#a_quanlity', 'Vui lòng nhập số lượng'),
        Validator.isRequired('#a_mota', 'Vui lòng nhập mô tả'),
        Validator.isRequired('#a_image', 'Vui lòng chọn hình ảnh'),
        // Validator.isRequired('#a_sale_price', 'Vui lòng chọn loại'),
        Validator.isSalePrice('#a_sale_price',function () {
            const priceSale = document.querySelector('#a_price')
            return Number(priceSale.value)
        })
    ],
    onSubmit: function (data) {
        console.log('info send',data);
        const formData = new FormData(document.querySelector('#form-add-2'));
        $.ajax({
            url: 'admin.php?action=sanpham_detail&act=add_action',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if(!response.error) {
                    document.querySelector('#form-add-2').reset();
                    document.querySelector('.add-detail__img').src = '';
                    Swal.fire({
                        title: "Đã Thêm SP!",
                        text: "Thêm sản phẩm thành công",
                        icon: "success"
                    });
                } else {
                    Swal.fire({
                        title: "Lỗi!",
                        text: response.message,
                        icon: "error"
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Lỗi:', error);
            }
        })
    }
});

function loadDemoImg() {
    const file = document.querySelector('#a_image');
    const viewDemo = document.querySelector('.add-detail__img')
    
    var url = URL.createObjectURL(file.files[0]);
    viewDemo.src = url;
    console.log(url);
}