<?php if (empty($income)): ?>

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo date("m月d日");?> 收入 / <a href="<?php echo yii\helpers\Url::to(['detail/outcome']);?>">支出</a></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
</div>

<?php else: ?>
 

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo date("m月d日");?> 收入 / <a href="<?php echo yii\helpers\Url::to(['detail/outcome']);?>">支出</a></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <table width="95%" border="1" style="text-align:center;">
    		<tr style="font-size:20px;" >
    				<td>单号</td>
    			<?php foreach($menu as $name): ?>
    				<td><?php echo $name['cn']?></td>
				<?php endforeach;?>
					<td>总计/元</td>	
    		</tr>
    		<?php 
    			$sum_bill = 0.0;
    			$sum_num = array();
    		?>
    		<?php foreach($income as $oid => $in): ?>
    			<tr>
    			
    			<?php
    				$oid += 1;
    				echo "<td>{$oid}</td>"; 

    				foreach ($menu as $m) {
    					while(list($key, $name) = each($m)) {
    						if ($key == "en") {
    							$name_num =  $name."_num";
    							echo '<td>'."$in[$name_num]".'</td>';
    							if (array_key_exists($name,$sum_num)) {
    								$sum_num[$name] += $in[$name_num];

    							} else {
    								$sum_num[$name] = $in[$name_num];
    								
    							}
    						}
    					}
    				}
    				echo '<td>'.$in['total_bill'].'</td>';
	    			$sum_bill += $in['total_bill'];
	    			
    			?>
    			</tr>
    		<?php endforeach;?>
    			<tr>
    				<td>合计</td>
    			<?php foreach($menu as $name): ?>
    				<td><?php echo $sum_num[$name['en']]?></td>
				<?php endforeach;?>
					<td><?php echo $sum_bill;?></td>	
    			</tr>
    	</table>
        </div>
        <!-- /#page-wrapper -->
        
        
    </div>
    <!-- /#wrapper -->
<? endif;?>