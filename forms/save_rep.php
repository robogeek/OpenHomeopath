<?php

/**
 * forms/save_rep.php
 *
 * This file provides a form for saving the repertorization in the database or as PDF from the repertorization results.
 *
 * PHP version 5
 *
 * LICENSE: This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  Homeopathy
 * @package   SaveRep
 * @author    Henri Schumacher <henri.hulski@gazeta.pl>
 * @copyright 2007-2014 Henri Schumacher
 * @license   http://www.gnu.org/licenses/agpl.html GNU Affero General Public License v3
 * @version   1.0
 * @link      http://openhomeo.org/openhomeopath/download/OpenHomeopath_1.0.tar.gz
 */

$task = "";
if (!empty($_REQUEST['task'])) {
	$task = $_REQUEST['task'];
}
if (!empty($_REQUEST['ajax']) || $task == 'save_PDF' || $task == 'print_PDF') {
	chdir("..");
	include_once ("include/classes/login/session.php");
	require_once ("include/classes/rep_class.php");
	$rep = new Rep();
}
if (!empty($task)) {  // speichert Rep.-Ergebnis oder gibt PDF aus
	if ($task == 'save_rep' & $session->logged_in) {  // speichert Rep.-Ergebnis
		$rep->save_rep();
		if (!empty ($rep->rep_id)) {
			if (!empty($_REQUEST['rep'])) {
				printf("<p class='label'><span class='alert_box'>" . _("The repertorization no. %d was updated.") . "</span></p>\n", $rep->rep_id);
			} else {
				printf("<p class='label'><span class='alert_box'>" . _("The repertorization result has been saved as <em>Rep.-no.: %d</em>.") . "\n", $rep->rep_id);
				if (!$tabbed && !isset($_REQUEST['tab'])) {
					$url = "userinfo.php?user=" . $session->username . "#reps";
				} else {
					$url = 'javascript:userTabOpen("reps")';
				}
				printf("<br>" . _("Saved repertorizations you find in <a href='%s'>My account</a>.") . "</span></p>\n", $url);
			}
		} else {
			echo "<p class='label'>" . _("The repertorization couldn't be saved!") . "</p>\n";
		}
	} else {  // gibt PDF aus
		require_once ("include/classes/fpdf/pdf.php");
		$rep->print_PDF($task);
	}
}
?>
<form name="save" accept-charset="utf-8">
  <table style="width:100%; border:0; text-align:left;">
    <tr>
      <td style="width:10%;">
        <label for="patient" class="label"><?php echo _("Patient:"); ?>&nbsp; </label>
      </td>
      <td>
<?php
echo ("        <input class='input' type='text' id='patient' size='5' maxlength='5'");
echo (" value = '" . $rep->patient . "'>\n");
if (!empty($rep->rep_id)) {
	echo "        <span class='boldtext blue'>&nbsp;&nbsp;" . _("Repertorization No.") . " " . $rep->rep_id . "</span>\n";
} else {
	echo "        <span class='caption'>&nbsp;&nbsp;" . _("Enter a patient code (up to 5 characters).") . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\n";
}
?>
      </td>
      <td class="rightAline">
        <label for="date" class="label"><?php echo _("Rep.-Date:"); ?>&nbsp; </label>
<?php
if ($session->logged_in) {  // user logged in
	$save_rep = "saveRep('save_rep')";
} elseif (!$session->logged_in) {
	$save_rep = "alert('" . _("In order to save the repertorization result you need to be logged in.") . "')";
}
$save_PDF = "saveRep('save_PDF')";
$print_PDF = "saveRep('print_PDF')";
?>
        <input class='input' type='date' id='date' value = '<?php echo $rep->date; ?>'>&nbsp;&nbsp;&nbsp;
      </td>
    </tr>
    <tr>
      <td>
        <label for="prescription" class="label"><?php echo _("Prescription:"); ?>&nbsp;</label>
      </td>
      <td colspan="2">
        <input class="input_text" type="text" id="prescription" size="87" maxlength="3000" value = "<?php echo $rep->prescription; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="note" class="label"><?php echo _("Case taking:"); ?>&nbsp;</label>
      </td>
      <td colspan="2">
        <textarea class="input_text" id="note"  cols="100" rows="5"><?php echo $rep->note; ?></textarea>
      </td>
    </tr>
  </table>
  <br>
  <div class="center">
    <button class='submit' type='button' onclick="<?php echo $save_rep; ?>" value=' <?php echo _("Save result"); ?> ' title=' <?php echo _("Save result"); ?> '>
      <img src='img/save.png' width='32' height='32' alt=' <?php echo _("Save result"); ?> '>
    </button>&nbsp;&nbsp;
    <button class='submit' type='button' onclick="<?php echo $save_PDF; ?>" value=' <?php echo _("Download PDF"); ?> ' title=' <?php echo _("Download PDF"); ?> '>
      <img src='img/pdf_down.png' width='32' height='32' alt=' <?php echo _("Download PDF"); ?> '>
    </button>&nbsp;&nbsp;
    <button class='submit' type='button' onclick="<?php echo $print_PDF; ?>" value=' <?php echo _("Print PDF"); ?> ' title=' <?php echo _("Print PDF"); ?> '>
      <img src='img/pdf_print.png' width='32' height='32' alt=' <?php echo _("Print PDF"); ?> '>
    </button>
  </div>
<?php
foreach ($rep->sym_select as $sym_id => $degree) {
	$symselect_ar[] = "$sym_id-$degree";
}
echo "  <input type='hidden' id='user' value='" . $session->username . "'>";
echo "  <input type='hidden' id='symptom_select' value='" . implode("_", $symselect_ar) . "'>";
if (!empty($rep->rep_id)) {
	echo "  <input type='hidden' id='rep' value='{$rep->rep_id}'>";
}
?>
</form>
