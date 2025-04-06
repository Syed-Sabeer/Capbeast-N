/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Invoice Details init Js File
*/

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
    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
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

if ((localStorage.getItem("invoices-list") !== null) && (localStorage.getItem("option") !== null) && (localStorage.getItem("invoice_no") !== null)) {

    var invoices_list = localStorage.getItem("invoices-list");
    var options = localStorage.getItem("option");
    var invoice_no = localStorage.getItem("invoice_no");
    var invoices = JSON.parse(invoices_list);

    let viewobj = invoices.find(o => o.invoice_no === invoice_no);

    if ((viewobj != '') && (options == "view-invoice")) {
        let badge;
        switch (viewobj.status) {
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
        };

        document.getElementById("legal-register-no").innerHTML = viewobj.company_details.legal_registration_no;
        document.getElementById("email").innerHTML = viewobj.company_details.email;
        document.getElementById('website').href = viewobj.company_details.website;
        document.getElementById("website").innerHTML = viewobj.company_details.website;
        document.getElementById("contact-no").innerHTML = viewobj.company_details.contact_no;
        document.getElementById("address-details").innerHTML = viewobj.company_details.address;
        document.getElementById("zip-code").innerHTML = viewobj.company_details.zip_code;

        document.getElementById("invoice-no").innerHTML = viewobj.invoice_no;
        document.getElementById("invoice-date").innerHTML = str_dt(viewobj.date);
        document.getElementById("invoice-time").innerHTML = tConvert(viewobj.date);
        document.getElementById("payment-status").innerHTML = viewobj.status;
        document.getElementById("payment-status").classList.replace("bg-success-subtle text-success ", 'badge-soft-' + badge);
        document.getElementById("total-amount").innerHTML = viewobj.invoice_amount;

        document.getElementById("billing-name").innerHTML = viewobj.billing_address.full_name;
        document.getElementById("billing-address-line-1").innerHTML = viewobj.billing_address.address;
        document.getElementById("billing-phone-no").innerHTML = viewobj.billing_address.phone;
        document.getElementById("billing-tax-no").innerHTML = viewobj.billing_address.tax;

        document.getElementById("shipping-name").innerHTML = viewobj.shipping_address.full_name;
        document.getElementById("shipping-address-line-1").innerHTML = viewobj.shipping_address.address;
        document.getElementById("shipping-phone-no").innerHTML = viewobj.shipping_address.phone;

        document.getElementById("products-list").innerHTML = "";
        var paroducts_list = viewobj.prducts;
        var counter = 1;
        Array.from(paroducts_list).forEach(function (element) {
            product_data = `
                <tr>
                    <th scope="row">` + counter + `</th>
                    <td class="text-start">
                        <span class="fw-medium">` + element.product_name + `</span>
                        <p class="text-muted mb-0">` + element.product_details + `</p>
                    </td>
                    <td>` + element.rates + `</td>
                    <td>` + element.quantity + `</td>
                    <td class="text-end">$` + element.amount + `</td>
                </tr>`;
            document.getElementById("products-list").innerHTML += product_data;
            counter++;
        });
        var order_summary = `
            <tr class="border-top border-top-dashed mt-2">
                <td colspan="3"></td>
                <td colspan="2" class="fw-medium p-0">
                    <table class="table table-borderless text-start table-nowrap align-middle mb-0">
                        <tbody>
                            <tr>
                                <td>Sub Total</td>
                                <td class="text-end">$` + viewobj.order_summary.sub_total + `</td>
                            </tr>
                            <tr>
                                <td>Estimated Tax (12.5%)</td>
                                <td class="text-end">$` + viewobj.order_summary.estimated_tex + `</td>
                            </tr>
                            <tr>
                                <td>Discount <small class="text-muted">(VELZON15)</small></td>
                                <td class="text-end">- $` + viewobj.order_summary.discount + `</td>
                            </tr>
                            <tr>
                                <td>Shipping Charge</td>
                                <td class="text-end">$` + viewobj.order_summary.shipping_charge + `</td>
                            </tr>
                            <tr class="border-top border-top-dashed">
                                <th scope="row">Total Amount</th>
                                <td class="text-end">$` + viewobj.order_summary.total_amount + `</td>
                            </tr>
                        </tbody>
                    </table><!--end table-->
                </td>
            </tr>`;
        document.getElementById("products-list").innerHTML += order_summary;
        document.getElementById("payment-method").innerHTML = viewobj.payment_details.payment_method;
        document.getElementById("card-holder-name").innerHTML = viewobj.payment_details.card_holder_name;
        document.getElementById("card-number").innerHTML = viewobj.payment_details.card_number;
        document.getElementById("card-total-amount").innerHTML = viewobj.payment_details.total_amount;
        document.getElementById("note").innerHTML = viewobj.notes;
    }
}