<?php ///[yii2-adminlte-asset]plugins sample
namespace yongtiger\adminlteasset;

use yii\web\AssetBundle;

/**
 * AdminLte Plugins AssetBundle
 *
 * Note: This is a sample! You should write your own class as you need and register to the view:
 *
 * ```php
 * AdminLtePlugins::register($this);
 * ```
 *
 */
class AdminLtePlugins extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $css = [
        ///Comment out what plugins you want.
        ///@see \vendor\almasaeed2010\adminlte\plugins\
        // 'bootstrap-slider/slider.css',
        // 'bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        // 'colorpicker/bootstrap-colorpicker.min.css',
        // 'datatables/jquery.dataTables.min.css',
        // 'datepicker/datepicker3.css',
        // 'daterangepicker/daterangepicker.css',
        // 'fullcalendar/fullcalendar.min.css',
        // 'ionslider/ion.rangeSlider.css',
        // 'jvectormap/jquery-jvectormap-1.2.2.css',
        // 'morris/morris.css',
        // 'pace/pace.min.css',
        // 'select2/select2.min.css',
        // 'timepicker/bootstrap-timepicker.min.css',
    ];
    public $js = [
        ///Comment out what plugins you want.
        ///@see \vendor\almasaeed2010\adminlte\plugins\
        // 'bootstrap-slider/bootstrap-slider.js',
        // 'bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        // 'chartjs/Chart.min.js',
        // 'colorpicker/bootstrap-colorpicker.min.js',
        // 'datatables/jquery.dataTables.min.js',
        // 'datepicker/bootstrap-datepicker.js',
        // 'daterangepicker/daterangepicker.js',
        // 'fastclick/fastclick.min.js',
        // 'flot/jquery.flot.min.js',
        // 'fullcalendar/fullcalendar.min.js',
        // 'iCheck/icheck.min.js',
        // 'input-mask/jquery.inputmask.js',
        // 'ionslider/ion.rangeSlider.min.js',
        // 'jvectormap/jquery-jvectormap-1.2.2.min.js',
        // 'knob/jquery.knob.js',
        // 'morris/morris.min.js',
        // 'pace/pace.min.js',
        // 'select2/select2.full.min.js',
        // 'slimScroll/jquery.slimscroll.min.js',
        // 'sparkline/jquery.sparkline.min.js',
        // 'timepicker/bootstrap-timepicker.min.js',
    ];
    public $depends = [
        'yongtiger\adminlteasset\AdminLteAsset',
    ];
}
