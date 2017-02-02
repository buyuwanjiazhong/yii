$("#order-minus").click(function(){
	var zhuti = Number(document.getElementById("zhuti").value);
    
    zhuti = zhuti - 1;
    if(zhuti < 0){
        zhuti = 0;
    }
    document.getElementById("zhuti").value = zhuti;
    document.getElementById("zhuti-num").value = zhuti;
    document.getElementById("zhuti-price").value = zhuti * 35;
});