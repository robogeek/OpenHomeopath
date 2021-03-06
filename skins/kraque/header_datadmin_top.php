<?php
if (empty($lang)) {
	$lang = $session->lang;
}

header("Expires: Mon, 1 Dec 2006 01:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Type: text/html;charset=utf-8"); 
?>
<!DOCTYPE html>
<html lang="<?php echo($lang); ?>">
<head>
<title><?php echo _("Data maintenance") . " :: OpenHomeopath"; ?></title>
    <meta charset="utf-8">
    <meta name="author" content="Henri Schumacher">
    <meta name="robots" content="all">
    <meta name="robots" content="index,follow">
    <link rel="stylesheet" media="screen" href="skins/<?php echo(SKIN_NAME);?>/css/openhomeopath.css">
    <link rel="stylesheet" media="print" href="skins/<?php echo(SKIN_NAME);?>/css/print.css">
    <link rel="stylesheet" href="css/styles_screen.css" media="screen">
    <link rel="stylesheet" href="css/styles_print.css" media="print">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<!--[if lt IE 9]>
	  <script src="javascript/html5shiv.min.js"></script>
	<![endif]-->
    <script src="javascript/openhomeopath.js"></script>
    <script src="../scriptaculous-js-1.8.2/lib/prototype.js"></script>
    <script src="../scriptaculous-js-1.8.2/src/scriptaculous.js"></script>
    <script src="../scriptaculous-js-1.8.2/menu.js"></script>
<script language="Javascript">
  if(window.navigator.systemLanguage && !window.navigator.language) {
    window.onload=hoverIE;
  }
</script>

<script language="Javascript">
function enable_disable_input_box_insert_edit_form(null_checkbox_prefix, year_field_suffix, month_field_suffix, day_field_suffix)
// goal: set the status (disabled|enabled) of each input element of the insert|edit form, depending on the status (checked|not checked) of the corresponding null value checkbox (if it exists)
// input: null_checkbox_prefix, year_field_suffix, month_field_suffix, day_field_suffix
{
	var count = document.getElementById('dadabik_main_form').length;
	var null_checkbox_prefix_length = null_checkbox_prefix.length;

	// for each element of the form
	for (var i=0;i<count;i++)
	{
		// if the element is a null value checkbox element
		if (document.getElementById('dadabik_main_form').elements[i].name.substr(0,null_checkbox_prefix_length) == null_checkbox_prefix){

			// check if the field is a date field type

			var year_field_name = document.getElementById('dadabik_main_form').elements[i].name.substr(null_checkbox_prefix_length) + year_field_suffix;
				
			var a = new Array;
			a = document.getElementsByName(year_field_name);

			var field_type_is_date;
			if (a[0]){ // if the relative year field exists
				field_type_is_date = 1;
			} // end if
			else {
				field_type_is_date = 0;
			} // end else

			if (field_type_is_date == 1){
				// get the name of the relative input controls

				var month_field_name = document.getElementById('dadabik_main_form').elements[i].name.substr(null_checkbox_prefix_length) + month_field_suffix;

				var day_field_name = document.getElementById('dadabik_main_form').elements[i].name.substr(null_checkbox_prefix_length) + day_field_suffix;

				// and set the relative input controls enabled/disabled depending on the null value checkbox status (checked|not checked)
				var aa = new Array;
				aa = document.getElementsByName(year_field_name);
				
				var b = new Array;
				b = document.getElementsByName(month_field_name);

				var c = new Array;
				c = document.getElementsByName(day_field_name);


				if (document.getElementById('dadabik_main_form').elements[i].checked == true){
					aa[0].disabled = true;
					b[0].disabled = true;
					c[0].disabled = true;
				} // end if
				else{
					aa[0].disabled = false;
					b[0].disabled = false;
					c[0].disabled = false;
				} // end else
			} // end if
			else {
				// get the name of the relative input control
				var field_name = document.getElementById('dadabik_main_form').elements[i].name.substr(null_checkbox_prefix_length);

				// and set the relative input control enabled/disabled depending on the null value checkbox status (checked|not checked)
				var a = new Array;
				a = document.getElementsByName(field_name);

				a[0].disabled = document.getElementById('dadabik_main_form').elements[i].checked == true;
			} // end else
		} // end if
	} // end for
} // end function

function enable_disable_input_box_search_form(field_name, select_type_select_suffix, year_field_suffix, month_field_suffix, day_field_suffix)
// goal: set the status (disabled|enabled) of an input element of the search form, depending on the status of the corresponding select_type_select field
// input: field_name, select_type_select_suffix, year_field_suffix, month_field_suffix, day_field_suffix
{
	
	// check if the field is a date field type

	var year_field_name = field_name + year_field_suffix;
		
	var a = new Array;
	a = document.getElementsByName(year_field_name);

	if (a[0]){ // if the relative year field exists
		field_type_is_date = 1;
	} // end if
	else {
		field_type_is_date = 0;
	} // end else

	if (field_type_is_date == 1){
		// get the name of the relative input controls

		var month_field_name = field_name + month_field_suffix;

		var day_field_name = field_name + day_field_suffix;

		// and set the relative input controls enabled/disabled depending on the null value checkbox status (checked|not checked)
		var aa = new Array;
		aa = document.getElementsByName(year_field_name);

		var b = new Array;
		b = document.getElementsByName(month_field_name);

		var c = new Array;
		c = document.getElementsByName(day_field_name);

		var d = new Array;
		d = document.getElementsByName(field_name+select_type_select_suffix);

		if (d[0].value == 'is_null'){
			aa[0].disabled = true;
			b[0].disabled = true;
			c[0].disabled = true;
		} // end if
		else{
			aa[0].disabled = false;
			b[0].disabled = false;
			c[0].disabled = false;
		} // end else
	} // end if
	else{
		// set the relative input control enabled/disabled depending on the null value checkbox status (checked|not checked)
		var a = new Array;
		a = document.getElementsByName(field_name);

		var b = new Array;
		b = document.getElementsByName(field_name+select_type_select_suffix);

		a[0].disabled = (b[0].value == 'is_null' || b[0].value == 'is_empty');
	} // end else

} // end function

</script>
</head>

<body
<?php
if (isset($_GET["type_mailing"])){
	if ($_GET["type_mailing"] == "labels") {
		echo " style='margin:0' onload=\"javascript:alert('".$normal_messages_ar["print_warning"]."')\"";
	} // end if
} // end if
if ($function === 'insert' || $function === 'edit' || $function === 'update') {
?>
onload="enable_disable_input_box_insert_edit_form('<?php echo $null_checkbox_prefix.'\', \''.$year_field_suffix.'\', \''.$month_field_suffix.'\', \''.$day_field_suffix; ?>')"
<?php
} // end if
?>
>
