<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $month_id."月";?> 收入 / <a href="<?php echo yii\helpers\Url::to(['year/monthoutcome','month_id' => $month_id]);?>">支出</a></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>

            <table width="100%" border="1" style="text-align:center;">
                <tr style="font-size:16px;" >
                        <td>日期</td>
                    <?php foreach($menu as $name): ?>
                        <td><?php echo $name['cn'];?></td>
                    <?php endforeach;?>
                        <td>总计/元</td>   
                </tr>

                <?php
                    $sum_num = array();
                    $sum_bill = 0; 
                    foreach($monthIncome as $month): 
                ?>
                <tr style="font-size:16px;" >
                        <td><?php echo $month['day_id'];?></td>
                        <?php foreach($menu as $name): ?>
                            <td>
                                <?php 
                                    $mn = $name['en']."_num";
                                    echo $month[$mn];
                                    if (!isset($sum_num[$mn])) {
                                        $sum_num[$mn] = $month[$mn];
                                    } else {
                                        $sum_num[$mn] += $month[$mn];
                                    }
                                ?>
                            </td>
                        <?php endforeach;?>
                        <td>
                            <?php 
                                echo $month['total_bill'];
                                $sum_bill += $month['total_bill'];
                            ?>        
                        </td>
                </tr>
                <?php endforeach;?> 

                <tr style="font-size:16px;">
                    <td>合计</td>   
                    <?php foreach($menu as $name): ?>
                            <td>
                                <?php 
                                    $mn = $name['en']."_num";
                                    echo $sum_num[$mn];
                                ?>
                            </td>
                        <?php endforeach;?>
                    <td><?php echo $sum_bill;?></td> 
                </tr>
            </table>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>