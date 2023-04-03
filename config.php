<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

// if($_POST['SourceForm']=='getRecordNo') error_reporting(0);
error_reporting(0);

session_start();

date_default_timezone_set('Asia/Calcutta');
ini_set('memory_limit', '-1');
ini_set('max_input_vars','100000');

$DOMAIN_NAME = 'http://localhost';
$DOMAIN_FOLDER = '/sbamos';

$SITE_LOC_PATH      = $DOMAIN_NAME.$DOMAIN_FOLDER;
$ROOT_PATH          = $_SERVER['DOCUMENT_ROOT'].$DOMAIN_FOLDER;
$MEDIA_FILES_ROOT   = $ROOT_PATH.'/uploadedfiles';
$MEDIA_FILES_SRC    = $SITE_LOC_PATH.'/uploadedfiles';
$STYLE_FILES_ROOT   = $ROOT_PATH.'/templates';
$STYLE_FILES_SRC    = $SITE_LOC_PATH.'/templates';
$QUERY_STRING_PATH  = $_SERVER['QUERY_STRING'];
$CURRENT_URL        = $_SERVER['REQUEST_URI'];
$REQUEST_METHOD     = strtoupper($_SERVER['REQUEST_METHOD']);

define("ROOT_PATH",         $ROOT_PATH);
define("MEDIA_FILES_ROOT",  $MEDIA_FILES_ROOT);
define("MEDIA_FILES_SRC",   $MEDIA_FILES_SRC);

define("SMS_GW_UN", 'dfsddfdsffdg');
define("SMS_GW_PW", 'sfsdfdsfdsf');

define("PAYMENT_GW_URL",    'https://api.sandbox.mangopay.com');
define("CLIENT_ID",         'sbamosnewsandbox');
define("API_KEY",           '4gy4Th4kqmxm3bm0xYdcJT2i4C28n4QzqChQ2rs8pq2Y8Mxouv');

//Defining Variable
define("DBHOST",        'localhost');
define("DBUSER",        'root');
define("DBPASSWORD",    '');
define("DBNAME",        'sbamos_site');
//Defining Variable

include ($ROOT_PATH.'/lib/class/site.class.php');
include ($ROOT_PATH.'/lib/class/general.class.php');
include ($ROOT_PATH.'/lib/includes/system.php');

include ($ROOT_PATH.'/lib/class/geo.plugin.class.php');
include ($ROOT_PATH.'/lib/class/ImageResize.php');
include ($ROOT_PATH.'/lib/class/pegination.class.php');

include ($ROOT_PATH.'/lib/functions/general.function.php');

include ($ROOT_PATH.'/lib/functions/FileUpload.php');

foreach($_REQUEST as $rqstKey=>$rqstVal){
    $$rqstKey = $rqstVal;
}
foreach($_POST as $postKey=>$postVal){
    $$postKey = $postVal;
}