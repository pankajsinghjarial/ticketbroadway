<?php
    /*  site  defined constants  */
    define("SITE_LINK","https://".$_SERVER['HTTP_HOST']);
    define("COMMON_URL","/superadmin");
    define("SITEURL","https://".$_SERVER['HTTP_HOST']);
    define("SITE_URL","https://".$_SERVER['HTTP_HOST'].COMMON_URL);
    define("BASEURL","https://".$_SERVER['HTTP_HOST'].COMMON_URL.'/');
    define("SITE_ABSOLUTE_PATH",$_SERVER['DOCUMENT_ROOT']);
    define('SITE_NAME',"GoGetInsurance.com.au");
    define('NOREPLY_EMAIL','webmaster@gogetinsurance.com.au');
    define('TB_AJAX_URL',"https://ticketsbroadway.com/wp-admin/admin-ajax.php");
    define('ADMIN_EMAIL','JimS@instrat.com.au');
    $countries = array("United States of America","Canada","United Kingdom","Argentina","Australia","Austria","Bahamas","Belgium","Belize","Bermuda","Bolivia","Brazil","Chile","China","Colombia","Costa Rica","Curaçao","Czech Republic","Denmark","Dominican Republic","Ecuador","El Salvador","Estonia","Finland","France","Germany","Greece","Guatemala","Guyana","Honduras","Hong Kong","Hungary","Iceland","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Latvia","Luxembourg","Malta","Mexico","Netherlands","New Zealand","Nicaragua","Norway","Panama","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Russia","South Africa","South Korea","Spain","Sweden","Switzerland","Taiwan","United Arab Emirates","Uruguay","US Virgin Islands","Vatican City","Venezuela");
    define('COUNTRIES_LIST',serialize($countries));
