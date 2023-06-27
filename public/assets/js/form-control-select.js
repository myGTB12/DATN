'use strict';

const { forEach } = require("lodash");

(function() {
    const citySelected = document.getElementById('formControlSelectCity');
    const districtSelected = document.getElementById('formControlSelectDistrict');
    const districts = [ 
        1 = [
            'Hoàng Mai',
            'Long Biên',
            'Thanh Xuân',
            'Bắc Từ Liêm',
            'Ba Đình',
            'Cầu Giấy',
            'Đống Đa',
            'Hai Bà Trưng',
            'Hoàn Kiếm',
            'Hà Đông',
            'Tây Hồ ',
            'Nam Từ Liêm'
        ],
        2 = [
            'Thành phố Cao Bằng',
            'Bảo Lạc',
            'Bảo Lâm',
            'Hạ Lang',
            'Hà Quảng',
            'Hòa An',
            'Nguyên Bình',
            'Quảng Hòa',
            'Thạch An',
            'Trùng Khánh',
        ],
        3 = [
            'Thành phố Lào Cai',
            'Thị xã Sa Pa',
            'Bát Xát',
            'Bảo Yên',
            'Bảo Thắng',
            'Si Ma Cai',
            'Văn Bàn',
            'Mường Khương',
            'Bắc Hà',
        ],
        19 = [
            'Đồ Sơn',
            'Dương Kinh',
            'Hải An',
            'Hồng Bàng',
            'Kiến An',
            'Lê Chân',
            'Ngô Quyền',
            'huyện An Dương',
            'An Lão',
            'Bạch Long Vĩ',
            'Cát Hải',
            'Kiến Thuỵ',
            'Thủy Nguyên',
            'Tiên Lãng',
            'Vĩnh Bảo',
        ]
    ];

    citySelected.addEventListener('change', function() {
        const selectedValue = citySelected.value;
        const i = 1;
        districts[selectedValue].forEach(element => {
            const newOption = document.createElement('option');
            newOption.value = i;
            newOption.text = element; 
            i++;
        });
    });
})