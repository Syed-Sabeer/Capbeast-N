/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: invoceslist init js
*/

// list js

function getTime(params) {
    params = new Date(params);
    if (params.getHours() != null) {
        var hour = params.getHours();
        var minute = (params.getMinutes()) ? params.getMinutes() : 00;
        return hour + ":" + minute;
    }
}

function tConvert(time) {
    var d = new Date(time);
    time_s = (d.getHours() + ':' + d.getMinutes());
    var t = time_s.split(":");
    var hours = t[0];
    var minutes = t[1];
    var newformat = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    return (hours + ':' + minutes + ' ' + newformat);
}

var str_dt = function formatDate(date) {
    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];
    var d = new Date(date),
        month = '' + monthNames[(d.getMonth())],
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;
    return [day + " " + month, year].join(', ');
};

// new Date(y, m, d + 23, 20, 0),
var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();
var qty = 0;
var rate = 0;
var Invoices = [{
    invoice_no: '30280001',
    customer: 'Neil Collins',
    img: 'avatar-1.jpg',
    email: "ryan.dyer@toner.com",
    date: new Date(2022, 5, d - 24, 10, 45),
    invoice_amount: 415.96,
    status: 'Paid',
    billing_address: {
        full_name: 'Neil Collins',
        address: '5114 Adipiscing St. Puno United States 46782',
        phone: '(926) 817-7835',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Ryan Dyer',
        address: '534-1477 Non, Av. Bury St. Edmunds France 10846',
        phone: '(926) 817-7835',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'VISA',
        card_holder_name: 'Reese Jacobs',
        card_number: '4024007179348742',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280002',
    customer: 'Alfred Hurst',
    img: 'avatar-2.jpg',
    email: "alfredH@toner.com",
    date: new Date(2022, 12, d - 8, 8, 34),
    invoice_amount: 875,
    status: 'Unpaid',
    billing_address: {
        full_name: 'Brody Holman',
        address: 'P.O. Box 900 Ireland, 6694 Ullamcorper Avenue Port Pirie 37176',
        phone: '1-862-423-3347',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Elijah Galloway',
        address: '7288 Dignissim Rd. Villa Alegre Germany 891315',
        phone: '1-862-423-3347',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'VISA',
        card_holder_name: 'Alfred Hurst',
        card_number: '4916669499578927',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280003',
    customer: 'Tommy Carey',
    img: 'avatar-3.jpg',
    email: "careytommy@toner.com",
    date: new Date(2022, 4, d - 17, 20, 34),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Jolie Hood',
        address: 'Ap #957-7519 Vel, Belgium St. Diêm Điền 88188-296',
        phone: '963-012-7495',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'MacKensie Peterson',
        address: '572-7561 Tempus Ave Alajuela Spain 86558',
        phone: '1-634-649-4101',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'VISA',
        card_holder_name: "Tommy Carey",
        card_number: '4486013431082211',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280004',
    customer: 'Cassius Brock',
    img: 'avatar-4.jpg',
    email: "brock@toner.com",
    date: new Date(2022, 6, d - 14, 20, 48),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Cassius Brock',
        address: '983-8399 Egestas, Rd Spain. Penza 6596',
        phone: '(922) 264-4841',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Emerson Riggs',
        address: '916-4370 Aliquet Avenue Nordhorn Spain 3200',
        phone: '(922) 264-4841',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'VISA',
        card_holder_name: 'Cassius Brock',
        card_number: '4532135177402156',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280005',
    customer: 'Camilla Winters',
    img: '',
    email: "camilla@toner.com",
    date: new Date(2021, 2, d - 11, 10, 60),
    invoice_amount: 875,
    status: 'Refund',
    billing_address: {
        full_name: 'Camilla Winters',
        address: 'Ap #552-1397 Ac Rd Germany. Barmouth 8574',
        phone: '1-434-874-6805',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Britanni Daniel',
        address: 'P.O. Box 998, 9293 Quisque Avenue Puerto Montt Poland 82862',
        phone: '1-434-874-6805',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'VISA',
        card_holder_name: 'Camilla Winters',
        card_number: '4024007183253102',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280006',
    customer: 'Gabrielle Holden',
    img: 'avatar-6.jpg',
    email: "gabrielle@toner.com",
    date: new Date(2022, 3, d - 8, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Gabrielle Holden',
        address: '5642 Aliquam, Avenue Zielona Costa Rica Góra 21204',
        phone: '1-546-878-8131',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Alfred Hurst',
        address: '715-6973 Non St. Samara Peru 10513',
        phone: '1-546-878-8131',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'VISA',
        card_holder_name: 'Alfred Hurst',
        card_number: '4716482226172291',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280007',
    customer: 'Kristina Hooper',
    img: 'avatar-7.jpg',
    email: "kristina@toner.com",
    date: new Date(2022, 3, d - 16, 21, 58),
    invoice_amount: 875,
    status: 'Cancel',
    billing_address: {
        full_name: 'Kristina Hooper',
        address: 'P.O. Box 332 Italy, 5256 Dignissim St. Juazeiro do Norte 646442',
        phone: '(587) 848-3170',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Kieran Holland',
        address: '150-7530 Egestas Av. Panchià Russian Federation 16807',
        phone: '(587) 848-3170',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'VISA',
        card_holder_name: 'Donna Hilpert',
        card_number: '4485110978669599',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280008',
    customer: 'Alina Holland',
    img: 'avatar-8.jpg',
    email: "hollandalina@toner.com",
    date: new Date(2021, 3, d - 8, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Alina Holland',
        address: '2935 Senectus Av. Tvedestrand Germany 66479',
        phone: '(287) 406-9128',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Alina Holland',
        address: '101-9784 Metus Rd. Minitonas Mexico 19-154',
        phone: '(287) 406-9128',
        tax: '123456789'
    },
    prducts: [{
        product_name: 'Macbook Pro',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Smart Watch for Mans',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Borosil Paper Cup',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'VISA',
        card_holder_name: 'Evelyn Miller',
        card_number: '4609615071890505',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280009',
    customer: 'Christian Cardenas',
    img: 'avatar-1.jpg',
    email: "id.erat@aol.org",
    date: new Date(2022, 1, d - 20, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Christian Cardenas',
        address: '414-240 Odio. Rd Vietnam. Louisville 41715',
        phone: '1-681-342-7158',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Linus Pitts',
        address: 'Ap #280-7347 Libero. Rd. Yurimaguas Italy 881484',
        phone: '1-681-342-7158',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'VISA',
        card_holder_name: 'Cleora Cole',
        card_number: '4011376293886159',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280010',
    customer: 'Edward Rogers',
    img: 'avatar-2.jpg',
    email: "edwardro@toner.com",
    date: new Date(2021, 3, d - 22, 6, 12),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Edward Rogers',
        address: 'Ap #322-2982 Lacinia Road India Moss 309511',
        phone: '1-514-596-7650',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Edward Rogers',
        address: 'Ap #827-2319 Eu Ave Bima Norway 1663',
        phone: '1-514-596-7650',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'VISA',
        card_holder_name: 'Blaise Quigley',
        card_number: '4929663041722401',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280011',
    customer: 'Hilel Gillespie',
    img: 'avatar-3.jpg',
    email: "enim.nunc@yahoo.edu",
    date: new Date(2021, 3, d - 23, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Hilel Gillespie',
        address: '848-2883 At Street Kalisz United Kingdom 687132',
        phone: '(451) 816-7296',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Dacey Villarreal',
        address: '292-7088 In Road Rawalakot New Zealand 6842',
        phone: '(451) 816-7296',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'VISA',
        card_holder_name: 'Hollie Zboncak',
        card_number: '4828772787474622',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280012',
    customer: 'Randall Stafford',
    img: 'avatar-4.jpg',
    email: "eget.lacus@outlook.org",
    date: new Date(2021, 3, d - 23, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Randall Stafford',
        address: 'P.O. Box 583 Colombia, 2640 Aliquam Ave Toruń 456387',
        phone: '1-340-324-3678',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Shana Hudson',
        address: 'Ap #973-232 Non, St. Tibet Sweden GW0R 2VR',
        phone: '1-340-324-3678',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'MasterCard',
        card_holder_name: 'Kameron Barrows',
        card_number: '2720686256191298',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280013',
    customer: 'Fletcher Jones',
    img: 'avatar-5.jpg',
    email: "sapien.cursus@google.couk",
    date: new Date(2021, 3, d - 23, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Fletcher Jones',
        address: 'P.O. Box 951 New Zealand, 1480 Venenatis Ave Swat 152307',
        phone: '(433) 436-0003',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Fitzgerald Rice',
        address: '314-372 Facilisis Rd. Nancy Turkey E2K 1HY',
        phone: '(433) 436-0003',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'MasterCard',
        card_holder_name: 'Gus Thiel',
        card_number: '2221197016300538',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280014',
    customer: 'Donovan Sparks',
    img: 'avatar-6.jpg',
    email: "urna.convallis@yahoo.net",
    date: new Date(2021, 3, d - 23, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Donovan Sparks',
        address: '176-4856 Hendrerit Av. France San Juan de Girón 58811-629',
        phone: '1-658-684-1084',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Georgia Nixon',
        address: 'Ap #599-1431 Non, St. Cartagena del Chairá United States 2548',
        phone: '1-658-684-1084',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'MasterCard',
        card_holder_name: 'Emily Stokes',
        card_number: '2221426370404515',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280015',
    customer: 'Sage Gardner',
    img: 'avatar-7.jpg',
    email: "consequat.enim@google.com",
    date: new Date(2021, 3, d - 23, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Sage Gardner',
        address: 'Ap #193-730 Orci, Chile Street San José de Alajuela 8317',
        phone: '(470) 328-1309',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Melinda Banks',
        address: '5778 Aliquam Road Ofena Italy 11218',
        phone: '(470) 328-1309',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'MasterCard',
        card_holder_name: 'Salvador Gerlach',
        card_number: '5347125175526959',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280016',
    customer: 'Paki Grimes',
    img: 'avatar-1.jpg',
    email: "ante.lectus.convallis@google.com",
    date: new Date(2021, 3, d - 23, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Paki Grimes',
        address: '516-3641 Tincidunt St. Pakistan Zamora de Hidalgo 6554',
        phone: '(726) 823-5568',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Shaeleigh Wilkins',
        address: '961-3054 Integer St. Abergele United Kingdom 6746',
        phone: '(726) 823-5568',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'MasterCard',
        card_holder_name: 'Marilyne Swift',
        card_number: '2221357276228023',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280017',
    customer: 'James Diaz',
    img: 'avatar-2.jpg',
    email: "nascetur@yahoo.com",
    date: new Date(2021, 3, d - 23, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'James Diaz',
        address: 'Ap #160-8536 Ante St Colombia. Santa Coloma de Gramenet 19475',
        phone: '1-989-241-7715',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Julian Tanner',
        address: '630-5275 Quis Street Kraków Canada E39 0RE',
        phone: '1-989-241-7715',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'MasterCard',
        card_holder_name: 'Kraig Prohaska',
        card_number: '2221381107199906',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280018',
    customer: 'Karen Monroe',
    img: 'avatar-3.jpg',
    email: "ac.ipsum@google.com",
    date: new Date(2021, 3, d - 23, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Karen Monroe',
        address: '486-3233 Quis Road Burnie Costa Rica 82926',
        phone: '(131) 702-8456',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Jescie Keller',
        address: '256-3596 Fermentum Road Salzburg United States 86-910',
        phone: '(131) 702-8456',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'MasterCard',
        card_holder_name: 'Domenic Kassulke',
        card_number: '5576137153087732',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280019',
    customer: 'Vincent Weeks',
    img: 'avatar-4.jpg',
    email: "metus.facilisis@hotmail.edu",
    date: new Date(2021, 3, d - 23, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Vincent Weeks',
        address: '128-7206 Sit Street Bathurst Indonesia 812326',
        phone: '1-361-716-4822',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Jonah Hayden',
        address: 'Ap #315-5686 Luctus. Rd. Samaniego Canada 482995',
        phone: '1-361-716-4822',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'MasterCard',
        card_holder_name: 'Abner Muller',
        card_number: '5322044544430471',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280020',
    customer: 'Miriam Dickson',
    img: 'avatar-5.jpg',
    email: "nunc.ac@icloud.ca",
    date: new Date(2021, 3, d - 23, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Miriam Dickson',
        address: '1747 Dui, Ave Springdale Russian Federation 67155',
        phone: '(215) 293-4168',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Eaton Buckley',
        address: '846-7108 Orci. Road Ukkel India 624087',
        phone: '(215) 293-4168',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'MasterCard',
        card_holder_name: 'Elyse Green',
        card_number: '5393850427187200',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280021',
    customer: 'Ashton Head',
    img: '',
    email: "cras@outlook.edu",
    date: new Date(2021, 3, d - 23, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Ashton Head',
        address: '735-6864 Mauris Ave Linz South Korea 39964',
        phone: '(256) 774-0737',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Lani Ashley',
        address: 'P.O. Box 451, 696 Metus Avenue Jaboatão dos Guararapes Colombia 391846',
        phone: '(256) 774-0737',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'MasterCard',
        card_holder_name: 'Wilhelmine Cummerata',
        card_number: '5529776760187837',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}, {
    invoice_no: '30280022',
    customer: 'Linus Martin',
    email: "fringilla.est.mauris@google.edu",
    date: new Date(2021, 3, d - 23, 21, 58),
    invoice_amount: 875,
    status: 'Paid',
    billing_address: {
        full_name: 'Linus Martin',
        address: '907-233 Vehicula. Road Vietnam Vienna 8231',
        phone: '1-544-454-6888',
        tax: '123456789'
    },
    shipping_address: {
        full_name: 'Yuri Allison',
        address: 'Ap #769-2743 Pede. Road Gönen Spain 83472-82897',
        phone: '1-544-454-6888',
        tax: '123456789'
    },
    prducts: [{
            product_name: 'World most expensive t shirt',
            product_details: 'Graphic Print Men & Women Sweatshirt',
            rates: (rate = 266.24),
            quantity: (qty = 3),
            amount: (rate * qty)
        },
        {
            product_name: 'Ninja Pro Max Smartwatch',
            product_details: 'large display of 40mm (1.6″ inch), 27 sports mode, SpO2 monitor',
            rates: (rate = 247.27),
            quantity: (qty = 1),
            amount: (rate * qty)
        },
        {
            product_name: 'Girls Mint Green & Off-White Open Toe Flats',
            product_details: 'Fabric:Synthetic · Colour:Green · Shoe Type:Sandals',
            rates: (rate = 24.07),
            quantity: (qty = 4),
            amount: (rate * qty)
        }
    ],
    payment_details: {
        payment_method: 'MasterCard',
        card_holder_name: 'Tania Price',
        card_number: '5336874146007028',
        total_amount: 1178.71
    },
    company_details: {
        legal_registration_no: "987654",
        email: 'support@themesbrand.com',
        website: 'www.themesbrand.com',
        contact_no: '0123456789',
        address: 'California, United States',
        zip_code: '90201'
    },
    order_summary: {
        sub_total: 1142.27,
        estimated_tex: 142.78,
        discount: 171.34,
        shipping_charge: 65.00,
        total_amount: 1178,
    },
    notes: 'All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.'
}];


if ((localStorage.getItem("invoices-list") === null) && (localStorage.getItem("new_data_object") === null)) {
    Invoices = Invoices;
} else if ((localStorage.getItem("invoices-list") === null) && (localStorage.getItem("new_data_object") !== null)) {
    var invoice_new_obj = JSON.parse(localStorage.getItem("new_data_object"));
    Invoices.push(invoice_new_obj);
    localStorage.removeItem("new_data_object");
} else {
    Invoices = [];
    Invoices = JSON.parse(localStorage.getItem("invoices-list"));
    if (localStorage.getItem("new_data_object") !== null) {
        var invoice_new_obj = JSON.parse(localStorage.getItem("new_data_object"));
        Invoices.push(invoice_new_obj);
        localStorage.removeItem("new_data_object");
    }
    localStorage.removeItem("invoices-list");
}

//ist form-check-all
Array.from(Invoices).forEach(function (raw) {
    let badge;
    switch (raw.status) {
        case 'Paid':
            badge = "success";
            break;
        case 'Refund':
            badge = "primary";
            break;
        case 'Unpaid':
            badge = "warning";
            break;
        case 'Cancel':
            badge = "danger";
    }
    if (raw.img) {
        var avatar_ = `<img src='../assets/images/users/` + raw.img + `' alt='' class='avatar-xs rounded-circle me-2'>`;
    } else {
        var avtar_title = (raw.customer).split(" ");
        var letters = null;
        if (avtar_title.length >= 2) {
            var first_letter = avtar_title[0].slice(0, 1);
            var secont_letter = avtar_title[1].slice(0, 1);
            letters = first_letter + secont_letter
        } else {
            var first_letter = avtar_title[0].slice(0, 1);
            letters = first_letter
        }
        var avatar_ = `<div class="flex-shrink-0 avatar-xs me-2"><div class="avatar-title bg-success-subtle text-success rounded-circle fs-12">` + letters + `</div></div>`;
    }

    var tableRawData = `<tr>
                <th scope="row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="chk_child" value="#TTB${raw.invoice_no}">
                    </div>
                </th>
                <td class="id"><a href="javascript:void(0);" onclick="ViewInvoice(this);" data-id="` + raw.invoice_no + `" class="fw-medium link-primary">#TTB` + raw.invoice_no + `</a></td>
                <td class="customer_name">
                    <div class="d-flex align-items-center">
                        ` + avatar_ + raw.customer + `
                    </div>
                </td>
                <td class="email">` + raw.email + `</td>
                <td class="country">Brazil</td>
                <td class="date">` + str_dt(raw.date) + ` <small class="text-muted">` + tConvert(raw.date) + `</small></td>
                <td class="invoice_amount">$` + (raw.invoice_amount) + `</td>
                <td class="status"><span class="badge badge-soft-` + badge + ` text-uppercase">` + raw.status + `</span>
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-soft-secondary btn-sm dropdown btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-fill align-middle"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><button class="dropdown-item" href="javascript:void(0);" onclick="ViewInvoice(this);" data-id="` + raw.invoice_no + `" ><i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                    View</button></li>
                            <li><button class="dropdown-item" href="javascript:void(0);" onclick="EditInvoice(this);" data-id="` + raw.invoice_no + `"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                    Edit</button></li>
                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-line align-bottom me-2 text-muted"></i>
                                    Download</a></li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item remove-item-btn" data-bs-toggle="modal" href="#deleteOrder">
                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                    Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>`;

    document.getElementById('invoice-list-data').innerHTML += tableRawData;
});

document.addEventListener("DOMContentLoaded", function () {
    var genericExamples = document.querySelectorAll('[data-plugin="choices"]');
    Array.from(genericExamples).forEach(function (genericExamp) {
        var element = genericExamp;
        new Choices(element, {
            placeholderValue: "This is a placeholder set in the config",
            searchPlaceholderValue: "Search results here",
        });
    });
});

flatpickr("#datepicker-range", {
    mode: "range",
    dateFormat: "d M, Y",
});

flatpickr("#date-field", {
    dateFormat: "d M, Y",
});

var checkAll = document.getElementById("checkAll");
if (checkAll) {
  checkAll.onclick = function () {
    var checkboxes = document.querySelectorAll('.form-check-all input[type="checkbox"]');
    var checkedCount = document.querySelectorAll('.form-check-all input[type="checkbox"]:checked').length;
    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].checked = this.checked;
      if (checkboxes[i].checked) {
          checkboxes[i].closest("tr").classList.add("table-active");
      } else {
          checkboxes[i].closest("tr").classList.remove("table-active");
      }
    }

    (checkedCount > 0) ? document.getElementById("remove-actions").style.display = 'none' : document.getElementById("remove-actions").style.display = 'block';
  };
}

var perPage = 8;

//Table
var options = {
    valueNames: [
        "id",
        "customer_name",
        "email",
        "country",
        "date",
        "invoice_amount",
        "status",
    ],
    page: perPage,
    pagination: true,
    plugins: [
        ListPagination({
            left: 2,
            right: 2,
        }),
    ],
};

// Init list
var invoiceList = new List("invoiceList", options).on(
    "updated",
    function (list) {
        list.matchingItems.length == 0 ?
            (document.getElementsByClassName("noresult")[0].style.display = "block") :
            (document.getElementsByClassName("noresult")[0].style.display = "none");
        var isFirst = list.i == 1;
        var isLast = list.i > list.matchingItems.length - list.page;
        // make the Prev and Nex buttons disabled on first and last pages accordingly
        document.querySelector(".pagination-prev.disabled") ?
            document.querySelector(".pagination-prev.disabled").classList.remove("disabled") : "";
        document.querySelector(".pagination-next.disabled") ?
            document.querySelector(".pagination-next.disabled").classList.remove("disabled") : "";
        if (isFirst) {
            document.querySelector(".pagination-prev").classList.add("disabled");
        }
        if (isLast) {
            document.querySelector(".pagination-next").classList.add("disabled");
        }
        if (list.matchingItems.length <= perPage) {
            document.querySelector(".pagination-wrap").style.display = "none";
        } else {
            document.querySelector(".pagination-wrap").style.display = "flex";
        }
        if (list.matchingItems.length == perPage) {
            document.querySelector(".pagination.listjs-pagination").firstElementChild.children[0].click();
        }
        if (list.matchingItems.length > 0) {
            document.getElementsByClassName("noresult")[0].style.display = "none";
        } else {
            document.getElementsByClassName("noresult")[0].style.display = "block";
        }
    }
);

isCount = new DOMParser().parseFromString(
    invoiceList.items.slice(-1)[0]._values.id,
    "text/html"
);

var isValue = isCount.body.firstElementChild.innerHTML;

var idField = document.getElementById("orderId"),
    customerNameField = document.getElementById("customername-field"),
    emailField = document.getElementById("email-field"),
    dateField = document.getElementById("date-field"),
    countryField = document.getElementById("country-field"),
    statusField = document.getElementById("delivered-status"),
    addBtn = document.getElementById("add-btn"),
    editBtn = document.getElementById("edit-btn"),
    removeBtns = document.getElementsByClassName("remove-item-btn"),
    editBtns = document.getElementsByClassName("edit-item-btn");
refreshCallbacks();
filterContact("All");

function filterContact(isValue) {
    var values_status = isValue;
    invoiceList.filter(function (data) {
        var statusFilter = false;
        matchData = new DOMParser().parseFromString(
            data.values().status,
            "text/html"
        );
        var status = matchData.body.firstElementChild.innerHTML;
        if (status == "All" || values_status == "All") {
            statusFilter = true;
        } else {
            statusFilter = status == values_status;
        }
        return statusFilter;
    });

    invoiceList.update();
}

function updateList() {
    var values_status = document.querySelector("input[name=status]:checked").value;
    data = userList.filter(function (item) {
        var statusFilter = false;
        if (values_status == "All") {
            statusFilter = true;
        } else {
            statusFilter = item.values().sts == values_status;
        }
        return statusFilter;
    });
    userList.update();
}

var table = document.getElementById("invoiceTable");
// save all tr
var tr = table.getElementsByTagName("tr");
var trlist = table.querySelectorAll(".list tr");

function SearchData() {
    var isstatus = document.getElementById("idStatus").value;
    var pickerVal = document.getElementById("datepicker-range").value;

    var date1 = pickerVal.split(" to ")[0];
    var date2 = pickerVal.split(" to ")[1];

    invoiceList.filter(function (data) {
        matchData = new DOMParser().parseFromString(
            data.values().status,
            "text/html"
        );
        var status = matchData.body.firstElementChild.innerHTML;
        var statusFilter = false;
        var dateFilter = false;

        if (status == "all" || isstatus == "all") {
            statusFilter = true;
        } else {
            statusFilter = status == isstatus;
        }

        if (new Date(data.values().date.slice(0, 12)) >= new Date(date1) && new Date(data.values().date.slice(0, 12)) <= new Date(date2)) {
            dateFilter = true;
        } else {
            dateFilter = false;
        }

        if (statusFilter && dateFilter) {
            return statusFilter && dateFilter;
        } else if (statusFilter && pickerVal == "") {
            return statusFilter;
        } else if (dateFilter && pickerVal == "") {
            return dateFilter;
        }
    });
    invoiceList.update();
}

function ischeckboxcheck() {
    Array.from(document.getElementsByName("chk_child")).forEach(function (x) {
        x.addEventListener("change", function (e) {
            if (x.checked == true) {
                e.target.closest("tr").classList.add("table-active");
            } else {
                e.target.closest("tr").classList.remove("table-active");
            }
  
            var checkedCount = document.querySelectorAll('[name="chk_child"]:checked').length;
            if (e.target.closest("tr").classList.contains("table-active")) {
                (checkedCount > 0) ? document.getElementById("remove-actions").style.display = 'block': document.getElementById("remove-actions").style.display = 'none';
            } else {
                (checkedCount > 0) ? document.getElementById("remove-actions").style.display = 'block': document.getElementById("remove-actions").style.display = 'none';
            }
        });
    });
}

function refreshCallbacks() {
    Array.from(removeBtns).forEach(function (btn) {
        btn.addEventListener("click", function (e) {
            e.target.closest("tr").children[1].innerText;
            itemId = e.target.closest("tr").children[1].innerText;
            var itemValues = invoiceList.get({
                id: itemId,
            });

            Array.from(itemValues).forEach(function (x) {
                deleteid = new DOMParser().parseFromString(x._values.id, "text/html");

                var isElem = deleteid.body.firstElementChild;
                var isdeleteid = deleteid.body.firstElementChild.innerHTML;
                if (isdeleteid == itemId) {
                    document.getElementById("delete-record").addEventListener("click", function () {
                        invoiceList.remove("id", isElem.outerHTML);
                        document.getElementById("deleteRecord-close").click();
                    });
                }
            });
        });
    });
}

document.querySelector("#invoiceList").addEventListener("click", function () {
    ischeckboxcheck();
});

function clearFields() {
    customerNameField.value = "";
    emailField.value = "";
    dateField.value = "";
    countryField.value = "";
}

document.querySelector(".pagination-next").addEventListener("click", function () {
    document.querySelector(".pagination.listjs-pagination") ?
        document.querySelector(".pagination.listjs-pagination").querySelector(".active") ?
        document.querySelector(".pagination.listjs-pagination").querySelector(".active").nextElementSibling.children[0].click() : "" : "";
});

document.querySelector(".pagination-prev").addEventListener("click", function () {
    document.querySelector(".pagination.listjs-pagination") ?
        document.querySelector(".pagination.listjs-pagination").querySelector(".active") ?
        document.querySelector(".pagination.listjs-pagination").querySelector(".active").previousSibling.children[0].click() : "" : "";
});

function ViewInvoice(data) {
    var invoice_no = data.getAttribute('data-id');
    localStorage.setItem("invoices-list", JSON.stringify(Invoices));
    localStorage.setItem("option", "view-invoice");
    localStorage.setItem("invoice_no", invoice_no);
    window.location.assign("invoices-details.html")
}

function EditInvoice(data) {
    var invoice_no = data.getAttribute('data-id');
    localStorage.setItem("invoices-list", JSON.stringify(Invoices));
    localStorage.setItem("option", "edit-invoice");
    localStorage.setItem("invoice_no", invoice_no);
    window.location.assign("invoices-create.html")
}

// Delete Multiple Records
function deleteMultiple() {
    ids_array = [];
    var items = document.getElementsByName('chk_child');
    for (i = 0; i < items.length; i++) {
        if (items[i].checked == true) {
            ids_array.push(items[i].value);
        }
    }
    
    if (typeof ids_array !== 'undefined' && ids_array.length > 0) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
            cancelButtonClass: 'btn btn-danger w-xs mt-2',
            confirmButtonText: "Yes, delete it!",
            buttonsStyling: false,
            showCloseButton: true
        }).then(function (result) {
            if (result.value) {
                for (i = 0; i < ids_array.length; i++) {
                    invoiceList.remove("id", `<a href="javascript:void(0);" onclick="ViewInvoice(this);" data-id="` + ids_array[i].slice(3) + `" class="fw-medium link-primary">${ids_array[i]}</a>`);
                }
                document.getElementById("remove-actions").style.display = 'none';
                document.getElementById("checkAll").checked = false;
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Your data has been deleted.',
                    icon: 'success',
                    confirmButtonClass: 'btn btn-info w-xs mt-2',
                    buttonsStyling: false
                });
            }
        });
    } else {
        Swal.fire({
            title: 'Please select at least one checkbox',
            confirmButtonClass: 'btn btn-info',
            buttonsStyling: false,
            showCloseButton: true
        });
    }
}