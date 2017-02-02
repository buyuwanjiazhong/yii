<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $month_id."月";?> <a href="	<?php echo yii\helpers\Url::to(['year/monthincome','month_id' => $month_id]);?>">收入</a> / 支出</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <table width="95%" border="1" style="text-align:center;">
                    <tr style="font-size:20px;">
                        <td>日期</td>
                        <td>物品</td>
                        <td>花费</td>
                    </tr>

                    <?php $total_zhichu = 0; foreach ($monthOutcome as $out) :?>
                    	<tr style="font-size:20px;">
                    		<?php 
                    			echo '<td>'.$out['day_id'].'</td>';
                    			echo '<td>'.$out['zhichu_xiang'].'</td>';
                    			echo '<td>'.$out['zhichu_yuan'].'</td>';
                    			$total_zhichu += $out['zhichu_yuan'];
                    		?>
                    	</tr>
                    <?php endforeach;?>
                    <tr style="font-size:20px;">
                    	<td>合计</td>
                    	<td></td>
                    	<td><?php echo $total_zhichu;?></td>
                    </tr>
                </table>
                <!-- /.row -->
            </div>

            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>