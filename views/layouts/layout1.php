<?php
	function thisDay()
	{
		date_default_timezone_set('Asia/Shanghai');

    	$date = date("m月d日 G:i:s",time());
    	$date .= "&nbsp&nbsp&nbsp";
    	$da = date("w"); 
		if( $da == "1" ){ 
			$da = "周一"; 
		}else if( $da == "2" ){ 
			$da = "周二"; 
		}else if( $da == "3" ){ 
			$da = "周三"; 
		}else if( $da == "4" ){ 
			$da = "周四"; 
		}else if( $da == "5" ){ 
			$da = "周五"; 
		}else if( $da == "6" ){ 
			$da = "周六"; 
		}else if( $da == "0" ){ 
			$da = "周日"; 
		}
		return $date.$da;
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>小苏麻麻私房猪蹄</title>

    <!-- Bootstrap Core CSS -->
    <link href="../views/index/sb/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../views/index/sb/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../views/index/sb/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../views/index/sb/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../views/index/sb/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand">小苏麻麻私房猪蹄&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
                	echo thisDay();
                ?>
                	
                </a>
            </div>
            <!-- /.navbar-header -->

           

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo yii\helpers\Url::to(['dashboard/index']);?>">欢迎</a>
                        </li>
                        <li>
                            <a href="./index.php">今日订单</a>
                        </li>
                        <li>
                            <a href="<?php echo yii\helpers\Url::to(['detail/income']);?>">本日明细</a>
                        </li>
                        <li>
                            <a href="<?php echo yii\helpers\Url::to(['year/index']);?>">分月账单</a>
                        </li>
                        <li>
                            <a href="<?php echo yii\helpers\Url::to(['menu/index']);?>">菜单</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    <script src="../views/index/sb/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../views/index/sb/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../views/index/sb/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../views/index/sb/vendor/raphael/raphael.min.js"></script>
    <script src="../views/index/sb/vendor/morrisjs/morris.min.js"></script>
    <script src="../views/index/sb/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../views/index/sb/dist/js/sb-admin-2.js"></script>
    

<?php echo $content;?>
<!-- jQuery -->
    

</body>

</html>
