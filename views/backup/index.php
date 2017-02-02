<?php if (empty($backupInfo)) :?>

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo date("m月d日");?> 备份情况 / <a href="javascript:void(0);" id="back-up" current-time="<?php echo time();?>" create-time="1485794914" csrf="<?= Yii::$app->request->csrfToken;?>">还未备份，点击备份</a></h1>
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
                        <h1 class="page-header"><?php echo date("m月d日");?> 备份情况 / <a href="javascript:void(0);" id="back-up" current-time="<?php echo time();?>" last-backup-time='<?php echo $lastBackup["create_time"]?>' csrf='<?= Yii::$app->request->csrfToken;?>'>点击备份</a></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <table width="95%" border="1" style="text-align:center;">
                    <tr style="font-size:20px;" >
                        <td>序号(倒序)</td>
                        <td>备份时间</td>
                        <td>收入备份</td>
                        <td>支出备份</td>
                    </tr>
                    <?php foreach ($backupInfo as $info) : ?>
                        <tr style="font-size:20px;">
                            <?php echo '<td>'.$info['id'].'</td>';?>
                            <?php echo '<td>'.date("Y/m/d H:i:s",$info['create_time']).'</td>';?>
                            <?php echo '<td>'."备份至{$info["day_id"]},第{$info["order_id"]}订单".'</td>';?>
                            <?php echo '<td>'."备份总第{$info["zhichu_id"]}条目".'</td>';?>
                        </tr>
                    <?php endforeach;?>
                </table>
</div>

<?php endif; ?>

<script src="../views/index/sb/js/backup.js"></script>