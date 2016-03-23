/**
 * Amazon Login - Login for WordPress
 *
 * @category    Amazon
 * @package     Amazon_Login
 * @copyright   Copyright (c) 2015 Amazon.com
 * @license     http://opensource.org/licenses/Apache-2.0  Apache License, Version 2.0
 */
function r(f){/in/.test(document.readyState)?setTimeout('r('+f+')',9):f()}
r(function(){
    var formTargetIDs = ['amazonBtnL','amazonBtnM','amazonBtnLR','amazonBtnLRM','amazonBtnLC'];
    var idx;
    for (idx = 0; idx < formTargetIDs.length; ++idx) {
        var formElement = document.getElementById(formTargetIDs[idx]);
        if(formElement) {
            addLoginToForm(formElement, idx,formTargetIDs[idx]);
        }
    }
	// var formElementAmazonBtnM = document.getElementById('amazonBtnM');
	// addLoginToForm(formElementAmazonBtnM, 'amazonBtnM');
	
});

function addLoginToForm(formElement, idx,d) {
	ds = d;
    var orElement = buildOrElement();
    formElement.appendChild(orElement);
    var loginElement = buildLoginElement(idx,ds);
    formElement.appendChild(loginElement);
    //activateLoginWithAmazonButtons is defined in the footer of each page.
    activateLoginWithAmazonButtons('LoginWithAmazon-' + idx);
}

function buildOrElement() {
    var orElement = document.createElement('div');
    orElement.id = 'loginwithamazon_or_text';
    //orElement.style.clear = 'both';
   // orElement.style.padding = '15px 0';
   // orElement.style.textAlign = 'center';
    //orElement.innerHTML = '- OR - ';
    return orElement;
}

function buildLoginElement(idx,ds) {
    var loginElement = document.createElement('div');
    loginElement.id = 'loginwithamazon_button';
	//console.log(ds);
    //loginElement.style.textAlign = 'center';
	if(ds == 'amazonBtnM' || ds == 'amazonBtnLRM'){
		 loginElement.innerHTML = '<a href="#" id="LoginWithAmazon-' + idx + '" style="display:inline-block;"><img class="lginImg" src="/wp-content/themes/ticketbroadway/images/amozon.png"><p class="loginBtnRes amazone">Amazon Login</p></a>';
	}else{
    loginElement.innerHTML = '<a href="#" id="LoginWithAmazon-' + idx + '" style="display:inline-block;"><img border="0" alt="Login with Amazon" src="/wp-content/themes/ticketbroadway/images/amazonLogin.png"/></a>';
	}
    return loginElement;
}
