<?php
/*
ini_set('display_errors',1);
require_once('genericLib.php');
$parameters = array();
$parameters['searchTerms']='NHL hockey';
$parameters['websiteConfigID']=20732;
$results = searchEvents($parameters);
echo '<h2>Search : baseball </h2><pre>';
print_r($results);
echo '</pre>';
die;*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-
transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!-- Copyright (c) 2013 Seatics Venue maps sample/test page "Default" configuration-->
<head>
<title>Seatics Venue Maps - Build 0103.0.0 Default layout sample page 2013-01-29 17:20</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="http://maps.seatics.com/mapsupport_0103PP_tn.js"> </script>
<script type="text/javascript" src="http://maps.seatics.com/swfobject_tn.js"></script>
<script type="text/javascript" src="http://maps.seatics.com/maincontrol_0103PP_tn.js"></script>
<link rel="Stylesheet" type="text/css" href="http://maps.seatics.com/mapsupport_0103PP_tn.css" />

<!-- script with parameters to pass to mainControl. -->
<style type='text/css'>
.ssc_versionPP {width:141226px;
height:1615px;
z-index:010342;
}
.ssc_onMapMsg {
font-family: Verdana;
font-size: 8pt;
text-align: center;
}
/* yymmdd version date */
/* hhmi version hour and minute
/* version build code */
/* =======================TG list header column entries ==========================*/
#ssc_listColHdr {
text-align: left;
}
.ssc_sortUpArrow, .ssc_sortDnArrow {
color: #4961E1;
}
.ssc_sortNoArrow {
color: #87CEFA;
}
/* for TG list header table */
.ssc_lhTable {
width: 100%;
table-layout: fixed;
border-spacing: 0; /* needed to override 2px 2px that comes from somewhere!! */
border-collapse: collapse;
border: 0px;
cursor: pointer;
font-family: Segoe UI;
font-size: 9pt;
color: #000000;
font-weight: bold;
background-color: #87CEFA;
padding: 0;
table-layout: fixed;
vertical-align: middle;
text-align: left;
margin: 0;
}
/* for TG list header columns */
.ssc_lhMark {
width: 4.5%;
text-align: center;
display: table-cell;
}
.ssc_lrMarkIcon {
cursor: default;
position: relative;
}
.ssc_lrMarkTooltipContainer {
max-width: 300px;
font-size: 10px;
}
.ssc_lhSec {
width: 27.9%;
text-align: left;
padding-left: 2px;
}
.ssc_lhRow {
width: 11%;
text-align: center;}
.ssc_lhQty {
width: 15.3%;
text-align: right;
padding-right: 0px;
}
.ssc_lhPri {
width: 19.1%;
text-align: right;
padding-right: 0px;
}
.ssc_lhDlv {
width: 15.5%;
text-align: right;
padding-right: 0px;
}
.ssc_lhBuy {
width: 11.7%;
}
/* =======================TG list row column entries ==========================*/
/* the table containing each TG's info */
.ssc_lrTable {
border-collapse: collapse;
table-layout: fixed;
width: 100%;
border: 0px;
border-spacing: 0;
padding: 0px;
margin: 0;
}
.ssc_lrMark, .ssc_lrSec, .ssc_lrRow, .ssc_lrQty, .ssc_lrQtyPlus1, .ssc_lrPri, .ssc_lrDlv, .ssc_lrBuy, .ssc_lrNotes,
.ssc_lrSlashedPri, .ssc_lrActualPri, .ssc_lrPriContainer {
font-family: Verdana;
font-size: 9pt;
background-color: inherit;
}
.ssc_lrMark {
width: 5%; /* column goes away if not tgMarks characters are supplied */
text-align: center;
border: 0;
padding: 0;
margin: 0;
display: table-cell;
}
.ssc_lrSec {
width: 27.9%;
text-align: left;
color: Maroon;
}
.ssc_lrRow {
width: 9.9%;
text-align: center;
color: Maroon;
}
.ssc_lrQty {
width: 14.3%;
text-align: right;
color: Maroon;
}
.ssc_lrQtyPlus1 {
width: 15.3%;
text-align: right;
color: Green;
font-weight: bold;
}
.ssc_lrPriContainer {
width: 17.1%;
text-align: center;
padding-right: 10px;
color: Maroon;
}
.ssc_lrSlashedPri {
text-align: center;
margin-right: -5px;
color: grey;
text-decoration: line-through;
}
.ssc_lrActualPri {
text-align: center;
margin-right: -5px;
color: Maroon;
}
.ssc_lrDlv {
width: 13.5%;
text-align: center;
color: Maroon;
padding: 3px 0;
}
.ssc_lrDlvOptIdIcon, .ssc_fltrDlvHintIdIcon {
width: 20px;
height: 11px;
display: block;
margin-left: auto;
margin-right: auto;
background-image: URL(https://maps.seatics.com/etkt_green_eticket_icon20x11_tn.png);
background-repeat: no-repeat;
}
.ssc_lrDlvOptIdIcon {
vertical-align: middle;
}
.ssc_lrDlvOptIdLabel, .ssc_fltrDlvHintIdLabel {
color: #008000;
font-family: Arial;
font-size: 11px;
font-weight: bold;
font-style: italic;
text-align: center;
}
.ssc_lrDlvOptEmIcon, .ssc_fltrDlvHintEmIcon {
width: 20px;
height: 12px;
display: block;
margin-left: auto;
margin-right: auto;
background: URL(https://maps.seatics.com/etkt_green_eticket_icon20x11_tn.png) no-repeat;
}
.ssc_lrDlvOptEmIcon {
vertical-align: middle;
}
.ssc_lrDlvOptLpIcon, .ssc_fltrDlvHintLpIcon {
width: 20px;
height: 12px;
display: none; /* 'block' to display, 'none' to hide */
margin-left: auto;
margin-right: auto;
background: URL(https://maps.seatics.com/etkt_blue_lticket_icon20x12_tn.png) no-repeat;
}
.ssc_lrDlvOptLpIcon {
vertical-align: middle;
}
.ssc_lrDlvOptLpLabel, .ssc_fltrDlvHintLpLabel {
color: #008;
font-family: Arial;
font-size: 12px;
font-weight: bold;
font-style: italic;
text-align: center;
display: none; /* 'block' to display, 'none' to hide */
}
.ssc_lrBuy {
width: 11.7%;
text-align: center;
vertical-align: middle;
padding-top: 8px;
height: 100%;
}
.ssc_lrBuyBtn {
width: 40px;
height: 20px;
font-family: Verdana;
font-size: 8pt;
margin-top: 0px;
vertical-align: middle;
cursor: pointer;
}
/* =================== Additions for Turn-down Notes - classes match those in 0105 =============== */
.ssc_lrNotesCell {
height: auto;
padding-right: 0 !Important;
}
.ssc_lrNotesFlag {
color: #989898;
font-size: 10pt;
visibility: hidden; /* starts off hidden; will be turned visible by code if Notes are long.*/
padding-right: 5px;
display: inline-block;
max-width: 5%;
vertical-align: top;
padding-right: 1%;
/*margin-top: -3px;*/
}
.ssc_lrNotesVal {
font-family: Arial;
color: #444;
font-size: 9pt !important;
padding: 0 0 0 2px;
text-align: justify;
}
.ssc_lrNotesEncl {
overflow: hidden;
text-overflow: ellipsis;
white-space: nowrap;
display: inline-block;
vertical-align: top;
width:94%;
}
/* =============================
TG list
row control entries ====================== */
/* covers for .ssc_lrOddOnMap, .ssc_lrEvenOnMap, .ssc_lrOddNotSel, .ssc_lrEvenNotSel, .ssc_lrOddOffMap,
.ssc_lrEvenOffMap, .ssc_lrOddOnMapParking, .ssc_lrOddOnMapHotels, .ssc_lrOddOnMapPasses, .ssc_lrOddOnMapPackages,
.ssc_lrEvenOnMapParking, .ssc_lrEvenOnMapHotels, .ssc_lrEvenOnMapPasses, .ssc_lrEvenOnMapPackages */
[class^="ssc_lrOdd"], [class^="ssc_lrEven"], .ssc_lrHilite {
padding-top: 1px;
padding-bottom: 1px;
vertical-align: middle;
border-collapse: collapse;
border-color: #AAAAAA;
border-width: 1px 0 0px 0;
border-style: solid none;
cursor: default;
}
.ssc_lrHasVFS {
cursor: pointer;
}
.ssc_lrOddOnMap {

background-color: #ddddff;
}
.ssc_lrEvenOnMap {
background-color: #ffffff;
}
.ssc_lrOddNotSel {
background-color: #d8d8d8;
}
.ssc_lrEvenNotSel {
background-color: #d0d0d0;
}
.ssc_lrOddOffMap {
background-color: #Fcdddd;
}
.ssc_lrEvenOffMap {
background-color: #FCaaaa;
}
/* ========================= Parking ===================================== */
.ssc_lrOddOnMapParking {
background-color: #ddddaa;
}
.ssc_lrEvenOnMapParking {
background-color: #ffffdd;
}
/* ========================= Hotels ===================================== */
.ssc_lrOddOnMapHotels {
background-color: #b2a3bb;
}
.ssc_lrEvenOnMapHotels {
background-color: #dacee1;
}
/* ========================= Passes ===================================== */
.ssc_lrOddOnMapPasses {
background-color: #97c77f;
}
.ssc_lrEvenOnMapPasses {
background-color: #d2eac6;
}
/* ========================= Packages ===================================== */
.ssc_lrOddOnMapPackages {
background-color: #f3d1a7;
}
.ssc_lrEvenOnMapPackages {
background-color: #edd9c1;
}
.ssc_lrHilite {
background-color: #EEEEBB;
}
/* =============================== TG list filter control ================================ */
/* - - - - - - - - - - - common text,etc definitiaons - - - - - - - - -*/
[id$="Intro"], [id$="Label"] {
font-size: 9pt;
font-weight: bold;
color: #444;
}
#ssc_filterHdr {
background-color: #87CEFA;
vertical-align: middle;
height: 21px;
padding-top: 4px;
width: 100%;
}
#ssc_filterHdrInvite {
font-size: 12px;
font-weight: bold;
color: #fff;
position: absolute;
top: 5px;
left: 5px;
}
#ssc_fltrResetEncl {
position: absolute;
top: 2px;
right: 5px;
}
#ssc_fltrResetBtn {
font-size: 9pt;
color: #fff;
}
#ssc_fltrResetBtn:hover {
color: #666;
}
/* ================== Filter Price controls ======================*/
#ssc_fltrPri {
width: auto;
height: 60px;
padding: 5px 0px 0px 5px;
vertical-align: top;
}
#ssc_fltrPriIntro {
display: block;
}
#ssc_fltrPriValues {
height: 25px;
display: block;
text-align: left;
}
#ssc_fltrPriMin, #ssc_fltrPriMax {
font-size: 8pt;
border: 1px solid #CCC;
}
#ssc_fltrPriMinMaxSep {
font-size: 9pt;
}
#ssc_fltrPriSelect {
display: block;
width: 120px;
position: relative;
left: 14px;
top: 3px;
}
.ssc_fltrPriCsBefore, .ssc_fltrPriCsAfter {
font-family: Arial;
font-size: 9pt;
}
/* =========================== Filter Quantity controls ============================= */
#ssc_fltrQty {
width: auto;
height: 60px;
padding: 5px 0 0 0;
vertical-align: top;
overflow: hidden;
}
#ssc_fltrQtyIntro {
display: block;
}
/* the position and size of the div containing the qty select box/pull-down */
#ssc_fltrQtySelectEncl {
display: block;
width: 58px;
height: 20px;
}
/* the font to be used for the display of the selected Qty */
#ssc_fltrQtySelect {
font-size: 9pt;
vertical-align: middle;
padding-bottom: 0px;
padding-top: 0;
border: 1px solid #CCC;
cursor: pointer;
}
/* the font to be used for the items in the qty pull-down when extended */
.ssc_fltrQtySelValues {
font-size: 12pt;
text-align: right;
padding-right: -2px;
}
#ssc_fltrQtyPlus1Encl {
font-size: 8pt;
text-decoration: none;
width: 90px;
cursor: pointer;
vertical-align: top;
visibility: visible; /* set to "hidden" to suppress display of plus1 offer. "visible" to allow it */
display: none;
}
.ssc_fltrHidden {
visibility: hidden !important;
}
/* used to override visible setting when conditions to show aren't met */
#ssc_fltrQtyShowPlus1, #ssc_showPlus1Label {
cursor: pointer;
}
/* Hint is just inside ssc_fiterDiv -- for position calculations */
#ssc_fltrQtyPlus1Hint {
background-color: #ffc;
border: 1px solid #ff0000;
display: none;
color: #000000;
font-family: Arial;
font-size: 9pt;
text-align: center;
position: absolute;
left: 0px;
top: 0px;
width: 100%;
z-index: 40;
}
/* ====================== filter type and Delivery header intro ====================== */
#ssc_fltrTypAndDlv {
padding: 5px 0 0 0;
vertical-align: top;
}
#ssc_fltrTypAndDlvIntroEncl {
text-align: center;
padding: 0;
border-collapse: collapse;
margin: 2px 0 -3px 0;
}
#ssc_filterDiv {
position: relative;
display: block;
width: 100%;
padding: 0px;
background-color: #f8f8f8;
color: #000;
text-align: left;
vertical-align: top;
font-family: Arial;
cursor: default; /* keeps from becoming insertion point over text fields*/
margin: 0;
height: 90px;
}
/* ================== Filter Type choice controls ======================*/
/* many of these class/id locators are built dynamically so may not be found with a search of the code */

#ssc_fltrTyp {
width: auto;
padding: 0;
vertical-align: top;
}
#ssc_fltrTypIntro {
vertical-align: top;
}
#ssc_fltrTypHintBtn {
vertical-align: top;
cursor: pointer;
}
#ssc_fltrTypPkng {
display: block;
position: relative;
vertical-align: top;
cursor: pointer;
}
#ssc_fltrTypPkngCkBx {
cursor: inherit;
}
#ssc_fltrTypPkngLabel {
font-size: 9pt;
font-weight: bold;
display: inline;
position: relative;
top: -2px;
cursor: inherit;
}
#ssc_fltrTypPckg {
display: block;
cursor: pointer;
}
#ssc_fltrTypPckgCkBx {
cursor: inherit;
}
#ssc_fltrTypPckgLabel {
display: inline;
position: relative;
top: -2px;
cursor: inherit;
}
.ssc_fltrTypPckgIcon {
width: 20px;
height: 11px;
background: URL(VIP_Icon_50x25.png) no-repeat scroll 0 0 transparent;
margin: 0 auto;
}
.ssc_fltrTypDisabled {
cursor: default !important;
color: #808080;
}
/* ================== Filter Delivery choice controls ======================*/
/* many of these class/id locators are built dynamically so may not be found with a search of the code */
#ssc_fltrDlv {
padding: 0;
width: auto;
vertical-align: top;
}
#ssc_fltrDlvIntro {
vertical-align: top;
height: 15px;
}
#ssc_fltrDlvHintBtn {
vertical-align: top;
cursor: pointer;
float: right;
}
#ssc_fltrDlvEtkt {
display: block; /* set to 'none' to hide the option */
position: relative;
vertical-align: top;
cursor: pointer;
}
#ssc_fltrDlvEtktCkBx {
cursor: inherit;
}
#ssc_fltrDlvEtktLabel {
font-size: 9pt;
font-weight: bold;
display: inline;
position: relative;
top: -2px;
cursor: inherit;
}
#ssc_fltrDlvEtktLabel:after {
content: URL(https://maps.seatics.com/etkt_green_eticket_icon20x12_tn.png);
}
#ssc_fltrDlvLclPu {
display: none; /* set to "none" to hide the option; "block" to show it */
cursor: pointer;
}
#ssc_fltrDlvLclPuCkBx {
cursor: inherit;
}
#ssc_fltrDlvLclPuLabel {
font-size: 9pt;
font-weight: bold;
display: inline;
position: relative;
top: -2px;
cursor: inherit;
}
#ssc_fltrDlvLclPuLabel:after {
content: URL(https://maps.seatics.com/etkt_blue_lticket_icon20x12_tn.png);
}
.ssc_fltrDlvLclPuIcon {
width: 20px;
height: 11px;
background: URL(https://maps.seatics.com/etkt_green_eticket_icon20x11_tn.png) no-repeat scroll 0 0 transparent;
margin: 0 auto;
}
.ssc_fltrDlvDisabled {
cursor: default !important;
color: #808080;
}
/* ==================== Filter Delivery method hint ============================= */
#ssc_fltrDlvHint {
cursor: pointer;
width: 300px;
}
#ssc_fltrDlvHintHdr {
width: 300px;
}
#ssc_fltrDlvHintHdrText {
font-size: 16px;
float: left;
font-weight: bold;
vertical-align: top;
}
#ssc_fltrDlvHintCloseText {
font-size: 12px;
font-weight: bold;
vertical-align: top;
text-align: right;
}
#ssc_fltrDlvHintCloseBtn:after {
vertical-align: middle;
content: URL(https://maps.seatics.com/etktcloseBtn_tn.png);
text-align: right;
}
/* ==== sytles for ALL filter delivery option rows ===== */
.ssc_fltrDlvHintSymbol {
vertical-align: top;
font-family: Arial;
font-size: 12px;
font-weight: bold;
font-style: italic;
color: #008000;
padding: 14px;
border: 0;
}
.ssc_fltrDlvHintDescr {
font-size: 11px;
vertical-align: top;
padding: 10px;
border: 0;
}
#ssc_fltrDlvHintEm {
display: table-row; /* set to 'table-row' to show eticket hint info; 'none' to hide */
}
#ssc_fltrDlvHintId {
display: table-row; /* set to 'table-row' to show instant download hint info; 'none' to hide */
}
#ssc_fltrDlvHintLp {
display: table-row; /* set to 'table-row' to show local pickup hint info; 'none' to hide */
}
#ssc_fltrDlvHintFtr {
width: 300px;
}
#ssc_fltrDlvHintFtrText {
font-size: 11px;
font-weight: normal;
vertical-align: top;
}
#ssc_filterUpdateCt {
width: 15px;
height: 20px;
font-family: Verdana;
font-size: 10pt;
color: #fff;
margin-top: 0px;
position: absolute;
left: 300px;
top: 5px;
}
#ssc_tktGroups {
height: 480px;
overflow-y: scroll !Important; /* imortant neede to keep scroll bar visible during vfs open/close */
overflow-x: hidden;
text-align: left;
cursor: default;
}
/* common settings for bucket headers ....BktHdrTxt*/
[class$="BktHdrTxt"] {
font-family: Verdana;
font-size: 11px;
width: 100%;
text-align: center;
height: auto;
color: #000000;
padding: 3px 0;
}
.ssc_notOnMapBktHdrTxt {
background-color: #FFAAAA;
}
.ssc_selectedBktHdrTxt {
background-color: #ddffdd;
}
.ssc_notSelBktHdrTxt {
background-color: #bbbbbb;
}
.ssc_noneInCritHdrTxt {
font-family: Verdana;
font-size: 8pt;
font-weight: bold;
background-color: #FFD700;
text-align: center;
height: auto;
padding: 2px 0;
width: 470px;
}
.ssc_selectedParkingBktHdrTxt {
background-color: #eeeecc;
}
.ssc_selectedHotelsBktHdrTxt {
background-color: #dacee1;
}
.ssc_selectedPackagesBktHdrTxt {
background-color: #edd9c1;
}
.ssc_selectedPassesBktHdrTxt {
background-color: #d2eac6;
}
#ssc_vfsDiv {border-color:#880000;
border-style:none;
border-collapse:collapse;
position:relative;
display:none;
overflow:hidden;
height:306px;
text-align:left;
top:0px;
left:0px;
}
#ssc_vfsTbl {background-color:#222222;
text-align:left;
vertical-align:middle;
border-style:none;
height:306px;
position:relative;}
/* set the image dimensions once here for all to benefit (except ssc_vfsHdr)*/
[id^="ssc_vfsImage"], [class^="ssc_vfsImage"] {
height: 306px;
width: 422px;
}
#ssc_vfsImage0, #ssc_vfsImage1 {
border-style: none;
padding: 0 0 0 0;
vertical-align: middle;
}
.ssc_vfsImage {
border-style: none;
padding: 0 0 0 0;
vertical-align: middle;
}
#ssc_vfsImageDiv0, #ssc_vfsImageDiv1 {
text-align: center;
vertical-align: middle;
overflow: hidden;
display: inline;
position: absolute;
top: 0px;
left: 29px;
}
#ssc_vfsImageCell {
text-align: center;
vertical-align: bottom;
background-color: #666666;
}
.ssc_vfsImageError {
font-family: Verdana;
color: #FFFFFF;
font-size: 12pt;
font-weight: bold;
text-align: center;
vertical-align: middle;
height: 100%;
width: 100%;
}
#ssc_vfsLeftArrow, #ssc_vfsRightArrow {
font-family: Verdana;
font-size: 18pt;
font-weight: bolder;
text-align: center;
color: #00cc00;
cursor: pointer;
text-decoration: none;
outline: none;
}
.ssc_vfsPanCell {
width: 29px;
}
#ssc_vfsHdr {
width: 422px;
position: absolute;
top: 0px;
left: 29px;
background-color: #333333;
opacity: 0.8;
filter: alpha(opacity=80);
}
#ssc_vfsCaption {
font-family: Verdana;
font-size: 10pt;
color: #ffffff;
text-align: left;
}
#ssc_vfsClose {
font-size: 12px;
font-family: Verdana,sans-serif;
color: #ffffff;
background-color: inherit;
border-style: none;
border-color: #ff0000;
border-width: 0px;
cursor: pointer;
}
#ssc_vfsClose:hover {
color: #888888;
}
.ssc_vfsEnable:before {
font-family: zzhold;
content: 'zzclick';
}
#ssc_tktListDiv {
position: relative;
top: 0px;
left: 0;
}
#ssc_filterAndListCell {
width: 480px;
}
#ssc_mapCell {text-align:center;
vertical-align:top;
width:525px;
height:525px;
}
.ssc_sectionHiliteColor {
color:#FFFF00;
}
.ssc_sectionInListColor {
color:#0C3;
}
.ssc_sectionNoSeatsColor {
color:#FFF;
}
.ssc_sectionNotInListColor {
color:#AFA;
}
.ssc_sectionSelectColor {
color:#F00;
}
#ssc_zonePopupContainer {
background-color:lime;
}

/* ============ css for the arrow on the mark tooltip popup ===============*/
.arrow {
bottom: -10px;
height: 10px;
margin-left: -2px;
overflow: hidden;
position: absolute;
width: 25px;
}
.arrow.top {
bottom: auto;
top: -10px;
}
.arrow.left {
left: auto;
}
.arrow:after {
box-shadow: 0 0 8px -1px rgba(100, 100, 100, 0.8) !important;
content: "";
height: 25px;
position: absolute;
top: -25px;
transform: rotate(45deg);
width: 25px;
}
.arrow.top:after {
bottom: -25px;
top: auto;
}
.ui-tooltip, .arrow:after {
background-color: rgba(255, 255, 255, 0.98);
border: 1px solid #dedede !important;
}






</style>
<script type="text/javascript">
var webParms = {
vfsEnable : 'hold',
showStdSectionNames: true,
swfMapURL
: "http://maps.seatics.com/FenwayPark_RedSox_2008-11-03 2010-09-01 1736Sample_tn.swf",
staticMapURL : "http://maps.seatics.com/FenwayPark_RedSox_2008-11-03 2010-09-01 1736Sample_tn.gif",
mapShellURL : "http://maps.seatics.com/MapShell_0102_tn.swf"
};
$(document).ready(
function() {
alert(ticGrps);
ssc.loadTgList(ticGrps,webParms);
ssc.sortTgList('price','asc'); // sort the list (before it's displayed!) in order of increasing
price
}
)
// sample override buyTickets function to show info that is available
ssc.EH.buyTickets = function (buyObj) {

alert(buyObj); alert('daedsa');
var t="",
coParms="";
for (var x in buyObj) {
t += String.fromCharCode(10) + x + ':' + buyObj[x]
}
coParms = 'e=' + buyObj.tgSds +
'&treq=' + buyObj.buyQty +
'&wcid=' + "<websiteID>" + '&SessionId=' + '<session id>' +
'&ah=' + buyObj.actionHistory
if (buyObj.mid) {
coParms += '&mid=' + buyObj.mid
}
alert ("This replaces checkout for this demo page. Buy Object properties:" + t +
String.fromCharCode(10) + 'Partial Checkout string:' + coParms)
}
</script>
<!-- end of script to set parameters and call mainControl -->
</head>
<body>
<!-- Begin main enclosing table -->
<table border="0" cellspacing="0" cellpadding="0" width="1000px">
<tr>
<td><p align="center">Sample Seatics Venue Maps "Default" Ticket List page -- Build 0103.0.0</p></td>
</tr>
<tr>

<td style="width:1000px"><div id="ssc_listAndMapDiv"></div></td>
</tr>
<!-- The following message, combo box and button provide a way to try different map/list options easily without
any coding. This MUST NOT BE INCLUDED IN ANY REAL WEB PAGES -->
<tr>
<td align="center"> Select an item from the list and click the "Send" button to try out different map
options</td>
</tr>
<tr><td align="center">
<input type="button" value="Send List this Option ==>" onclick="eval($('#listActions').val())" />
<select size="1" id="listActions">
<option value="alert('actionHistory='+ssc.actionHistory);" selected="selected">Display Action
History</option>
<option value="ssc.setOptions({showTGsNotOnMap:'merged'})">TGs not on map: MERGED IN LIST</option>
<option value="ssc.setOptions({showTGsNotOnMap:'bottom'})">TGs not on map: AT BOTTOM OF LIST</option>
<option value="ssc.setOptions({showTGsNotOnMap:'hidden'})">TGs not on map: HIDDEN</option>
<option value="ssc.setOptions({showTGsInNotSelectedSections:true})">TGs in UN-selected sections on map:
SHOW</option>
<option value="ssc.setOptions({showTGsInNotSelectedSections:false})">TGs in UN-selected sections on
map:HIDE</option>
<option value="ssc.setOptions({showListGroupHeaders:true})">Top list content descriptor: SHOW</option>
<option value="ssc.setOptions({showListGroupHeaders:false})">Top list content descriptor: HIDE</option>
<option value="ssc.setOptions({showDynamicMap:1})">Show Dynamic Map</option>
<option value="ssc.setOptions({showDynamicMap:0})">Show Static Map</option>
<option value="ssc.setOptions({showStdSectionNames:false})">Standard Section names: Disable</option>
<option value="ssc.setOptions({showStdSectionNames:true})">Standard Section names: Enable</option>
<option value="ssc.setOptions({addlListFilters:[]})">Addl List Filters: []</option>
<option value="ssc.setOptions({addlListFilters:['parking']})">Addl List Filters: [parking]</option>
<option value="ssc.setOptions({addlListFilters:['packages']})">Addl List Filters: [packages]</option>
<option value="ssc.setOptions({addlListFilters:['parking', 'packages']})">Addl List Filters:
[parking,packages]</option>
<option value="ssc.setOptions({showNotesAs:'turndown'})">showNotesAs: Turndown - default</option>
<option value="ssc.setOptions({showNotesAs:'text'})">showNotesAs: Text in Ticket Group</option>
<option value="ssc.setOptions({vfsEnable:'hold'})">VFS Enable: Hold</option>
<option value="ssc.setOptions({vfsEnable:'click'})">VFS Enable: Click</option>
<option value="ssc.setOptions({vfsEnable:0})">VFS Disable</option>
<option value="ssc.setOptions({sectionNotInListColor:'AAFFAA'})">sectionNotInList Color=LtGreen</option>
<option value="ssc.setOptions({sectionNotInListColor:'FFFFFF'})">sectionNotInList Color=White</option>
</select>
</td></tr></table>
</body>
</html>
