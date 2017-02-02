$("#get-order-id").click(function(){
    var id = $(this).attr('order-id');
    alert(id);return false;
    var url = SCOPE.edit_url + '&id=' + id;
    window.location.href=url;
});


$("#create-order-id").click(function(){

    var id = $(this).attr('create-id');
    postData = {};
    url = "./index.php?r=index/createorder";
    $.post(url,postData,function(result){
    	if(result.status == 1) {
    		location.href = "./index.php?r=index/index";
    	} else {
    		alert("添加失败");
    		//location.href = "./index.php?r=index/index";
    	}
    },"JSON");
});


$(":button").on('click',function(){
	var menu_name = $(this).attr('menu-name');
	var btn_attr = $(this).attr('btn-attr');
	var menu_price = $(this).attr('menu-price');

	var nums = Number($("#"+menu_name+"-num").val());
	var mul;
	switch (menu_name) {
		case ("dazhuti"): mul = 1; break;
		case ("jizhua"): mul = 10; break;
		case ("chizhong"): mul =  11; break;
		case ("xiaozhuti"): mul = 1; break;
		case ("chijian"): mul = 1; break;
		case ("chigen"): mul =  10; break;
		case ("zhutifan"): mul = 1; break;
		case ("chijianfan"): mul = 1; break;
		case ("chizhongfan"): mul =  1; break;
		case ("chigenfan"): mul = 1; break;
		case ("yinliao"): mul = 1; break;
		case ("hongbaolai"): mul =  1; break;
		case ("mifan"): mul =  1; break;
	}

	if (btn_attr == 'minus') {
		if (nums > 0){
			$("#"+menu_name+"-num").val(nums - mul);
		}
	}

	if (btn_attr == 'plus') {
		    $("#"+menu_name+"-num").val(nums + mul);
	}

	var total_nums = Number($("#"+menu_name+"-num").val());

	var total_bill = total_nums * menu_price;
	if ((total_bill - parseInt(total_bill)) != 0) {
		total_bill = total_bill.toFixed(1);
	}
	$("#"+menu_name+"-num-bill").val(total_bill);
	$("#"+menu_name+"-num-bill-submit").val(total_bill);
	$("#"+menu_name+"-num-bill-totalnum").val(total_nums);
});


$(".edit-order-num").on('input propertychange',function(){
				
    var menu_name = $(this).attr('id');
    var num = Number($("#"+menu_name).val());
    var price = $(this).attr('menu-price');
    var total = (num * price);
    if ((total - parseInt(total)) != 0) {
    	total = total.toFixed(1);
    }
    $("#"+menu_name+"-bill").val(total);
    $("#"+menu_name+"-bill-submit").val(total);
    $("#"+menu_name+"-bill-totalnum").val(num);
});

$(".edit-order-bill").on('input propertychange',function(){
				
	var menu_name = $(this).attr('id');
    var bill = Number($("#"+menu_name).val());
    $("#"+menu_name+"-submit").val(bill);
});

$("#pay-bill").click(function(){
	var data = $("#bill-form").serializeArray();
	postData = {};
	var total_bill = 0;
	$(data).each(function(i){
		postData[this.name] = Number(this.value);
		if (this.name.indexOf("_num") != -1) {
			return true;
		}
		total_bill += Number(this.value);
	});
	postData['order_id'] = $(this).attr('order-id');
	postData['total_bill'] = total_bill;
	//postData['status'] = 1;
	//console.log(postData);
	$("#total-cost").html("总计："+total_bill+" 元");

	url = "./index.php?r=index/totalbill";
	$.post(url,postData,function(result){},'JSON');

});

$("#delete-order").click(function(){
	var order_id = $(this).val();
	var day_id = $(this).attr('day-id');
	var statu = confirm("确认删除 "+order_id+" 号订单？");
        if(!statu){
            return false;
        } else {
        	postData = {"order_id" : order_id, "day_id" : day_id};
        	url = "./index.php?r=index/deleteorder";
			$.post(url,postData,function(result){},'JSON');
        }
        location.href = "./index.php?r=index/index";
});