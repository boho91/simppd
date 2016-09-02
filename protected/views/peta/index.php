<aside class="right-side">
<section class="content-header">
<h2>Peta Penyebaran Usulan Musrenbang Kota</h2>
<div id='content-window'></div>
</section>
<section class="content">
<?php 
Yii::import('ext.egmap.*');
 
$gMap = new EGMap();
$gMap->setGoogleApiKey("AIzaSyCElR1GL1mWYlaR5DtgobMwg15NamQ_9lY");
$gMap->zoom = 3;
$mapTypeControlOptions = array(
  'position'=> EGMapControlPosition::LEFT_BOTTOM,
  'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
);
 
$gMap->mapTypeControlOptions= $mapTypeControlOptions;
 
$gMap->setCenter(2.9602561,99.0652734);
 
 
// enabling marker clusterer just for fun
// to view it zoom-out the map
$gMap->enableMarkerClusterer(new EGMapMarkerClusterer());
$gMap->enableKMLService('http://disdiksamosir.org/laporan_harian/kml/kecamatan.kml',Yii::app()->createUrl("kegiatanMusrenbangKota/resumeMusrenbang"));

$gMap->renderMap();
?>
</section>
</aside>
<style type="text/css">
.labels {
   color: red;
   background-color: white;
   font-family: "Lucida Grande", "Arial", sans-serif;
   font-size: 10px;
   font-weight: bold;
   text-align: center;
   width: 40px;     
   border: 2px solid black;
   white-space: nowrap;
}
</style>
