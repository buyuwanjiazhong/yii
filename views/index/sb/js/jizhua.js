function jizhua_minus(){
    var jizhua = Number(document.getElementById("jizhua").value);
    jizhua = jizhua - 1;
    
    if(jizhua < 0){
        jizhua = 0;
    }
    var jizhua10 = jizhua * 10;

    document.getElementById("jizhua").value = jizhua;
    document.getElementById("jizhua-num").value = jizhua10;
    document.getElementById("jizhua-price").value = jizhua10 * 3;
    
}
function jizhua_plus(){
    var jizhua = Number(document.getElementById("jizhua").value);
    jizhua = jizhua + 1;
    jizhua10 = jizhua * 10;
    document.getElementById("jizhua").value = jizhua;
    document.getElementById("jizhua-num").value = jizhua10;
    document.getElementById("jizhua-price").value = jizhua10 * 3;

}

function jizhua_num(){
    var jizhua = document.getElementById("jizhua-num").value;
    document.getElementById("jizhua-price").value = jizhua * 3;    
}

function jizhua_total(){
	var total = document.getElementById("jizhua-price");
	
}

function jizhua_pay_bill(){
    
    var jizhua_num = Number(document.getElementById("jizhua-num").value);
    var jizhua_total = Number(document.getElementById("jizhua-price").value);
    if (jizhua_total == 0) {
        document.getElementById("jizhua-total-bill").innerHTML="";
    } else {
        var str = "鸡爪"+jizhua_num+"个，"+jizhua_total+"元";
        document.getElementById("jizhua-total-bill").innerHTML = str;
    }
}

function jizhua(){
	return Number(document.getElementById("jizhua-price").value);
}