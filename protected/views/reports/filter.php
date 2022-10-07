<div class="btn-group">
    <a href="<?php echo Yii::app()->baseUrl?>/statistics/stats?type=days"><button type="button" class="<?php echo ($type=='days')?'active':''?> btn btn-danger waves-effect waves-light">
        <i class="bx bx-smile font-size-16 align-middle me-2"></i> By Days
    </button></a>
    <a href="<?php echo Yii::app()->baseUrl?>/statistics/stats?type=wabmaster"><button type="button" class="<?php echo ($type=='wabmaster')?'active':''?> btn btn-primary waves-effect waves-light">
        <i class="bx bx-smile font-size-16 align-middle me-2"></i> By Webmaster
    </button></a>
    <!-- <a href="<?php //echo Yii::app()->baseUrl?>/statistics/stats?type=campaigns"><button type="button" class="<?php //echo ($type=='camp')?'active':''?> btn btn-success waves-effect waves-light">
        <i class="bx bx-check-double font-size-16 align-middle me-2"></i> By Campaigns
    </button></a> -->
    <!-- <a href="<?php //echo Yii::app()->baseUrl?>/statistics/stats?type=ads"><button type="button" class="<?php //echo ($type=='ads')?'active':''?> btn btn-warning waves-effect waves-light">
        <i class="bx bx-error font-size-16 align-middle me-2"></i> By Ads
    </button></a> -->
</div>