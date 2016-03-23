function es_submit_page(url,$this)
{
	es_email = $($this).parent().find("#es_txt_email");
	es_name = $($this).parent().find("#es_txt_name");
	es_group = $($this).parent().find("#es_txt_group");
    if( es_email.val() == "" )
    {
        alert(es_widget_notices.es_email_notice);
        es_email.focus();
        return false;    
    }
	if( es_email.val()!="" && ( es_email.val().indexOf("@",0) == -1 || es_email.val().indexOf(".",0) == -1 ))
    {
        alert(es_widget_notices.es_incorrect_email);
        es_email.focus();
        es_email.select();
        return false;
    }
    var type="header";
    if($($this).parent().parent().hasClass('header_search_part')){
        $(".header_search_part #es_msg").html(es_widget_notices.es_load_more);
    }else{
        $(".footer_search_part #es_msg").html(es_widget_notices.es_load_more);
        type="footer";
    }
	var date_now = "";
    var mynumber = Math.random();
    
	var str= "es_email="+ encodeURI(es_email.val()) + "&es_name=" + encodeURI(es_name.val()) + "&es_group=" + encodeURI(es_group.val()) + "&timestamp=" + encodeURI(date_now) + "&action=" + encodeURI(mynumber) + "&type=" +encodeURI(type);
	es_submit_request(url+'/?es=subscribe', str);
	//alert(url+'/?es=subscribe' + str);
}

var http_req = false;
function es_submit_request(url, parameters)
{
	http_req = false;
	if (window.XMLHttpRequest) 
	{
		http_req = new XMLHttpRequest();
		if (http_req.overrideMimeType) 
		{
			http_req.overrideMimeType('text/html');
		}
	} 
	else if (window.ActiveXObject) 
	{
		try 
		{
			http_req = new ActiveXObject("Msxml2.XMLHTTP");
		} 
		catch (e) 
		{
			try 
			{
				http_req = new ActiveXObject("Microsoft.XMLHTTP");
			} 
			catch (e) 
			{
				
			}
		}
	}
	if (!http_req) 
	{
		alert(es_widget_notices.es_ajax_error);
		return false;
	}
	http_req.onreadystatechange = eemail_submitresult;
	http_req.open('POST', url, true);
	http_req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// http_req.setRequestHeader("Content-length", parameters.length);
	// http_req.setRequestHeader("Connection", "close");
	http_req.send(parameters);
}

function eemail_submitresult() 
{
	//alert(http_req.readyState);
	//alert(http_req.responseText); 
	if (http_req.readyState == 4) 
	{
		if (http_req.status == 200) 
		{
		 	if (http_req.readyState==4 || http_req.readyState=="complete")
			{ 
				if((http_req.responseText).trim() == "subscribed-successfully")
				{
					document.getElementById("es_msg").innerHTML = es_widget_notices.es_success_message;
					document.getElementById("es_txt_email").value="";
				}
				else if((http_req.responseText).trim() == "subscribed-pending-doubleoptin")
				{
					alert(es_widget_notices.es_success_notice);
                    //$(".success-msg span").html('');
					$(".success-msg span:contains('loading')").html(es_widget_notices.es_success_message);
					document.getElementById("es_txt_email").value="";
					document.getElementById("es_txt_name").value="";
				}
				else if((http_req.responseText).trim() == "already-exist")
				{
					$(".success-msg span:contains('loading')").html(es_widget_notices.es_email_exists);
				}
				else if((http_req.responseText).trim() == "unexpected-error")
				{
					$(".success-msg span:contains('loading')").html(es_widget_notices.es_error);
				}
				else if((http_req.responseText).trim() == "invalid-email")
				{
					$(".success-msg span:contains('loading')").html(es_widget_notices.es_invalid_email);
				}
				else
				{
					document.getElementById("es_msg").innerHTML = es_widget_notices.es_try_later;
					document.getElementById("es_txt_email").value="";
					document.getElementById("es_txt_name").value="";
				}
			}
		}
		else 
		{
			alert(es_widget_notices.es_problem_request);
		}
	}
}
