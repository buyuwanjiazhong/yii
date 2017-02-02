function zhuti_minus(){
    var zhuti = Number(document.getElementById("zhuti").value);
    
    zhuti = zhuti - 1;
    if(zhuti < 0){
        zhuti = 0;
    }
    document.getElementById("zhuti").value = zhuti;
    document.getElementById("zhuti-num").value = zhuti;
    document.getElementById("zhuti-price").value = zhuti * 35;
    
}
function zhuti_plus(){
    var zhuti = Number(document.getElementById("zhuti").value);
    zhuti = zhuti + 1;
    document.getElementById("zhuti").value = zhuti;
    document.getElementById("zhuti-num").value = zhuti;
    document.getElementById("zhuti-price").value = zhuti * 35;

}

function zhuti_num(){
    var zhuti = document.getElementById("zhuti-num").value;
    document.getElementById("zhuti-price").value = zhuti * 35;    
}

function zhuti_total(){
	var total = document.getElementById("zhuti-price");
	
}

function zhuti_pay_bill(){
    //猪蹄
    var zhuti_num = Number(document.getElementById("zhuti-num").value);
    var zhuti_total = Number(document.getElementById("zhuti-price").value);
    if (zhuti_total == 0) {
        document.getElementById("zhuti-total-bill").innerHTML="";
    } else {
        var str = "猪蹄"+zhuti_num+"个，"+zhuti_total+"元";
        document.getElementById("zhuti-total-bill").innerHTML = str;
    }
}

function zhuti(){
	return Number(document.getElementById("zhuti-price").value);
}