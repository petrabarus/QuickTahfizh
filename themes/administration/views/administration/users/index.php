<?php

/* @var $this UsersController */
/* @var $dataProvider \CActiveDataProvider */

$this->widget('zii.widgets.grid.CGridView', array(
    'columns' => array(
        'id',
        'username',
        'fullName',
        'email',
        'createdTime',
    ),
    'dataProvider' => $dataProvider,
    'htmlOptions' => array(
        'class' => 'table table-striped table-bordered bootstrap-datatable datatable dataTable',
    )
));

?>