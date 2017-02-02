$("#back-up").click(function(){

	var current_time = Number($(this).attr('current-time'));
	var last_backup_time = Number($(this).attr('last-backup-time'));
	var csrf = $(this).attr('csrf');

	if( current_time - last_backup_time < 600) {
		alert("备份时间间隔为10分钟");
		return false;
	}

	postData = {
		"create_time" : current_time,
		"_csrf" : csrf
		};

	url = "./index.php?r=backup/backup";
	$.post(url,postData,function(result){
		if(result.status == 1) {
			alert("已备份");
			location.href = "./index.php?r=backup/index";
		}

		if(result.status == 0) {
			alert("备份出错");
			location.href = "./index.php?r=backup/index";
		}
	},'JSON');

});