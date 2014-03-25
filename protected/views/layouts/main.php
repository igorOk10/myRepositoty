<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sb-admin.css" />  
  
        

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
  <div id="wrapper">

        <nav style="margin-bottom: 0" role="navigation" class="navbar navbar-default navbar-static-top">
        </nav>
      

        <nav role="navigation" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse">
                <ul id="side-menu" class="nav">
                   
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php">Главная</a>
                    </li>
                    <li>
                        <a href="#">Справочники<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                 <a href="#">Пользователи<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level collapse">
                                        <li>
                                             <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/create.php">Добавить пользователя<span class="fa arrow"></span></a>

                                        </li>
                                         <li>
                                             <a href="#">Просмотреть пользователей<span class="fa arrow"></span></a>

                                        </li>
                                       
                                    </ul>
                            </li>
                            <li>
                                 <a href="#">Товары<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level collapse">
                                            <li>
                                                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/tbgoods2/create">Добавить товар<span class="fa arrow"></span></a>

                                            </li>
                                             <li>
                                                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Tbgoods2">Просмотреть товары<span class="fa arrow"></span></a>

                                            </li>
                                        </ul>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#">Документы<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                 <a href="#">Приход<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level collapse">
                                        <li>
                                             <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/comin/view">Просмотреть приходные документы<span class="fa arrow"></span></a>
                                        </li>
                                         <li>
                                             <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/comin/create">Добавить приход<span class="fa arrow"></span></a>
                                        </li>
                                       
                                    </ul>
                            </li>
                            <li>
                                 <a href="#">Расход<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level collapse">
                                            <li>
                                                 <a href="#">Просмотреть расходные документы<span class="fa arrow"></span></a>

                                            </li>
                                             <li>
                                                 <a href="#">Добавить расход<span class="fa arrow"></span></a>

                                            </li>
                                        </ul>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Tbreg/index">Отчет по остаткам</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php">Выход</a>
                    </li>
                    
                    
                    
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->

        <!-- /#page-wrapper -->

    </div>
    
    <div id="page-wrapper">
        <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
 <?php echo $content; ?>
</div>
   
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/sb-admin.js"></script>

</body>
</html>
