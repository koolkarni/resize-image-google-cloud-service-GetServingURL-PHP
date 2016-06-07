<?php
//var_dump($_FILES['uploaded_files']['tmp_name']);
syslog(LOG_WARNING, "Request came");
require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;
syslog(LOG_WARNING, "Imported Cloud Storage Tools");
//var_dump( $_GET);
$object_url=$_GET["image"];
$size=intval($_GET["size"]);
syslog(LOG_WARNING, "Object URL $object_url");
syslog(LOG_WARNING, "Size $size");

$bucket="gs://YOUR-PROJECT-I.appspot.com/bucket_name/";
$object_image_url = CloudStorageTools::getImageServingUrl($object_url,['size' => $size, 'crop' => false]);
syslog(LOG_WARNING, "Output Url $object_image_url");
header("location: $object_image_url");

closelog();
?>
