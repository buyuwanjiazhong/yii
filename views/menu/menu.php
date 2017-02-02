<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">菜单</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <table width="95%" border="1" style="text-align:center;">
                    <tr style="font-size:20px;">
                		<td>序号</td>
                		<td>品名</td>
                		<td>价格</td>
                	</tr>
                	<?php $c = 1; foreach ($menu as $m) :?>
                		<tr style="font-size:20px;">
                		<td><?php echo $c++; ?></td>
                		<td><?php echo $m['cn']; ?></td>
                		<td><?php echo round($m['price'],1); ?></td>
                	</tr>
                	<?php endforeach; ?>
                </table>
                <!-- /.row -->
            </div>
</div>