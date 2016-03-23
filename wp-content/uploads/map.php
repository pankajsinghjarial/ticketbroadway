<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Boardway tickets</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/nouislider.min.css" rel="stylesheet">

<!--[if lt IE 9]-->
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<!--[endif]-->

</head>
<?php 
	
	$json = '[{"EventID":2660892,"FacePrice":"67.00","HighSeat":"113","ID":1684446877,"IsMine":false,"LowSeat":"103","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"95.00","Row":"H","TicketQuantity":11,"ValidSplits":{"int":[11,9,8,7,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"95.00","isMercury":true,"ActualPrice":"95.00","Section":"REAR MEZZANINE CENTER","WholesalePrice":"95.00"},{"EventID":2660892,"FacePrice":"67.00","HighSeat":"108","ID":1684446880,"IsMine":false,"LowSeat":"101","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"95.00","Row":"J","TicketQuantity":8,"ValidSplits":{"int":[8,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"95.00","isMercury":true,"ActualPrice":"95.00","Section":"REAR MEZZANINE CENTER","WholesalePrice":"95.00"},{"EventID":2660892,"FacePrice":"144.00","HighSeat":"8","ID":1691156962,"IsMine":false,"LowSeat":"1","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"144.00","Row":"H","TicketQuantity":8,"ValidSplits":{"int":[8,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"144.00","isMercury":false,"ActualPrice":"144.00","Section":"RMEZZ","WholesalePrice":"144.00"},{"EventID":2660892,"FacePrice":"163.00","HighSeat":"8","ID":1691156957,"IsMine":false,"LowSeat":"1","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"163.00","Row":"F","TicketQuantity":8,"ValidSplits":{"int":[8,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"163.00","isMercury":false,"ActualPrice":"163.00","Section":"MID MEZZ","WholesalePrice":"163.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"11","ID":1691680820,"IsMine":false,"LowSeat":"5","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"165.00","Row":"W","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"165.00","isMercury":true,"ActualPrice":"165.00","Section":"ORCHESTRA","WholesalePrice":"165.00"},{"EventID":2660892,"FacePrice":"188.00","HighSeat":"3","ID":1691156955,"IsMine":false,"LowSeat":"1","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"188.00","Row":"EE","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"188.00","isMercury":false,"ActualPrice":"188.00","Section":"FRONT MEZZ","WholesalePrice":"188.00"},{"EventID":2660892,"FacePrice":"188.00","HighSeat":"4","ID":1691156956,"IsMine":false,"LowSeat":"1","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"188.00","Row":"EE","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"188.00","isMercury":false,"ActualPrice":"188.00","Section":"FRONT MEZZ","WholesalePrice":"188.00"},{"EventID":2660892,"FacePrice":"200.00","HighSeat":"8","ID":1691156960,"IsMine":false,"LowSeat":"1","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"200.00","Row":"Q","TicketQuantity":8,"ValidSplits":{"int":[8,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"200.00","isMercury":false,"ActualPrice":"200.00","Section":"ORCHESTRA","WholesalePrice":"200.00"},{"EventID":2660892,"FacePrice":"200.00","HighSeat":"8","ID":1691156961,"IsMine":false,"LowSeat":"1","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"200.00","Row":"Q","TicketQuantity":8,"ValidSplits":{"int":[8,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"200.00","isMercury":false,"ActualPrice":"200.00","Section":"ORCHST","WholesalePrice":"200.00"},{"EventID":2660892,"FacePrice":"212.00","HighSeat":"2","ID":1691156952,"IsMine":false,"LowSeat":"1","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"212.00","Row":"B","TicketQuantity":2,"ValidSplits":{"int":2},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"212.00","isMercury":false,"ActualPrice":"212.00","Section":"FRONT MEZZ","WholesalePrice":"212.00"},{"EventID":2660892,"FacePrice":"212.00","HighSeat":"6","ID":1691156953,"IsMine":false,"LowSeat":"1","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"212.00","Row":"C","TicketQuantity":6,"ValidSplits":{"int":[6,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"212.00","isMercury":false,"ActualPrice":"212.00","Section":"FRONT MEZZ","WholesalePrice":"212.00"},{"EventID":2660892,"FacePrice":"212.00","HighSeat":"8","ID":1691156954,"IsMine":false,"LowSeat":"1","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"212.00","Row":"E","TicketQuantity":8,"ValidSplits":{"int":[8,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"212.00","isMercury":false,"ActualPrice":"212.00","Section":"FRONT MEZZ","WholesalePrice":"212.00"},{"EventID":2660892,"FacePrice":"212.00","HighSeat":"8","ID":1691156958,"IsMine":false,"LowSeat":"1","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"212.00","Row":"L","TicketQuantity":8,"ValidSplits":{"int":[8,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"212.00","isMercury":false,"ActualPrice":"212.00","Section":"ORCHESTRA","WholesalePrice":"212.00"},{"EventID":2660892,"FacePrice":"212.00","HighSeat":"8","ID":1691156959,"IsMine":false,"LowSeat":"1","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"212.00","Row":"L","TicketQuantity":8,"ValidSplits":{"int":[8,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"212.00","isMercury":false,"ActualPrice":"212.00","Section":"ORCHESTRA","WholesalePrice":"212.00"},{"EventID":2660892,"FacePrice":"1500.00","HighSeat":"*","ID":1654496804,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"232.00","Row":"","TicketQuantity":8,"ValidSplits":{"int":[8,7,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"232.00","isMercury":false,"ActualPrice":"232.00","Section":"Zone Premium","WholesalePrice":"232.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662802616,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"235.00","Row":"M","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"235.00","isMercury":false,"ActualPrice":"235.00","Section":"REAR-MEZZ","WholesalePrice":"235.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662802773,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"235.00","Row":"M","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"235.00","isMercury":false,"ActualPrice":"235.00","Section":"REAR-MEZZ","WholesalePrice":"235.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662802930,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"235.00","Row":"M","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"235.00","isMercury":false,"ActualPrice":"235.00","Section":"REAR-MEZZ","WholesalePrice":"235.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662803087,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"235.00","Row":"M","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"235.00","isMercury":false,"ActualPrice":"235.00","Section":"REAR-MEZZ","WholesalePrice":"235.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1688423156,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"235.00","Row":"","TicketQuantity":10,"ValidSplits":{"int":[10,9,8,7,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"235.00","isMercury":false,"ActualPrice":"235.00","Section":"ZONE A","WholesalePrice":"235.00"},{"EventID":2660892,"FacePrice":"1500.00","HighSeat":"*","ID":1654496772,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"237.00","Row":"","TicketQuantity":8,"ValidSplits":{"int":[8,7,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"237.00","isMercury":false,"ActualPrice":"237.00","Section":"Zone C","WholesalePrice":"237.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662800276,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"245.00","Row":"S","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"245.00","isMercury":false,"ActualPrice":"245.00","Section":"ORCH","WholesalePrice":"245.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662800433,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"245.00","Row":"S","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"245.00","isMercury":false,"ActualPrice":"245.00","Section":"ORCH","WholesalePrice":"245.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662800590,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"245.00","Row":"S","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"245.00","isMercury":false,"ActualPrice":"245.00","Section":"ORCH","WholesalePrice":"245.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662800747,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"245.00","Row":"K","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"245.00","isMercury":false,"ActualPrice":"245.00","Section":"CENTER-ORCH","WholesalePrice":"245.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662802459,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"245.00","Row":"K","TicketQuantity":5,"ValidSplits":{"int":[5,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"245.00","isMercury":false,"ActualPrice":"245.00","Section":"CENTER-ORCH","WholesalePrice":"245.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662610755,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"245.00","Row":"","TicketQuantity":10,"ValidSplits":{"int":[10,8,7,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"245.00","isMercury":false,"ActualPrice":"245.00","Section":"ZONE D","WholesalePrice":"245.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662799654,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"250.00","Row":"G","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"250.00","isMercury":false,"ActualPrice":"250.00","Section":"MEZZ","WholesalePrice":"250.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662799810,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"250.00","Row":"G","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"250.00","isMercury":false,"ActualPrice":"250.00","Section":"MEZZ","WholesalePrice":"250.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662799965,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"250.00","Row":"G","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"250.00","isMercury":false,"ActualPrice":"250.00","Section":"MEZZ","WholesalePrice":"250.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662800121,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"250.00","Row":"G","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"250.00","isMercury":false,"ActualPrice":"250.00","Section":"MEZZ","WholesalePrice":"250.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662610441,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"250.00","Row":"","TicketQuantity":10,"ValidSplits":{"int":[10,8,7,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"250.00","isMercury":false,"ActualPrice":"250.00","Section":"ZONE B","WholesalePrice":"250.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"111","ID":1660395550,"IsMine":false,"LowSeat":"103","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"253.00","Row":"H","TicketQuantity":9,"ValidSplits":{"int":[9,7,6,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"253.00","isMercury":false,"ActualPrice":"253.00","Section":"ORCHESTRA CENTER","WholesalePrice":"253.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662797448,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"255.00","Row":"J","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"255.00","isMercury":false,"ActualPrice":"255.00","Section":"CENTER-ORCH","WholesalePrice":"255.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662797605,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"255.00","Row":"J","TicketQuantity":6,"ValidSplits":{"int":[6,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"255.00","isMercury":false,"ActualPrice":"255.00","Section":"CENTER-ORCH","WholesalePrice":"255.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662799028,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"260.00","Row":"T","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"260.00","isMercury":false,"ActualPrice":"260.00","Section":"ORCH","WholesalePrice":"260.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662799184,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"260.00","Row":"T","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"260.00","isMercury":false,"ActualPrice":"260.00","Section":"ORCH","WholesalePrice":"260.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662799340,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"260.00","Row":"T","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"260.00","isMercury":false,"ActualPrice":"260.00","Section":"ORCH","WholesalePrice":"260.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662799497,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"260.00","Row":"T","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"260.00","isMercury":false,"ActualPrice":"260.00","Section":"ORCH","WholesalePrice":"260.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662798404,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"275.00","Row":"N","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"275.00","isMercury":false,"ActualPrice":"275.00","Section":"ORCH","WholesalePrice":"275.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662798561,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"275.00","Row":"N","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"275.00","isMercury":false,"ActualPrice":"275.00","Section":"ORCH","WholesalePrice":"275.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662798716,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"275.00","Row":"N","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"275.00","isMercury":false,"ActualPrice":"275.00","Section":"ORCH","WholesalePrice":"275.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662798872,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"275.00","Row":"N","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"275.00","isMercury":false,"ActualPrice":"275.00","Section":"ORCH","WholesalePrice":"275.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1691600950,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"280.00","Row":"H","TicketQuantity":5,"ValidSplits":{"int":[5,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"280.00","isMercury":true,"ActualPrice":"280.00","Section":"CENTER ORCH","WholesalePrice":"280.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1691600951,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"280.00","Row":"G","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"280.00","isMercury":true,"ActualPrice":"280.00","Section":"CENTER ORCH","WholesalePrice":"280.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662796977,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"290.00","Row":"P","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"290.00","isMercury":false,"ActualPrice":"290.00","Section":"CENTER-ORCH","WholesalePrice":"290.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662797134,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"290.00","Row":"P","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"290.00","isMercury":false,"ActualPrice":"290.00","Section":"CENTER-ORCH","WholesalePrice":"290.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662797291,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"290.00","Row":"P","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"290.00","isMercury":false,"ActualPrice":"290.00","Section":"CENTER-ORCH","WholesalePrice":"290.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662794773,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"300.00","Row":"H","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"300.00","isMercury":false,"ActualPrice":"300.00","Section":"ORCH","WholesalePrice":"300.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662794907,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"300.00","Row":"H","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"300.00","isMercury":false,"ActualPrice":"300.00","Section":"ORCH","WholesalePrice":"300.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662795040,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"300.00","Row":"H","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"300.00","isMercury":false,"ActualPrice":"300.00","Section":"ORCH","WholesalePrice":"300.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662795174,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"300.00","Row":"H","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"300.00","isMercury":false,"ActualPrice":"300.00","Section":"ORCH","WholesalePrice":"300.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662795445,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"300.00","Row":"D","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"300.00","isMercury":false,"ActualPrice":"300.00","Section":"FRONT-MEZZ","WholesalePrice":"300.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662795578,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"300.00","Row":"D","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"300.00","isMercury":false,"ActualPrice":"300.00","Section":"FRONT-MEZZ","WholesalePrice":"300.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662795712,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"300.00","Row":"D","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"300.00","isMercury":false,"ActualPrice":"300.00","Section":"FRONT-MEZZ","WholesalePrice":"300.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662795847,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"300.00","Row":"G","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"300.00","isMercury":false,"ActualPrice":"300.00","Section":"CENTER-MEZZ","WholesalePrice":"300.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662795982,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"300.00","Row":"G","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"300.00","isMercury":false,"ActualPrice":"300.00","Section":"CENTER-MEZZ","WholesalePrice":"300.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662796115,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"300.00","Row":"G","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"300.00","isMercury":false,"ActualPrice":"300.00","Section":"CENTER-MEZZ","WholesalePrice":"300.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662796697,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"300.00","Row":"D","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"300.00","isMercury":false,"ActualPrice":"300.00","Section":"FRONT-MEZZ","WholesalePrice":"300.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662796855,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"300.00","Row":"G","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"300.00","isMercury":false,"ActualPrice":"300.00","Section":"CENTER-MEZZ","WholesalePrice":"300.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1648367543,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"312.00","Row":"AA-R","TicketQuantity":6,"ValidSplits":{"int":[6,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"312.00","isMercury":false,"ActualPrice":"312.00","Section":"ORCH","WholesalePrice":"312.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662792261,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"315.00","Row":"M","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"315.00","isMercury":false,"ActualPrice":"315.00","Section":"CENTER-ORCH","WholesalePrice":"315.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662792418,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"315.00","Row":"M","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"315.00","isMercury":false,"ActualPrice":"315.00","Section":"CENTER-ORCH","WholesalePrice":"315.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662792575,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"315.00","Row":"M","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"315.00","isMercury":false,"ActualPrice":"315.00","Section":"CENTER-ORCH","WholesalePrice":"315.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662792732,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"315.00","Row":"M","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"315.00","isMercury":false,"ActualPrice":"315.00","Section":"CENTER-ORCH","WholesalePrice":"315.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662791700,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"340.00","Row":"K","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"340.00","isMercury":false,"ActualPrice":"340.00","Section":"CENTER-ORCH","WholesalePrice":"340.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662791839,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"340.00","Row":"K","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"340.00","isMercury":false,"ActualPrice":"340.00","Section":"CENTER-ORCH","WholesalePrice":"340.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662791976,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"340.00","Row":"K","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"340.00","isMercury":false,"ActualPrice":"340.00","Section":"CENTER-ORCH","WholesalePrice":"340.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662792114,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"340.00","Row":"K","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"340.00","isMercury":false,"ActualPrice":"340.00","Section":"CENTER-ORCH","WholesalePrice":"340.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662791564,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"345.00","Row":"S","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"345.00","isMercury":false,"ActualPrice":"345.00","Section":"orch-left","WholesalePrice":"345.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662794567,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"345.00","Row":"S","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"345.00","isMercury":false,"ActualPrice":"345.00","Section":"orch-left","WholesalePrice":"345.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662611218,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"350.00","Row":"C","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"350.00","isMercury":false,"ActualPrice":"350.00","Section":"CENTER-MEZZ","WholesalePrice":"350.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662611572,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"350.00","Row":"C","TicketQuantity":4,"ValidSplits":{"int":[4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"350.00","isMercury":false,"ActualPrice":"350.00","Section":"mezz-front center","WholesalePrice":"350.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662611729,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"350.00","Row":"C","TicketQuantity":3,"ValidSplits":{"int":[3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"350.00","isMercury":false,"ActualPrice":"350.00","Section":"mezz-front center","WholesalePrice":"350.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662611886,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"350.00","Row":"C","TicketQuantity":4,"ValidSplits":{"int":[4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"350.00","isMercury":false,"ActualPrice":"350.00","Section":"CENTER-MEZZ","WholesalePrice":"350.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662789564,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"360.00","Row":"T","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"360.00","isMercury":false,"ActualPrice":"360.00","Section":"orch-right","WholesalePrice":"360.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662789721,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"360.00","Row":"T","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"360.00","isMercury":false,"ActualPrice":"360.00","Section":"orch-right","WholesalePrice":"360.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662791289,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"360.00","Row":"T","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"360.00","isMercury":false,"ActualPrice":"360.00","Section":"orch-right","WholesalePrice":"360.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662789407,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"375.00","Row":"N","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"375.00","isMercury":false,"ActualPrice":"375.00","Section":"orch-right","WholesalePrice":"375.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"109","ID":1664976291,"IsMine":false,"LowSeat":"103","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"375.00","Row":"D","TicketQuantity":7,"ValidSplits":{"int":[7,5,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"375.00","isMercury":false,"ActualPrice":"375.00","Section":"ORCHESTRA CENTER","WholesalePrice":"375.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662788843,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"390.00","Row":"H","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"390.00","isMercury":false,"ActualPrice":"390.00","Section":"CENTER-ORCH","WholesalePrice":"390.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662788980,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"390.00","Row":"H","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"390.00","isMercury":false,"ActualPrice":"390.00","Section":"CENTER-ORCH","WholesalePrice":"390.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662789255,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"390.00","Row":"H","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"390.00","isMercury":false,"ActualPrice":"390.00","Section":"CENTER-ORCH","WholesalePrice":"390.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662794506,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"390.00","Row":"H","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"390.00","isMercury":false,"ActualPrice":"390.00","Section":"CENTER-ORCH","WholesalePrice":"390.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662782491,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"400.00","Row":"H","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"400.00","isMercury":false,"ActualPrice":"400.00","Section":"orch-right","WholesalePrice":"400.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662784780,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"400.00","Row":"H","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"400.00","isMercury":false,"ActualPrice":"400.00","Section":"orch-right","WholesalePrice":"400.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662784919,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"400.00","Row":"N","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"400.00","isMercury":false,"ActualPrice":"400.00","Section":"orch-left","WholesalePrice":"400.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662785056,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"400.00","Row":"N","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"400.00","isMercury":false,"ActualPrice":"400.00","Section":"orch-left","WholesalePrice":"400.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662785194,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"400.00","Row":"H","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"400.00","isMercury":false,"ActualPrice":"400.00","Section":"orch-left","WholesalePrice":"400.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662785345,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"400.00","Row":"G","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"400.00","isMercury":false,"ActualPrice":"400.00","Section":"mezz-front center","WholesalePrice":"400.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662785636,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"400.00","Row":"G","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"400.00","isMercury":false,"ActualPrice":"400.00","Section":"mezz-front center","WholesalePrice":"400.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662788245,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"400.00","Row":"G","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"400.00","isMercury":false,"ActualPrice":"400.00","Section":"mezz-front center","WholesalePrice":"400.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662788385,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"400.00","Row":"D","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"400.00","isMercury":false,"ActualPrice":"400.00","Section":"mezz-front right","WholesalePrice":"400.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662788543,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"400.00","Row":"D","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"400.00","isMercury":false,"ActualPrice":"400.00","Section":"mezz-front right","WholesalePrice":"400.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662788700,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"400.00","Row":"D","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"400.00","isMercury":false,"ActualPrice":"400.00","Section":"mezz-front right","WholesalePrice":"400.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1648367527,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"402.00","Row":"A-D","TicketQuantity":6,"ValidSplits":{"int":[6,4,3,2,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"402.00","isMercury":false,"ActualPrice":"402.00","Section":"MEZZ","WholesalePrice":"402.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662782077,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"445.00","Row":"F","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"445.00","isMercury":false,"ActualPrice":"445.00","Section":"CENTER-ORCH","WholesalePrice":"445.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662782216,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"445.00","Row":"F","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"445.00","isMercury":false,"ActualPrice":"445.00","Section":"CENTER-ORCH","WholesalePrice":"445.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662611415,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"450.00","Row":"EE","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"450.00","isMercury":false,"ActualPrice":"450.00","Section":"CENTER-ORCH","WholesalePrice":"450.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662612235,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"450.00","Row":"EE","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"450.00","isMercury":false,"ActualPrice":"450.00","Section":"CENTER-ORCH","WholesalePrice":"450.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662612826,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"500.00","Row":"A","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"500.00","isMercury":false,"ActualPrice":"500.00","Section":"CENTER-MEZZ","WholesalePrice":"500.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662613023,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"500.00","Row":"A","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"500.00","isMercury":false,"ActualPrice":"500.00","Section":"CENTER-MEZZ","WholesalePrice":"500.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662779272,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"515.00","Row":"F","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"515.00","isMercury":false,"ActualPrice":"515.00","Section":"CENTER-ORCH","WholesalePrice":"515.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662779390,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"515.00","Row":"F","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"515.00","isMercury":false,"ActualPrice":"515.00","Section":"CENTER-ORCH","WholesalePrice":"515.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662779506,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"515.00","Row":"F","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"515.00","isMercury":false,"ActualPrice":"515.00","Section":"CENTER-ORCH","WholesalePrice":"515.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662782353,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"515.00","Row":"F","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"515.00","isMercury":false,"ActualPrice":"515.00","Section":"CENTER-ORCH","WholesalePrice":"515.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662794331,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"515.00","Row":"F","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"515.00","isMercury":false,"ActualPrice":"515.00","Section":"CENTER-ORCH","WholesalePrice":"515.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662778684,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"750.00","Row":"D","TicketQuantity":1,"ValidSplits":{"int":1},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"750.00","isMercury":false,"ActualPrice":"750.00","Section":"CENTER-ORCH","WholesalePrice":"750.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662778801,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"750.00","Row":"D","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"750.00","isMercury":false,"ActualPrice":"750.00","Section":"CENTER-ORCH","WholesalePrice":"750.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662778919,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"750.00","Row":"D","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"750.00","isMercury":false,"ActualPrice":"750.00","Section":"CENTER-ORCH","WholesalePrice":"750.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662781890,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"750.00","Row":"D","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"750.00","isMercury":false,"ActualPrice":"750.00","Section":"CENTER-ORCH","WholesalePrice":"750.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662612432,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"950.00","Row":"B","TicketQuantity":4,"ValidSplits":{"int":[4,2]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"950.00","isMercury":false,"ActualPrice":"950.00","Section":"CENTER-ORCH","WholesalePrice":"950.00"},{"EventID":2660892,"FacePrice":"0","HighSeat":"*","ID":1662612629,"IsMine":false,"LowSeat":"*","Marked":false,"Notes":"","ParentCategoryID":0,"Rating":5,"RatingDescription":"Not Yet Rated","RetailPrice":"950.00","Row":"B","TicketQuantity":3,"ValidSplits":{"int":[3,1]},"TicketGroupType":"Event Ticket","currencyTypeAbbr":"USD","convertedActualPrice":"950.00","isMercury":false,"ActualPrice":"950.00","Section":"CENTER-ORCH","WholesalePrice":"950.00"}]';
	
	

?>

<script type='text/javascript'>
function ticket(tixID,tixQuantityArr, price, section, notes, row, type, status) {
			this.ID = tixID; 
			this.tixQuantityArr = tixQuantityArr;
			this.price = price;
			this.section = section;
			this.notes = notes;
			this.row = row;
			this.type = type;
			this.status = true;
			this.tixQuantity = tixQuantityArr[tixQuantityArr.length - 1];
			this.ChangeStatus = function(tixQuant, lowerPrice, higherPrice){
									  var flagTix = true;
									  var flagPrice = true;
									  
									  if(typeof tixQuantityArr == 'object' ){
									  var exists = tixQuantityArr.indexOf(Number(tixQuant));
									  }else{
										if(tixQuantityArr == tixQuant){
											exists = 1; 										
										}else{
										    exists = -1;
										}
									  }
									  if(exists<0){
										flagTix = false;
									  }else{
										flagTix = true;
										this.tixQuantity = tixQuantityArr[exists];  
									  }
									  var tixPrice = this.price;
									  if(tixPrice >=lowerPrice && tixPrice <=higherPrice)
									  {
										  flagPrice = true; 
									  }else{
										   flagPrice = false; 
									  }
									  
									  if(flagTix && flagPrice){
										this.status = true;  
									  }else{
										this.status = false;  
									  }
									  
								} 
		}
var tickets = JSON.parse('<?php echo $json;?>');;
var ticketsarray=[];
for(i=0;i<tickets.length;i++){
		var tixID = tickets[i].ID;
		var price = tickets[i].ActualPrice;
		var section = tickets[i].Section;
		var row = tickets[i].Row;
		var notes = tickets[i].Notes;
		var type = tickets[i].TicketGroupType;
		var vs = tickets[i].ValidSplits;
		var arrvs = Object.keys(vs).map(function(k) { return vs[k] });
		var tixQuantityArr =arrvs[0];
		newticket = new ticket(tixID,tixQuantityArr, price, section, notes, row, type, status);
		ticketsarray[ticketsarray.length] = newticket; 
		
}

</script>

		
		



<body>
<section class="top-head">
  <div class="container">
    <div class="row">
      <div class="col-md-6"> <img src="images/logo.png" class="img-responsive"> </div>
      <div class="col-md-6"> <img src="images/right-logo.png" class="img-responsive img-right"> </div>
    </div>
  </div>
</section>
<section class=" ">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12 border-top-1"> </div>
        <!-- col-md-12 border-top-1 -->
        <div class="col-md-12 border-top-3 ">
          <div class="text-right">
            <p><i class="fa fa-phone"></i> 1-844-2SEESHOW</p>
          </div>
        </div>
        <!-- col-md-12 border-top-2  --> 
      </div>
      <!-- col-md-12 --> 
    </div>
    <!-- row --> 
  </div>
  <!-- container --> 
</section>
<section class="checkout-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12"> 
        <!-- Nav tabs -->
        <ol class = "breadcrumb">
          <li><a href = "#">Home</a></li>
          <li class = "active">Choose Seat</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-1 no-padding">
          <h1 class="day">TUE</h1>
          <div class="col-md-12 no-padding date-border">
            <h2 class="date">Jan 22,2016</h2>
            <h3 class="time">2.00 PM</h3>
          </div>
        </div>
        <div class="col-md-6">
          <h1 class="choose-seat-heading">Aladdin</h1>
          <p class="para">New Amsterdam Theatre at New York, NY</p>
        </div>
        <div class="col-md-5 no-padding choose-top-right">
          <ul class="list-unstyled">
            <li class="different-li"><i class="fa fa-caret-left"></i>
              <h2>200% Worry-Free Guarantee</h2>
            </li>
            <li><i class="fa fa-check"></i>
              <h2>We are a resale marketplace, not the ticket seller.</h2>
            </li>
            <li><i class="fa fa-check"></i>
              <h2>Prices are set by third-party sellers and may be above or below face value.</h2>
            </li>
            <li><i class="fa fa-check"></i>
              <h2>Your seats are together unless otherwise noted.</h2>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-12 col-xs-12 no-padding">
        <div class="col-md-2 col-xs-12 choose-right-border">
          <select class="form-control" name='TicketQuantity' id="ticketQuantity">
            <option>Any Quantity</option>
             <?php for($i=1;$i<=5;$i++){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
             <?php } ?>
             <option value="6">6+</option>
          </select>
        </div>
        <div class="col-md-4 col-xs-12 choose-right-border">
          <div class="col-md-12 col-xs-12 all-range-sec no-padding">
            <div class="col-md-3 col-xs-12 no-padding">
              <h1 class="range-price">
              price Range </div>
            <div class="col-md-1 col-xs-12 no-padding">
              <output id="range">$66</output>
            </div>
            <div class="col-md-6 col-xs-12 no-padding">
              <div class="slider-range">
               </div>
            </div>
            <div class="col-md-2 col-xs-12 no-padding">
              <output id="range">$310</output>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-xs-12 ticket-only choose-right-border">
          <div class="checkbox">
            <label> E-Tickets Only
              <input type="checkbox">
            </label>
          </div>
        </div>
        <div class="col-md-2 col-xs-12 choose-tickte choose-right-border">
          <select class="form-control">
            <option>Any-ticket type</option>
            <option></option>
            <option></option>
            <option></option>
            <option></option>
          </select>
        </div>
        <div class="col-md-2 col-xs-12 choose-filters ">
          <button class="btn btn-default">Reset Filters</button>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="map-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="col-xs-1 hidden-md hidden-lg">
          <button class="icon-btn"><i class="fa fa-plus"></i></button>
          <br>
          <button class="icon-btn btn-2"><i class="fa fa-minus"></i></button>
        </div>
        <div class="col-md-7"> <img src="images/map-img.png" class="img-responsive"> </div>
        <div class="col-md-6 col-md-offset-6 legenda-btn hidden-lg hidden-md text-right">
          <button class="btn btn-default"> Show map Legenda <i class="fa fa-angle-up"></i></button>
        </div>
        <div class="col-md-1 hidden-xs hidden-sm">
          <button class="icon-btn"><i class="fa fa-plus"></i></button>
          <br>
          <button class="icon-btn btn-2"><i class="fa fa-minus"></i></button>
        </div>
        <div class="col-md-4 col-xs-12 chose-map-right-content no-padding">
          <div class="col-md-12 col-xs-12 choose-tick-sec no-padding">
            <div class="col-md-4  col-xs-4 no-padding">
              <div class="col-md-12 col-xs-12 choose-right-border no-padding">
                <div class="col-md-10 col-xs-10">
                  <h1 class="choose-right-any"><span>Quantity</span></h1>
                  <h2 class="choose-right-any">Any Quantity</h2>
                </div>
                <div class=" "> <i class="fa fa-angle-down"></i> </div>
              </div>
            </div>
            <div class="col-md-4 col-xs-4 no-padding">
              <div class="col-md-12 col-xs-12 choose-right-border no-padding">
                <div class="col-md-10 col-xs-10">
                  <h1 class="choose-right-any"><span>Price Range</span></h1>
                  <h2 class="choose-right-any">$42-$782</h2>
                </div>
                <div class=" "> <i class="fa fa-angle-down"></i> </div>
              </div>
            </div>
            <div class="col-md-4 col-xs-4 no-padding">
              <div class="col-md-12 col-xs-12 no-padding">
                <div class="col-md-10 col-xs-10">
                  <h1 class="choose-right-any"><span>Ticket Type</span></h1>
                  <h2 class="choose-right-any">Any Type</h2>
                </div>
                <div class=" "> <i class="fa fa-angle-down"></i> </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-xs-12 no-padding text-center ">
            <p class="low-to-high">Sort by Price - <span>Low to High <i class="fa fa-angle-down"></i></span></p>
          </div>
          <!--accordion-->
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="col-md-12 col-xs-12 right-content-1st-box right-content-box no-padding panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="col-md-9 col-xs-8">
                  <h5>Zone D</h5>
                  <h5><span>1-10 FLeX Tickets</span></h5>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5>$434/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
                </a> </div>
              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <div class="panel-contain"> <b>Note:</b> <br>
                    Balcony, Rows L-T. . Tickets will be ready for delivery by Apr 08, 2017.Your seats are together unless otherwise noted
                    <div class="select-sxn"> <span class="">Quantity</span>
                      <select>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-xs-12 right-content-2st-box right-content-box no-padding panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <div class="col-md-9 col-xs-8">
                  <h5>Zone C</h5>
                  <h5><span>1-10 FLeX Tickets</span></h5>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5>$505/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
                </a> </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                  <div class="panel-contain"> <b>Note:</b> <br>
                    Balcony, Rows L-T. . Tickets will be ready for delivery by Apr 08, 2017.Your seats are together unless otherwise noted
                    <div class="select-sxn"> <span class="">Quantity</span>
                      <select>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-xs-12 right-content-3st-box right-content-box no-padding panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <div class="col-md-9 col-xs-8">
                  <h5>Zone B</h5>
                  <h5><span>1-10 FLeX Tickets</span></h5>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5>$583/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
                </a> </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                  <div class="panel-contain"> <b>Note:</b> <br>
                    Balcony, Rows L-T. . Tickets will be ready for delivery by Apr 08, 2017.Your seats are together unless otherwise noted
                    <div class="select-sxn"> <span class="">Quantity</span>
                      <select>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-xs-12 right-content-4st-box right-content-box no-padding  panel panel-default">
              <div class="panel-heading" role="tab" id="headingFour"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                <div class="col-md-9 col-xs-8">
                  <h5>Zone A</h5>
                  <h6><span>1-10 FLeX Tickets</span></h6>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5>$661/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
                </a> </div>
              <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
                  <div class="panel-contain"> <b>Note:</b> <br>
                    Balcony, Rows L-T. . Tickets will be ready for delivery by Apr 08, 2017.Your seats are together unless otherwise noted
                    <div class="select-sxn"> <span class="">Quantity</span>
                      <select>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-xs-12 right-content-5st-box right-content-box no-padding  panel panel-default">
              <div class="panel-heading" role="tab" id="headingFive"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                <div class="col-md-9 col-xs-8">
                  <h5>Zone Premium</h5>
                  <h5><span>1-10 FLeX Tickets</span></h5>
                </div>
                <div class="col-md-3 col-xs-4">
                  <h5>$782/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
                </div>
                </a> </div>
              <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="panel-body">
                  <div class="panel-contain"> <b>Note:</b> <br>
                    Balcony, Rows L-T. . Tickets will be ready for delivery by Apr 08, 2017.Your seats are together unless otherwise noted
                    <div class="select-sxn"> <span class="">Quantity</span>
                      <select>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!--accordion--> 
          </div>
          <div class="col-md-12 col-xs-12 choose-pass text-center">
            <p>Parking Passes(Not valid for entry to event)</p>
          </div>
          <div class="col-md-12 col-xs-12 right-content-6st-box right-content-box no-padding">
            <div class="col-md-9 col-xs-8">
              <h5>249-253 W.43rd St.</h5>
              <h5> <span> Row PARKING ONLY - 0.2 mi away.1-27</span></h5>
            </div>
            <div class="col-md-3 col-xs-4">
              <h5>$42/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
            </div>
          </div>
          <div class="col-md-12 col-xs-12 choose-pass text-center">
            <p>Other offers</p>
          </div>
          <div class="col-md-12 col-xs-12 right-content-6st-box right-content-box no-padding">
            <div class="col-md-9 col-xs-8">
              <h5>MEZZANINE</h5>
              <h5><span>Raw A-L . 1-8 E-Tickets</span></h5>
            </div>
            <div class="col-md-3 col-xs-4">
              <h5>$479/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
            </div>
          </div>
          <div class="col-md-12 col-xs-12 right-content-6st-box right-content-box no-padding">
            <div class="col-md-9 col-xs-8">
              <h5>ORCHESTRA</h5>
              <h5><span>Row A-L. 1-8 E-Tickets</span></h5>
            </div>
            <div class="col-md-3 col-xs-4">
              <h5>$598/<span>ea</span> <i class="fa fa-angle-right hidden-xs"></i></h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-md-offset-6 legenda-btn hidden-xs hidden-sm">
          <button class="btn btn-default"> Show map Legenda <i class="fa fa-angle-up"></i></button>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="copy-right">
  <div class="container">
    <div class="row">
      <div class="text-center">
        <p>&copy 2015 Tickets Broadway. All rights reserved</p>
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/nouislider.min.js"></script> 
<script type="text/javascript">
/*
        var button1 = document.getElementById('update-1'),
          button2 = document.getElementById('update-2');

        function updateSliderRange ( min, max ) {
          updateSlider.noUiSlider.updateOptions({
            range: {
              'min': min,
              'max': max
            }
          });
        }
          
        button1.addEventListener('click', function(){
          updateSliderRange(20, 50);
        });

        button2.addEventListener('click', function(){
          updateSliderRange(10, 40);
        });
*/


$(document).ready(function(){
	
	 /*
	 $(".slider-range").slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( ".amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
      stop: function(event, ui){
			
		}
    });
    
    $( ".amount" ).val( "$" + $( ".slider-range" ).slider( "values", 0 ) + " - $" + $( ".slider-range" ).slider( "values", 1 ) );
	*/
	 $(".slider-range").html("sgsdgsdgdf");
	
	//var arr=[4,3,2,1];
	//alert(arr);
	//existance = arr.indexOf('4');
	//alert(existance);
	
		/*$('div > div').each(function() {
			$(this).prependTo(this.parentNode);
		});
		*/
	$.fn.reverseChildren = function() {
	  return this.each(function(){
		var $this = $(this);
		$this.children().each(function(){ $this.prepend(this) });
	  });
	};
	$('#accordion').reverseChildren();
	
	$("#ticketQuantity").change(function(){
		
		
		
		var tixQuant = $(this).val();
		//console.log(tixQuant);
		//alert(ticketsarray);
		//console.log(ticketsarray);
		//tixQuant, lowerPrice, higherPrice
		for(k=0; k<ticketsarray.length;k++ ) {
			//alert(ticketsarray[k].status);
			//alert(tixQuant);
			ticketsarray[k].ChangeStatus(tixQuant,0,10000);
			
			  // Will stop running after "three"
			  //return ( val !== "three" );
		};
		
		console.log(ticketsarray);
		//console.log($( ".slider-range" ).slider( "values", 0 ));
		//console.log($( ".slider-range" ).slider( "values", 0 ));
		
	});
	
	
	});

</script>
</body>
</html>
