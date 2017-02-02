$("#add-zhichu").click(function(){
    location.href = "./index.php?r=index/createoutcome";
});

$(".every-zhichu-xiang").on('input propertychange',function(){
    
           
    var menu_name = $(this).attr('id');

});

$("#save-zhichu").click(function(){
    
    var data = $("#zhichu-form").serializeArray();
    postData = {};
    var zhichu_sum = 0;
    $(data).each(function(i){
        postData[i] = {
            "zhichu_id" : Number($("#"+this.name).attr('zhichu-id')),
            "zhichu_xiang" : this.value,
            "zhichu_yuan" : Number($("#"+this.name).val()),
        };
        zhichu_sum += Number($("#"+this.name).val());
    });
    //console.log(postData);
    $("#zhichu-sum").html("共 "+zhichu_sum+" 元");
    url = "./index.php?r=index/savezhichu";
    $.post(url,postData,function(result){

        },'JSON');
});

$(".xiaosu-zhichu-form #delete-zhichu").click(function(){
    var zhichu_id = $(this).val();
    postData = {"zhichu_id" : $(this).val() };
    url = "./index.php?r=index/deletezhichu";
    $.post(url,postData,function(result){
        location.href = "./index.php?r=index/outcome";
    },'JSON');
});