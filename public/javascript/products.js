const products = [
    {
        name: 'iPhone 15 Pro Max 512GB Chính hãng (VN/A)',
        priceSale: '40.990.000',
        priceOle: '42.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/products/2023/8/13/1/1694544996241_thumb_iphone_15_pro_didongviet.png'
    },
    {
        name: 'iPhone 15 Pro Max 256GB Chính hãng (VN/A)',
        priceSale: '34.990.000',
        priceOle: '36.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/products/2023/8/13/1/1694544996241_thumb_iphone_15_pro_didongviet.png'
    },
    {
        name: 'iPhone 15 Pro 128GB Chính hãng (VN/A)',
        priceSale: '28.990.000',
        priceOle: '29.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/products/2023/8/13/1/1694544996241_thumb_iphone_15_pro_didongviet.png'
    },
    {
        name: 'iPhone 15 Plus 128GB Chính hãng (VN/A)',
        priceSale: '25.990.000',
        priceOle: '27.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/products/2023/8/13/1/1694544284182_thumb_iphone_15.png'
    },
    {
        name: 'iPhone 15 128GB Chính hãng (VN/A)',
        priceSale: '22.990.000',
        priceOle: '24.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/products/2023/8/13/1/1694549171993_thumb_iphone_15.png'
    },
    {
        name: 'iPhone 14 Pro Max 256GB Chính hãng (VN/A)',
        priceSale: '28.590.000',
        priceOle: '37.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/media/catalog/product/i/p/iphone-13-pro-max-128gb-didongviet_1_1.jpg'
    },
    
    {
        name: 'iPhone 14 Pro Max 128GB Chính hãng (VN/A)',
        priceSale: '25.690.000',
        priceOle: '33.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/media/catalog/product/i/p/iphone-13-pro-max-128gb-didongviet_1_1.jpg'
    },
    {
        name: 'iPhone 14 Pro Max 512GB Chính hãng (VN/A)',
        priceSale: '18.490.000',
        priceOle: '24.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/media/catalog/product/i/p/iphone-14-128gb-didongviet_1.jpg'
    },
    {
        name: 'iPhone 13 128GB Chính hãng (VN/A)',
        priceSale: '15.790.000',
        priceOle: '23.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/media/catalog/product/i/p/iphone-13-128gb-didongviet_1.jpg'
    },
    {
        name: 'iPhone 11 64GB Chính hãng (VN/A)',
        priceSale: '10.390.000',
        priceOle: '14.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/media/catalog/product/i/p/iphone-11-64gb-chinh-hang_3.jpg'
    },


    // double
    {
        name: 'iPhone 15 Pro Max 512GB Chính hãng (VN/A)',
        priceSale: '40.990.000',
        priceOle: '`42.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/products/2023/8/13/1/1694544996241_thumb_iphone_15_pro_didongviet.png'
    },
    {
        name: 'iPhone 15 Pro Max 256GB Chính hãng (VN/A)',
        priceSale: '34.990.000',
        priceOle: '36.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/products/2023/8/13/1/1694544996241_thumb_iphone_15_pro_didongviet.png'
    },
    {
        name: 'iPhone 15 Pro 128GB Chính hãng (VN/A)',
        priceSale: '28.990.000',
        priceOle: '29.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/products/2023/8/13/1/1694544996241_thumb_iphone_15_pro_didongviet.png'
    },
    {
        name: 'iPhone 15 Plus 128GB Chính hãng (VN/A)',
        priceSale: '25.990.000',
        priceOle: '27.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/products/2023/8/13/1/1694544284182_thumb_iphone_15.png'
    },
    {
        name: 'iPhone 15 128GB Chính hãng (VN/A)',
        priceSale: '22.990.000',
        priceOle: '24.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/products/2023/8/13/1/1694549171993_thumb_iphone_15.png'
    },
    {
        name: 'iPhone 14 Pro Max 256GB Chính hãng (VN/A)',
        priceSale: '28.590.000',
        priceOle: '37.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/media/catalog/product/i/p/iphone-13-pro-max-128gb-didongviet_1_1.jpg'
    },
    
    {
        name: 'iPhone 14 Pro Max 128GB Chính hãng (VN/A)',
        priceSale: '25.690.000',
        priceOle: '33.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/media/catalog/product/i/p/iphone-13-pro-max-128gb-didongviet_1_1.jpg'
    },
    {
        name: 'iPhone 14 Pro Max 512GB Chính hãng (VN/A)',
        priceSale: '18.490.000',
        priceOle: '24.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/media/catalog/product/i/p/iphone-14-128gb-didongviet_1.jpg'
    },
    {
        name: 'iPhone 13 128GB Chính hãng (VN/A)',
        priceSale: '15.790.000',
        priceOle: '23.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/media/catalog/product/i/p/iphone-13-128gb-didongviet_1.jpg'
    },
    {
        name: 'iPhone 11 64GB Chính hãng (VN/A)',
        priceSale: '10.390.000',
        priceOle: '14.990.000',
        imageUrl: 'https://cdn-v2.didongviet.vn/files/media/catalog/product/i/p/iphone-11-64gb-chinh-hang_3.jpg'
    }
    
    
]