<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="alertMsgBox" style="display: none"></div>
        <?php echo $content?>
        
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script type="text/javascript">
            var baseUrl = '<?php echo Yii::app()->baseUrl?>';
        </script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/app.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/custom.js"></script>
    </body>
</html>
