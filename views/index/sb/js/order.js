function pay_bill(){
    zhuti_pay_bill();
    jizhua_pay_bill();
    chizhong_pay_bill();
    var total_price = parseInt(zhuti()) + parseInt(jizhua()) + parseFloat(chizhong());

    var str = "总计："+ total_price +"元";
    document.getElementById("all-total-bill").innerHTML = str;
}
