<?php
/*
***********************************************************************************
DaDaBIK (DaDaBIK is a DataBase Interfaces Kreator) http://www.dadabik.org/
Copyright (C) 2001-2007  Eugenio Tacchini

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

If you want to contact me by e-mail, this is my address: eugenio.tacchini@unicatt.it
***********************************************************************************
*/
?>
<?php
if ($enable_authentication === 1) {
	if (!$session->isAdmin()) { // if the user is not logged or is not an administrator go to the login page
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "$dadabik_login_file?url=$url";
		header("Content-Type: text/html;charset=utf-8"); 
		header("Location: http://$host$uri/$extra");
		die();
	} // end if

	// get the current user
	$current_user = $session->username;

	$current_user_is_administrator = 1;

} // end if
else {
	// set the username to 'nobody' if the authentication is disabled
	$current_user = 'nobody';
	$current_user_is_administrator = 0;
} // end else

?>