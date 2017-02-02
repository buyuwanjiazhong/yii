

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo date("m月d日");?><a href="<?php echo yii\helpers\Url::to(['detail/income']);?>">收入</a> / 支出</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <table width="95%" border="1" style="text-align:center;">
                    <tr style="font-size:20px;" >
                        <td>单号</td>
                        <td>物品</td>
                        <td>花费</td>
                    </tr>
                    <?php
                        $total_zhichu = 0;
                        $list_id = 1;
                        foreach ($zhichu as $zc) : 
                    ?>
                        <tr style="font-size:20px;">
                            <td><?php echo $list_id++; ?></td>
                            <td><?php echo $zc['zhichu_xiang']; ?></td>
                            <td><?php echo $zc['zhichu_yuan'];
                            $total_zhichu+= $zc['zhichu_yuan']; ?></td>
                        </tr>
                    <?php endforeach;?>
                    <tr style="font-size:20px;" >
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
    <!-- /#wrapper -->