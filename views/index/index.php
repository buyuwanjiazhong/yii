<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>

<div id="page-wrapper">
    <div class="row">
    	<div class="col-lg-12">
            <h1 class="page-header"><?php echo date("m月d日")?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="<?php echo yii\helpers\Url::to(['index/outcome']);?>">填写支出</a></h1>
        </div>
<?php if($get_order_key == 0): ?>
		<div class="col-lg-12">
                	<h4>
                		<a href="javascript:void(0)" id="create-order-id" create-id="0" value="0"><p class="btn btn-outline btn-success">添加订单</p></a>
                		 <hr>
                	</h4>
                </div>
<?php else : ?>
        
                
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                	<h4>
                		<?php foreach($orders as $key => $order):?>
                		<?php if($get_order_key == $key) :?>
                			<a href="<?php echo yii\helpers\Url::to(['index/index', 'order-id' => $key]);?>"  order-id="<?php echo "order-".$key;?>" style="border:2px solid green;" value="<?php echo $key;?>" ><?php echo $order;?></a>
                		<?php else:?>
                			<a href="<?php echo yii\helpers\Url::to(['index/index', 'order-id' => $key]);?>"  order-id="<?php echo "order-".$key;?>" value="<?php echo $key;?>" ><?php echo $order;?></a>

                		<?php endif;?>
                		 <?php endforeach;?>
                		<a href="javascript:void(0)" id="create-order-id" create-id="0" value="0"><p class="btn btn-outline btn-success">添加订单</p></a>
                		 <hr>
                	</h4>
                </div>
                <div id="body">
	                <div id="body-left" class="col-lg-12" style="float:left;width:500px;">
		                	<?php foreach($menus as $menu): ?>
		                            <div>
									   <p style ="float:left;margin-right:5px;"><font size="4"><?php echo $menu['cn'];?></font></p>
									       <input type="button" btn-attr="minus"
									       menu-name='<?php echo $menu["en"];?>' menu-price='<?php echo $menu["price"];?>' value="-">
									     <input class="edit-order-num" id='<?php echo $menu["en"]."-num";?>' type="text" menu-price='<?php echo $menu["price"];?>' style="text-align:right;margin-right: 5px;" size="5"  value='<?php echo $order_info["{$menu["en"]}"."_num"];?>'>
									       <input type="button" btn-attr="plus" menu-name='<?php echo $menu["en"];?>' style="text-align:right;margin-right: 5px;" menu-price='<?php echo $menu["price"];?>' value="+">个
									       
									     
									     <input type="text" size="5" id="disabledInput" value='<?php echo $menu["price"];?>' style="background-color:#C8C8C8; border-color:#C8C8C8;text-align:right;margin-right: 5px;">
									     <input class="edit-order-bill" id='<?php echo $menu["en"]."-num-bill";?>' menu-price='<?php echo $menu["price"];?>' type="text" style="text-align:right;margin-right: 5px;" size="7" value='<?php echo $order_info["{$menu["en"]}"."_bill"];?>'>元
									     
									</div>
									<br>
							<?php endforeach;?>
	                </div>
	                <div id="body-right" class="col-lg-12" style="float:right;width:400px;">
	                	
	                		<input type="button" id="pay-bill" order-id='<?php echo $get_order_key;?>' class="btn btn-primary" value="结算"/>
	                	
	                	<div id="total-price" class="text">
	                		<form id="bill-form">
		                		<?php foreach($menus as $en => $cn): ?>
		                			<input type="hidden" name='<?php echo $en."_bill";?>' id='<?php echo $en."-num-bill-submit"?>' value='<?php echo $order_info["$en"."_bill"];?>'>
		                			<input type="hidden" name='<?php echo $en."_num";?>' id='<?php echo $en."-num-bill-totalnum"?>' value='<?php echo $order_info["$en"."_num"];?>'>
		                			<p id="<?php echo $en."-num-bill-total";?>"></p>
		                		<? endforeach;?>
		                		<h5 id="total-cost" value='<?php echo $order_info["total_bill"];?>'><?php echo $order_info["total_bill"];?></h5>
		                	</form>
		                	<br/><br/><br/>
		                	<button id="delete-order" type="button" class="btn btn-outline btn-primary" day-id='<?php echo date("Ymd");?>' value="<?php echo $get_order_key;?>">删除该订单</button>

	                	</div>
	            	</div>
                </div>    
            <?php endif;?>
        </div>                <!-- /.row -->
    </div>
    <!-- /#wrapper -->

	<script src="../views/index/sb/js/general.js"></script>
