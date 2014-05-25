<?php

/**
 * help/en/datadmin.php
 *
 * The English manual for Datadmin - the database administration tool we use in OpenHomeopath.
 *
 * LICENSE: Permission is granted to copy, distribute and/or modify this document
 * under the terms of the GNU Free Documentation License, Version 1.3
 * or any later version published by the Free Software Foundation;
 * with no Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts.
 * A copy of the license is included in doc/en/fdl_1.3.php.
 *
 * @category  Manual
 * @package   Datadmin
 * @author    Henri Schumacher <henri.hulski@gazeta.pl>
 * @copyright 2007-2014 Henri Schumacher
 * @license   http://www.gnu.org/licenses/fdl.html GNU Free Documentation License v1.3
 * @version   1.0
 * @link      http://openhomeo.org/openhomeopath/download/openhomeopath_1.0.tar.gz
 */

chdir("../..");
include_once ("include/classes/login/session.php");
$skin = $session->skin;
$head_title = "Datadmin :: Help :: OpenHomeopath";
$meta_description = "OpenHomeopath Manual, Data maintenance, Datadmin";
include("help/layout/$skin/header.php");
?>
<h1>
  OpenHomeopath Manual
</h1>
<h2>
  Data maintenance
</h2>
<div>
  Hier lässt sich die <strong>Datenbank erweitern</strong> bzw. <strong>verändern</strong>.<br>
  Um zur Datenpflege <strong>Zugang</strong> zu haben musst du <a href="user.php">angemeldet</a> sein.<br>
  Im Datenpflege-Fenster kannst du oben in einem Dropdown-Menü die <strong>Datenbank-Tabelle</strong> auswählen, die du bearbeiten willst.<br>
  Es können <strong>folgende Tabellen</strong> eingesehen und bearbeitet werden:
  <ul>
    <li><strong><em>Materia Medica</em></strong> &ndash; enthält die Angaben der <strong>Materia Medica</strong> mit <strong>Quellenangabe</strong> zu den einzelnen Arzneimitteln;</li>
    <li><strong><em>Symptome</em></strong> &ndash; enthält die <strong>Symptome</strong> mit den ihnen zugeordneten <strong>Rubriken</strong>;</li>
    <li><strong><em>Quellen</em></strong> &ndash; enthält die <strong>Quellen</strong> mit ausführlicher <strong>Beschreibung</strong>.</li>
    <li><strong><em>Mittel</em></strong> &ndash; enthält die <strong>Arzneimittel</strong> mit <strong>Kurzbezeichnung</strong> und <strong>Mittelname</strong>.</li>
    <li><strong><em>Hauptrubriken</em></strong> &ndash; enthält die <strong>Hauptrubriken</strong> mit <strong>Position</strong> im Kopf-Fuß-Schema.</li>
  </ul>
</div>
<p>
  Es folgt eine <strong>ausführliche Beschreibung</strong> der einzelnen <strong>Tabellen</strong>:
</p>
<br>
<div class="content">
  <h2>
    Inhalt
  </h2>
  <ul>
    <li><a href="#medica">Tabelle Materia Medica</a></li>
    <li><a href="#symptoms">Tabelle Symptome</a></li>
    <li><a href="#sources">Tabelle Quellen</a></li>
    <li><a href="#remedies">Tabelle Mittel</a></li>
    <li><a href="#mainrubrics">Tabelle Hauptrubriken</a></li>
    <li><a href="#overview">Aufbau de Datenpflege-Startseite</a></li>
    <li><a href="#edit">Bearbeiten und Einfügen von Sätzen</a></li>
  </ul>
</div>
<a name="medica" id="medica"><br></a>
<h3>
  Tabelle Materia Medica
</h3>
<div>
  In der Tabelle <strong><em>Materia Medica</em></strong> gibt es folgende <strong>Felder</strong>:
  <ul>
    <li><strong><em>Mittel</em></strong> &ndash; hier wird das Mittel aus einer Drop-Down-Liste ausgesucht;</li>
    <li><strong><em>Herstellung/Herkunft/Synonyme</em></strong> &ndash; nähere Angaben zu Herstellung, Herkunft und Synonymen des Mittels;</li>
    <li><strong><em>allgemeine Beschreibung des Mittels</em></strong> &ndash; hier kann eine ausführliche Beschreibung des Mittels hinterlegt werden;</li>
    <li><strong><em>verwandte Mittel</em></strong>, <strong><em>unverträgliche Mittel</em></strong> und <strong><em>Antidote</em></strong> &ndash; angegeben werden die jeweiligen Kurzformen der Mittel;</li>
    <li><strong><em>Quelle der Mittelbeschreibung</em></strong> &ndash; hier kann in einer Dropdown-Liste eine Quelle aus der <strong>Tabelle <em>Quellen</em></strong> ausgewählt werden;</li>
    <li><strong><em>Leitsymptome</em></strong> unterteilt in die Kategorien <strong><em>Allgemein</em></strong>, <strong><em>Gemüt</em></strong> und <strong><em>Körper</em></strong> &ndash; hier können die einzelnen Leitsymptome des Mittels beschrieben werden.</li>
  </ul>
  Das Feld <strong>Mittel</strong> muß angegeben werden. Die <strong>anderen Felder</strong> werden nur dann in der <strong>Materia Medica</strong> angezeigt, wenn sie <strong>nicht leer</strong> gelassen werden.
</div>
<br><span class="rightFlow"><a href="#oben" title="Zum Seitenanfang"><img src="../../<?php echo(ARROW_UP_ICON);?>" alt="Zum Seitenanfang" border="0"></a></span>
<a name="symptoms" id="symptoms"><br></a>
<h3>
  Tabelle Symptome
</h3>
<div>
  Die Tabelle <strong><em>Symptome</em></strong> enthält <strong>2 Felder</strong>:
  <ul>
    <li><strong><em>Symptom</em></strong> &ndash; eine möglichst knappe und treffende Symptombeschreibung;</li>
    <li><strong><em>Rubrik</em></strong> &ndash; aus einer Auswahlliste kann die Rubrik ausgewählt werden.</li>
  </ul>
  <strong>Beide</strong> Felder sind <strong>Pflichtfelder</strong>. Außerdem wird <strong>automatisch</strong> eine <strong>Symptom-Nummer</strong> vergeben.
</div>
<br><span class="rightFlow"><a href="#oben" title="Zum Seitenanfang"><img src="../../<?php echo(ARROW_UP_ICON);?>" alt="Zum Seitenanfang" border="0"></a></span>
<a name="sources" id="sources"><br></a>
<h3>
  Tabelle Quellen
</h3>
<div>
  Die Tabelle <strong><em>Quellen</em></strong> enthält <strong>2 Pflichtfelder</strong>:
  <ul>
    <li><strong><em>Identifikator</em></strong> &ndash; dies ist das <strong>Kürzel</strong>, welches in Klammern hinter Mitteln und Symptomen angezeigt wird, dabei sind bis zu 5 <strong>Großbuchstaben</strong> und <strong>Zahlen</strong> erlaubt;</li>
    <li><strong><em>Titel</em></strong> &ndash; hier den Titel der Quelle angeben.</li>
  </ul>
  Die weiteren <strong>9 Felder</strong> sind <strong>selbsterklärend</strong> und werden nur angezeigt, wenn sie <strong>ausgefüllt</strong> sind:
  <ul>
    <li><strong><em>Autor</em></strong></li>
    <li><strong><em>Jahr</em></strong></li>
    <li><strong><em>Auflage/Version</em></strong></li>
    <li><strong><em>Copyright</em></strong></li>
    <li><strong><em>Lizenz</em></strong></li>
    <li><strong><em>Webpräsenz</em></strong></li>
    <li><strong><em>ISBN</em></strong></li>
    <li><strong><em>Bemerkung</em></strong></li>
    <li><strong><em>Kontaktadresse</em></strong></li>
  </ul>
</div>
<br><span class="rightFlow"><a href="#oben" title="Zum Seitenanfang"><img src="../../<?php echo(ARROW_UP_ICON);?>" alt="Zum Seitenanfang" border="0"></a></span>
<a name="remedies" id="remedies"><br></a>
<h3>
  Tabelle Mittel
</h3>
<div>
  In der Tabelle <strong><em>Mittel</em></strong> gibt es <strong>2 Felder</strong>:
  <ul>
    <li><strong><em>Kurzbezeichnung</em></strong> &ndash; die gebräuchliche Kurzform des Mittelnamens;</li>
    <li><strong><em>Mittelname</em></strong> &ndash; der offizielle Mittelname.</li>
  </ul>
  Beide Felder sind <strong>Pflichtfelder</strong>.
</div>
<br><span class="rightFlow"><a href="#oben" title="Zum Seitenanfang"><img src="../../<?php echo(ARROW_UP_ICON);?>" alt="Zum Seitenanfang" border="0"></a></span>
<a name="mainrubrics" id="mainrubrics"><br></a>
<h3>
  Tabelle Hauptrubriken
</h3>
<div>
  In der Tabelle <strong><em>Hauptrubriken</em></strong> gibt es <strong>2 Felder</strong>:
  <ul>
    <li><strong><em>Hauptrubrikname</em></strong>;</li>
    <li><strong><em>Hauptrubrikposition</em></strong> &ndash; dies ist die Position der Hauptrubrik im Kopf-Fuß-Schema.</li>
  </ul>
  Beide Felder sind <strong>Pflichtfelder</strong>.
</div>
<p>
  <span class="boldtext red">Achtung!</span> &nbsp; <strong>Änderungen der Hauptrubriken</strong> sollten nur mit <strong>Rücksprache</strong> im Forum bzw. mit einem Administrator ausgeführt werden, da die Hauptrubriken die <strong>Grundstruktur der Datenbank</strong> darstellen.<br>
  Um neue Hauptrubriken an die <strong>richtige Position</strong> im Kopf-Fuß-Schema zu bringen, muss, wenn dies die Position von Hauptrubriken betrifft, die nicht vom jeweiligen Benutzer erstellt wurden, ein Administrator eingreifen.
</p>
<br><span class="rightFlow"><a href="#oben" title="Zum Seitenanfang"><img src="../../<?php echo(ARROW_UP_ICON);?>" alt="Zum Seitenanfang" border="0"></a></span>
<a name="overview" id="overview"><br></a>
<h3>
  Aufbau de Datenpflege-Startseite
</h3>
<p>
  Auf der <strong>Startseite</strong> der jeweiligen Tabelle wird eine <strong>Liste aller vorhandenen Tabellensätze</strong> angezeigt. Unterhalb der Tabellenauswahl kannst du auswählen <strong>wie viele Sätze pro Seite</strong> angezeigt werden. Der Standard ist <strong>20</strong>.
</p>
<div>
  Vor jedem Tabelleneintrag befinden sich <strong>3 anklickbare Symbole</strong>:
  <ul>
      <li><img alt=""  src="../../<?php echo(EDIT_ICON);?>" width="16" height="16"> &ndash; Hier kannst du den nachstehenden Satz <strong>bearbeiten</strong>. Wenn du kein Administrator bist, kannst du nur die Sätze bearbeiten, die du <strong>selbst erstellt</strong> hast. Näheres siehe unter <a href="#edit">Bearbeiten und Einfügen von Sätzen<strong></strong></a>.</li>
      <li><img alt=""  src="../../<?php echo(DELETE_ICON);?>" width="16" height="16"> &ndash; Hiermit <strong>löschst</strong> du den betreffenden Satz <strong>unwiderruflich</strong>, berechtigt dazu ist der, der den Satz erstellt hat und ein Administrator.</li>
      <li><img alt=""  src="../../<?php echo(DETAILS_ICON);?>" width="16" height="16"> &ndash; Von hier erreichst du die <strong>Detailansicht</strong>, wo du <strong>ausführliche Informationen</strong> über diesen Eintrag bekommst.</li>
  </ul>
</div>
<div>
  In den <strong>Menüs</strong> im oberen und unteren Bereich der Seite findest du <strong>folgende Einträge</strong>:
  <ul>
    <li><strong><em>"Startseite"</em></strong> &ndash; Von hier kommst du zurück zur Startseite der jeweiligen Tabelle mit der <strong>als letztes angezeigten Auswahl</strong> an Sätzen.</li>
    <li><strong><em>"Einfügen"</em></strong> &ndash; Hier kannst du einen neuen Satz in die Tabelle einfügen. Näheres siehe unter <a href="#edit">Bearbeiten und Einfügen von Sätzen</a>.</li>
    <li><strong><em>"Suchen"</em></strong> &ndash; Hier kommst du in eine <strong>ausführliche Suchmaske</strong>, wobei sich jedes Feld mit <strong>verschiedenen Suchkriterien</strong> nach Suchbegriffen <strong>durchsuchen</strong> lässt. So kannst du die <strong>Auswahl</strong> der Sätze, die angezeigt werden, <strong>flexibel anpassen</strong>.</li>
    <li><strong><em>"Letzte Suchergebnisse"</em></strong> &ndash; Hier wird das letzte Suchergebnis angezeigt.</li>
    <li><strong><em>"Alles zeigen"</em></strong> &ndash; Hier kannst du dir wieder alle Sätze anzeigen lassen.</li>
  </ul>
  Bei den Tabellen <strong><em>Materia Medica</em></strong> und <strong><em>Mittel</em></strong> gibt es außerdem unterhalb des Menüs die Möglichkeit die Sätze nach dem <strong>Anfangsbuchstaben der Mittel-Kurzbezeichnung</strong> auszuwählen. Entsprechend kannst du in der Tabelle <strong><em>Symptome</em></strong> die Sätze nach <strong>Hauptrubrik</strong> auswählen.
</div>
<p>
  Über <strong><em>"Als CSV-Datei ausgeben"</em></strong> unterhalb der Tabelle kannst du dir die jeweils <strong>angezeigte Satzauswahl</strong> als sternchen(<strong>*</strong>)-getrennte <strong>CSV-Datei</strong> ausgeben lassen. Deswegen sollte das <strong>*</strong>-Zeichen in den Datensätzen <strong>nicht vorkommen</strong>.
</p>
<br><span class="rightFlow"><a href="#oben" title="Zum Seitenanfang"><img src="../../<?php echo(ARROW_UP_ICON);?>" alt="Zum Seitenanfang" border="0"></a></span>
<a name="edit" id="edit"><br></a>
<h3>
  Bearbeiten und Einfügen von Sätzen
</h3>
<p>
    Zum <strong>Bearbeitungsformular</strong> kommt man über das <img alt=""  src="../../<?php echo(EDIT_ICON);?>" width="16" height="16"><strong>-Symbol</strong> vor jedem Tabelleneintrag und zum <strong>Einfügeformular</strong> über <strong><em>"Einfügen"</em></strong> im <strong>Menü</strong> ober- und unterhalb der Tabelle.<br>
  Der <strong>Unterschied</strong> zwischen den beiden Formularen besteht darin, dass im <strong>Bearbeitungsformular</strong> die Daten des entsprechenden Satzes <strong>voreingetragen</strong> sind und dass man über <strong><em>"<< Vorheriger"</em></strong> bzw. <strong><em>"Nächster >>"</em></strong> zum vorhergehenden bzw. nachfolgenden Satz <strong>springen</strong> kann.
</p>
<p>
  Du kannst nun die <strong>einzelnen Tabellenfelder</strong> ausfüllen bzw. ändern. Die Felder, die ausgefüllt sein müssen (<strong>Pflichtfelder</strong>) sind mit einem <strong>Sternchen(*)</strong> vor dem Feldnamen <strong>gekennzeichnet</strong>. Die meisten Felder sind <strong>einzeilige Textfelder</strong>, wo die entsprechenden Angaben in einer Zeile gemacht werden. Die Felder wo längere Textangaben möglich sind, benutzen <strong>mehrzeilige Textareafelder</strong>. Hier werden bei manchen Feldern bei der Eingabe gemachte <strong>Zeilensprünge</strong> auf der entsprechenden Programmseite <strong>übernommen</strong>.
  Bei manchen Feldern (z.B. Feld <em>Quellen</em> oder die Felder in der Tabelle <em>Symptome-Mittel-Beziehungen</em>) kann über eine <strong>Dropdown-Auswahl</strong> ein Eintrag aus einer <strong>anderen Tabelle</strong> (oder bei <em>Wertigkeit</em> aus einer <strong>vorgegebenen Liste</strong>) ausgewählt werden. Der Eintrag muss dann gegebenenfalls <strong>erst in der entsprechenden Tabelle</strong> gemacht werden. <strong>Hinweise zum Ausfüllen</strong> der einzelnen Felder findest du hinter den Feldern. <strong>Näheres zu den einzelnen Tabellen</strong> findest du oben in den jeweiligen Tabellen-Kapiteln.<br>
  Wenn das Formular <strong>fertig ausgefüllt</strong> ist schickst du es über <strong><em>"Speichern"</em></strong> bzw. <strong><em>"Neuen Satz einfügen"</em></strong> ab. Der Satz wird dann <strong>in die Datenbank</strong> übernommen.
</p>
<?php
include("help/layout/$skin/footer.php");
?>
