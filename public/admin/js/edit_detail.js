Validator({
    form: '#form-edit-2',
    formGroupSelector:'.form-group',
    errorSelector: '.form-message',
    rules:[
        Validator.isRequired('#e_price', 'Vui nhập giá sản phẩm'),
        Validator.isRequired('#e_rom_id', 'Vui lòng chọn dung lượng'),
        Validator.isRequired('#e_type_id', 'Vui lòng chọn loại'),
        Validator.isRequired('#e_quanlity', 'Vui lòng nhập số lượng'),
        Validator.isRequired('#e_mota', 'Vui lòng nhập mô tả'),
        // Validator.isRequired('#e_image', 'Vui lòng chọn hình ảnh'),
        Validator.isSalePrice('#e_sale_price',function () {
            const priceSale = document.querySelector('#e_price')
            return Number(priceSale.value)
        })
    ],
    onSubmit: function (data) {
        console.log('info send',data);
        const formData = new FormData(document.querySelector('#form-edit-2'));
        $.ajax({
            url: 'admin.php?action=sanpham_detail&act=edit_action',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if(!response.error) {
                    // document.querySelector('#form-edit-2').reset();
                    document.querySelector('.add-detail__edit-img').src = '';
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success"
                    }).then(() => {
                        location.href = `./main.php?action=sanpham_detail&act=list&masp=${response.masp}`;
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
function loadDemoImgEdit() {
    const file = document.querySelector('#e_image');
    const viewDemo = document.querySelector('.add-detail__edit-img')
    
    var url = URL.createObjectURL(file.files[0]);
    viewDemo.src = url;
    console.log(url);
}
function removeProductDetail(id) {
    const item = document.querySelector(`.list-detail__item2-${id}`);
    console.log('item :>> ', item);
    // confirm
    Swal.fire({
        title: "Bạn muốn xóa sản phẩm này?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Đồng ý"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'admin.php?action=sanpham_detail&act=delete',
                type: 'POST',
                dataType: 'json',
                data: {id},
                success: function(response) {
                    if(!response.error){
                        Swal.fire({
                            title: "Đã xóa!",
                            text: "Sản phẩm đã được xóa.",
                            icon: "success"
                        });
                        item.remove();
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: response.message,
                            icon: "error"
                        });
                    }
                }
            })
        }
      });
}