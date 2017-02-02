        <!-- Page Content -->
        <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header"><?php echo date("m月d日")?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="<?php echo yii\helpers\Url::to(['index/index']);?>">填写收入</a></h1>
                	</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div id="body">
                    <div id="body-left" class="col-lg-12" style="float:left;width:500px;">
                    <button id="add-zhichu" type="button" class="btn btn-primary">添加支出栏目</button>
                    <br><br>
                        <form id="zhichu-form" class="xiaosu-zhichu-form">
                            <?php $i=1;foreach($zhichu as $zc) :?>
                                <?php echo $i++;?>
                                <input type="text" name='<?php echo "zhichu-".$zc['zhichu_id'];?>' value='<?php echo $zc["zhichu_xiang"];?>' />
                                <input type="text" id='<?php echo "zhichu-".$zc['zhichu_id'];?>' value='<?php echo $zc["zhichu_yuan"];?>' onclick="select()" zhichu-id='<?php echo $zc["zhichu_id"];?>'/>
                                <button id="delete-zhichu" type="button" class="btn btn-outline btn-primary btn-xs" value='<?php echo $zc['zhichu_id'];?>'>删除</button>
                                <br>
                            <?php endforeach;?>
                        </form>
                    </div>
                    <div id="body-right" class="col-lg-12" style="float:right;width:400px;">
                        <button id="save-zhichu" type="button" class="btn btn-primary">保存</button>

                            <h4 id="zhichu-sum"></h4>
                        

                </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="../views/index/sb/js/detail.js"></script>
    