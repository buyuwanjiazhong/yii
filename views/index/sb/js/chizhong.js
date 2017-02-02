function chizhong_minus(){
    var chizhong = Number(document.getElementById("chizhong").value);
    chizhong = chizhong - 1;
    
    if(chizhong < 0){
        chizhong = 0;
    }
    var chizhong11 = chizhong * 11;

    document.getElementById("chizhong").value = chizhong;
    document.getElementById("chizhong-num").value = chizhong11;
    var price = chizhong11 * 3.182;
    document.getElementById("chizhong-price").value = price.toFixed(1);
    
}
function chizhong_plus(){
    var chizhong = Number(document.getElementById("chizhong").value);
    chizhong = chizhong + 1;
    chizhong11 = chizhong * 11;
    document.getElementById("chizhong").value = chizhong;
    document.getElementById("chizhong-num").value = chizhong11;
    var price = chizhong11 * 3.182;
    document.getElementById("chizhong-price").value = price.toFixed(1);

}

function chizhong_num(){
    var chizhong = document.getElementById("chizhong-num").value;
    var price = chizhong * 3.182;
    document.getElementById("chizhong-price").value = price.toFixed(1);    
}

function chizhong_total(){
	var total = document.getElementById("chizhong-price");
	
}

function chizhong_pay_bill(){
    
    var chizhong_num = Number(document.getElementById("chizhong-num").value);
    var chizhong_total = Number(document.getElementById("chizhong-price").value);
    if (chizhong_total == 0) {
        document.getElementById("chizhong-total-bill").innerHTML="";
    } else {
        var str = "翅中"+chizhong_num+"个，"+chizhong_total+"元";
        document.getElementById("chizhong-total-bill").innerHTML = str;
    }
}

function chizhong(){
	var price = Number(document.getElementById("chizhong-price").value);
	return price.toFixed(1);
}