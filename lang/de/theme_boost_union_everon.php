<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme Everon - Language pack
 *
 * @package    theme_boost_union_everon
 * @copyright  2023 Daniel Poggenpohl <daniel.poggenpohl@fernuni-hagen.de> and Alexander Bias <bias@alexanderbias.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Let codechecker ignore some sniffs for this file as it is perfectly well ordered, just not alphabetically.
// phpcs:disable moodle.Files.LangFilesOrdering.UnexpectedComment
// phpcs:disable moodle.Files.LangFilesOrdering.IncorrectOrder

// General.
$string['pluginname'] = 'Everon';
$string['choosereadme'] = 'Everon ist ein Boost-Union-Kind-Theme für Project Theme. Es liefert das Standard-Erscheinungsbild von Union sowie optionale Funktionen wie die Barrierefreiheits-Symbolleiste, Launch Pad, Fokusmodus, Mein-Kurse-Layout und Dashboard-Layout.';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon ist ein Boost-Union-Kind-Theme für Project Theme. Bevorzugen Sie die Union-Einstellungen unter Aussehen/Inhalt; Everon ergänzt Funktionen wie die Barrierefreiheits-Symbolleiste, Launch-Pad-Verknüpfungen, Fokusmodus, Mein-Kurse-Kartenlayout und Dashboard-Layout.';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = 'Vererbung';
$string['inheritanceinherit'] = 'Erben';
$string['inheritanceduplicate'] = 'Duplizieren';
$string['inheritanceoptionsexplanation'] = 'In den meisten Fällen ist Vererbung völlig ausreichend. Es kann jedoch vorkommen, dass unvollkommener Code in Boost Union integriert wird, der eine einfache SCSS-Vererbung für bestimmte Boost-Union-Funktionen verhindert. Wenn Sie Probleme mit Boost-Union-Funktionen feststellen, die in Everon ebenfalls nicht zu funktionieren scheinen, versuchen Sie, diese Einstellung auf „Duplizieren“ umzustellen, und melden Sie – falls das Problem dadurch gelöst wird – ein Issue auf Github (siehe die Datei README.md für Hinweise zur Meldung).';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'Pre-SCSS-Vererbung';
$string['prescssinheritancesetting_desc'] = 'Mit dieser Einstellung steuern Sie, ob der Pre-SCSS-Code von Boost Union geerbt oder dupliziert werden soll.';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'Extra-SCSS-Vererbung';
$string['extrascssinheritancesetting_desc'] = 'Mit dieser Einstellung steuern Sie, ob der Extra-SCSS-Code von Boost Union geerbt oder dupliziert werden soll.';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = 'Barrierefreiheit';
$string['accessibilityheading'] = 'Barrierefreiheits-Symbolleiste';
$string['accessibilityheading_desc'] = 'Navigationsleisten-Hilfsmittel, mit dem jede Person Inhalt, Farbe und Assistenzwerkzeuge anpassen kann. Einstellungen werden im Browser (localStorage) gespeichert, nicht in den Moodle-Nutzereinstellungen.';
$string['enableaccessibilitytool'] = 'Barrierefreiheits-Symbolleiste aktivieren';
$string['enableaccessibilitytool_desc'] = 'Barrierefreiheits-Symbol in der oberen Navigationsleiste (neben Benachrichtigungen/Nachrichten) anzeigen und die Symbolleiste laden. Standard: Ja.';
$string['accessibilitymenu'] = 'Barrierefreiheitsoptionen';
$string['a11ycontentadjustments'] = 'Inhaltsanpassungen';
$string['a11ycoloradjustments'] = 'Farbanpassungen';
$string['a11ytools'] = 'Werkzeuge';
$string['a11yadjustfontsize'] = 'Schriftgröße anpassen';
$string['a11ydecreasefont'] = 'Schriftgröße verringern';
$string['a11yincreasefont'] = 'Schriftgröße vergrößern';
$string['a11yhighlighttitle'] = 'Titel hervorheben';
$string['a11yhighlightlinks'] = 'Links hervorheben';
$string['a11ydyslexiafont'] = 'Legasthenie-Schriftart';
$string['a11yletterspacing'] = 'Zeichenabstand';
$string['a11ylineheight'] = 'Zeilenhöhe';
$string['a11yfontweight'] = 'Schriftstärke';
$string['a11ydarkcontrast'] = 'Dunkler Kontrast';
$string['a11ylightcontrast'] = 'Heller Kontrast';
$string['a11yhighcontrast'] = 'Hoher Kontrast';
$string['a11yhighsaturation'] = 'Hohe Sättigung';
$string['a11ylowsaturation'] = 'Niedrige Sättigung';
$string['a11ymonochrome'] = 'Monochrom';
$string['a11ycolourmode'] = 'Farbmodus';
$string['a11ycolourmodedark'] = 'Dunkel';
$string['a11ycolourmodelight'] = 'Hell';
$string['a11ycolourmodesystem'] = 'System';
$string['a11yreadingguide'] = 'Leseführer';
$string['a11ystopanimations'] = 'Animationen stoppen';
$string['a11ybigcursor'] = 'Großer Cursor';
$string['a11yresetall'] = 'Alle Barrierefreiheitseinstellungen zurücksetzen';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = 'Navigationsleistensymbol, das berechtigungsbasierte integrierte Verknüpfungen und/oder benutzerdefinierte Rollen-Linkpakete öffnet. Wählen Sie den Modus „Integrierte Kacheln“ (Standard), um automatisch Verknüpfungen für installierte Funktionen anhand der Berechtigungen der jeweiligen Person anzuzeigen (einschließlich Mandanten- und Global-Kacheln auf MuTMS-Sites), oder „Nur benutzerdefinierte Rollenlinks“, um alle Links über JSON-Pakete zu verwalten. Das Symbol wird ausgeblendet, wenn Launch Pad deaktiviert ist oder keine zugänglichen Links vorhanden sind.';
$string['enablelaunchpad'] = 'Launch Pad aktivieren';
$string['enablelaunchpad_desc'] = 'Launch-Pad-Symbol in der oberen Navigationsleiste anzeigen (nach dem Barrierefreiheitstool, vor dem Nutzermenü), wenn die Person mindestens einen zugänglichen Link hat. Standard: Nein.';
$string['launchpadmode'] = 'Launch-Pad-Modus';
$string['launchpadmode_desc'] = 'Wählen Sie, wie Launch-Pad-Links gefüllt werden. Im Modus „Integrierte Kacheln“ werden Verknüpfungen automatisch aus den unten aktivierten Kacheln anhand installierter Plugins und Berechtigungen erzeugt (Site-Administratoren sowie Mandanten-Manager auf MuTMS-Sites); weitere Rollenpakete werden angehängt. Im Modus „Nur benutzerdefinierte Rollenlinks“ werden ausschließlich die JSON-Rollenpakete unten verwendet.';
$string['launchpadmode_builtin'] = 'Integrierte Kacheln (berechtigungsbasiert) + benutzerdefinierte Rollenlinks';
$string['launchpadmode_custom'] = 'Nur benutzerdefinierte Rollenlinks';
$string['launchpadbuiltintiles'] = 'Integrierte Launch-Pad-Kacheln';
$string['launchpadbuiltintiles_desc'] = 'Wählen Sie aus, welche integrierten Kacheln im Modus „Integrierte Kacheln“ angezeigt werden können. Es werden nur Kacheln für auf dieser Site installierte Funktionen aufgelistet. Jede Kachel wird weiterhin gegen die Berechtigungen der aktuellen Person (und den aktiven Mandanten auf MuTMS-Sites) geprüft.';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = 'JSON-Array von Objekten mit <code>label</code>, <code>url</code> (seitenrelativer Pfad wie <code>/admin/search.php</code>) und optionalem <code>icon</code> (Font-Awesome-Klasse, z. B. <code>fa-cog</code>). Externe URLs werden in v1 abgelehnt. Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = 'Links: Site-Administratoren';
$string['launchpadlinks_siteadmin_desc'] = 'Wird angezeigt, wenn die Person Site-Administrator ist (<code>is_siteadmin()</code>).';
$string['launchpadlinks_manager'] = 'Links: Manager';
$string['launchpadlinks_manager_desc'] = 'Veraltete MVP-Einstellung (wird nach Möglichkeit in ein Manager-Rollenpaket migriert).';
$string['launchpadlinks_authenticated'] = 'Links: Authentifizierte Nutzer';
$string['launchpadlinks_authenticated_desc'] = 'Fallback für jede angemeldete Nicht-Gast-Person. Wird nach siteadmin und Rollenpaketen zusammengeführt.';

$string['launchpadrolelinks'] = 'Rollen-Linkpakete';
$string['launchpadrolelinks_desc'] = 'Konfigurieren Sie JSON-Linklisten nach Rolle. Im Modus „Integrierte Kacheln“ steuern die integrierten Kacheln oben die Verknüpfungen für Site-Administratoren (und Mandanten-Manager auf MuTMS-Sites), und das Paket „Site-Administratoren“ hier ist inaktiv; hinzugefügte Rollenpakete werden angehängt (nach URL dedupliziert). Im Modus „Nur benutzerdefinierte Rollenlinks“ steuern diese JSON-Pakete (einschließlich Site-Administratoren) das Launch Pad ausschließlich.';
$string['launchpadbuiltinpacks'] = 'Integrierte Pakete';
$string['launchpadconfiguredroles'] = 'Konfigurierte Pakete';
$string['launchpadaddrole'] = 'Rolle hinzufügen';
$string['launchpadremoverole'] = 'Entfernen';
$string['launchpadchooserole'] = 'Rolle wählen…';
$string['launchpadlinks_role'] = 'Links: {$a}';
$string['launchpadrolemissing'] = 'Rolle #{$a} (fehlt)';
$string['launchpadrolemapinvalid'] = 'Launch-Pad-Rollenlinks müssen ein JSON-Objekt sein, das Paketschlüssel auf Link-Arrays abbildet.';

$string['launchpadjsoninvalid'] = 'Launch-Pad-Links müssen ein JSON-Array von Objekten sein, jeweils mit nicht leerem label und url.';
$string['launchpad_section_global'] = 'Global';
$string['launchpad_tile_prefix_primary'] = 'Primär: {$a}';
$string['launchpad_tile_prefix_global'] = 'Global: {$a}';
$string['launchpad_item_appearance'] = 'Darstellung';
$string['launchpad_item_browseusers'] = 'Nutzerliste durchsuchen';
$string['launchpad_item_managecourses'] = 'Kurse und Kursbereiche verwalten';
$string['launchpad_item_plugins'] = 'Plugin-Übersicht';
$string['launchpad_item_performance'] = 'Performance-Übersicht';
$string['launchpad_item_debugging'] = 'Debugging';
$string['launchpad_item_tasks'] = 'Geplante Vorgänge';
$string['launchpad_item_certifications'] = 'Zertifizierungen';
$string['launchpad_item_customreports'] = 'Benutzerdefinierte Berichte';
$string['launchpad_item_dynamicrules'] = 'Dynamische Regeln';
$string['launchpad_item_orgstructure'] = 'Organisationsstruktur';
$string['launchpad_item_programs'] = 'Programme';
$string['launchpad_item_users'] = 'Nutzer';
$string['launchpad_item_catalogue'] = 'Katalog';
$string['launchpad_item_customhomepages'] = 'Benutzerdefinierte Startseiten';
$string['launchpad_item_alltenants'] = 'Alle Mandanten';
$string['launchpad_item_allusers'] = 'Alle Nutzer';
$string['launchpad_item_certificates'] = 'Zertifikate';
$string['launchpad_item_courses'] = 'Kurse';
$string['launchpad_item_custompages'] = 'Benutzerdefinierte Seiten';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = 'Fokusmodus';
$string['focusmodeheading'] = 'Fokusmodus';
$string['focusmodeheading_desc'] = 'Ein schwebendes Steuerelement auf Kursinhaltsseiten, dem Dashboard (/my/), Meine Kurse (/my/courses.php) und benutzerdefinierten MuTMS-Startseiten, das die sekundäre Navigation und Schubladen ausblendet und den Hauptinhalt verbreitert. Die Einstellung wird pro Kurs oder Seite im Browser (localStorage) gespeichert.';
$string['enablefocusmode'] = 'Fokusmodus aktivieren';
$string['enablefocusmode_desc'] = 'Fokusmodus-Schaltfläche (unten rechts) auf Kursstart-, Abschnitts- und Aktivitätsseiten sowie auf Dashboard (/my/), Meine Kurse (/my/courses.php) und benutzerdefinierten MuTMS-Startseiten anzeigen. Standard: Ja.';
$string['focusmodeenable'] = 'Fokusmodus';
$string['focusmodedisable'] = 'Fokusmodus beenden';
$string['focusmodenotice'] = 'Fokusmodus ist aktiv. Klicken Sie unten rechts auf ×, um ihn auszuschalten.';


// Settings: User menu tiles tab.
$string['usermenutab'] = 'Nutzermenü';
$string['usermenuheading'] = 'Nutzermenü-Kacheln';
$string['usermenuheading_desc'] = 'Gestaltet das Profil-Nutzermenü als Launch-Pad-ähnliches Kachelraster um (gleiche Boost-Ziele). Das Panel-Chrome entspricht bereits Barrierefreiheit / Launch Pad. Deaktivieren, um die vertikale Linkliste beizubehalten.';
$string['enableusermenutiles'] = 'Nutzermenü-Kacheln aktivieren';
$string['enableusermenutiles_desc'] = 'Profil-Nutzermenüeinträge als 3-Spalten-Kachelraster mit Font-Awesome-Symbolen anzeigen. Standard: Ja. Auf Nein setzen für die vertikale Liste.';

// Settings: Compact navbar tab.
$string['navbartab'] = 'Navigationsleiste';
$string['navbarheading'] = 'Kompakte Navigationsleiste';
$string['navbarheading_desc'] = 'Etwas engere obere Leiste, klarere Unterstreichung aktiver Links und konsistente Trefferflächen für Hilfssymbole. Site-Logo und Markenfarbe bleiben in Boost Union → Aussehen (Multi-Client-Pfad). Das Anmelde-Layout bleibt unverändert (nur Boost-Union-Anmeldung).';
$string['enablecompactnavbar'] = 'Kompakte Navigationsleiste aktivieren';
$string['enablecompactnavbar_desc'] = 'Kompaktes Navigationsleisten-Chrome auf allen Seiten außer der Anmeldung anwenden. Standard: Ja. Deaktivieren, um die Standardhöhe der Boost-Union-Navigationsleiste zu verwenden.';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = 'Meine Kurse';
$string['mycoursesheading'] = 'Mein-Kurse-Layout';
$string['mycoursesheading_desc'] = 'Optionales Kartenraster-Design auf der Seite Meine Kurse (/my/courses.php) in der Standardbreite von Moodle / Boost Union (über den Fokusmodus erweiterbar). Gestaltet den Standardblock Kursübersicht — ersetzt ihn nicht. Suche, Gruppierung, Sortierung und Ansichtsmodi bleiben Kern-Moodle.';
$string['enablemycourseslayout'] = 'Mein-Kurse-Layout aktivieren';
$string['enablemycourseslayout_desc'] = 'Zeigt ein responsives Kartenraster (1–3 Spalten bei Standardbreite, bis zu 5 Spalten im Fokusmodus) und gestaltet Karten neu (Schatten, kreisförmiger Fortschritt auf dem Bild, Stern auf dem Bild). Standard: Ja.';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = 'Mein-Kurse-Statistiken';
$string['mycoursesstatsheading_desc'] = 'Optionaler Statistikstreifen oben auf Meine Kurse (/my/courses.php) für die aktuelle Person: Einschreibungen, Abschlüsse, Abzeichen und Zertifikate. Jedes Panel kann unabhängig aktiviert werden.';
$string['enablemycoursesstats'] = 'Mein-Kurse-Statistiken aktivieren';
$string['enablemycoursesstats_desc'] = 'Statistikstreifen oberhalb der Kursübersicht auf Meine Kurse anzeigen. Standard: Ja.';
$string['mycoursesstatsenrolments'] = 'Einschreibungen-Panel anzeigen';
$string['mycoursesstatsenrolments_desc'] = 'Anzahl der aktiven (laufenden) Kurse der aktuellen Person. Standard: Ja.';
$string['mycoursesstatscompletions'] = 'Abschlüsse-Panel anzeigen';
$string['mycoursesstatscompletions_desc'] = 'Anzahl der Kurse, die die aktuelle Person abgeschlossen hat. Standard: Ja.';
$string['mycoursesstatsbadges'] = 'Abzeichen-Panel anzeigen';
$string['mycoursesstatsbadges_desc'] = 'Anzahl der der aktuellen Person verliehenen Abzeichen. Standard: Ja.';
$string['mycoursesstatscertificates'] = 'Zertifikate-Panel anzeigen';
$string['mycoursesstatscertificates_desc'] = 'Anzahl der der aktuellen Person verliehenen Zertifikate (tool_certificate oder mod_customcert, falls installiert; sonst 0). Standard: Ja.';
$string['mycoursesstatsaria'] = 'Meine-Kurse-Statistiken';
$string['mycoursesstatsenrolmentstitle'] = 'Einschreibungen';
$string['mycoursesstatsenrolmentssub'] = '{$a} Aktive Kurse';
$string['mycoursesstatscompletionstitle'] = 'Abschlüsse';
$string['mycoursesstatscompletionssub'] = '{$a} Abgeschlossene Kurse';
$string['mycoursesstatsbadgestitle'] = 'Abzeichen';
$string['mycoursesstatsbadgessub'] = '{$a} Verliehen';
$string['mycoursesstatscertificatestitle'] = 'Zertifikate';
$string['mycoursesstatscertificatessub'] = '{$a} Verliehen';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = 'Dashboard';
$string['dashboardheading'] = 'Dashboard-Layout';
$string['dashboardheading_desc'] = 'Optionales Dashboard-Kartenraster- und Blockflächen-Design auf /my/ in der Standardbreite von Moodle / Boost Union (über den Fokusmodus erweiterbar) mit gemeinsamem Kursübersicht-Karten-Chrome mit Meine Kurse. Das Spaltenlayout (Kalender / Bevorstehende Ereignisse rechts) nutzt Boost Union Outside (rechts) — konfigurieren unter Feeling → Blöcke.';
$string['enabledashboardlayout'] = 'Dashboard-Layout aktivieren';
$string['enabledashboardlayout_desc'] = 'Wendet dasselbe Kursübersicht-Karten-Chrome wie bei Meine Kurse auf dem Dashboard an (1–3 Spalten bei Standardbreite, 4 Spalten im Fokusmodus). Vereinheitlicht außerdem Timeline-/Kalender-/Bevorstehend-Blockflächen und mildert leere Zustände ab. Standard: Ja. Aktivieren Sie Boost Union Outside (rechts) separat für die rechte Spalte.';
$string['dashboardsurfacesnote'] = 'Wenn das Dashboard-Layout aktiviert ist, wendet Everon auch gemeinsame Blockflächen-Token (weicher Rand, Radius, Schatten) und ruhigere leere Zustände für Timeline / Bevorstehend an, damit unterstützende Blöcke zu den Kurskarten passen.';

// Privacy API.
$string['privacy:metadata'] = 'Das Everon-Theme speichert keine personenbezogenen Daten über Nutzerinnen und Nutzer. Einstellungen für Barrierefreiheit und Fokusmodus werden nur im Browser gespeichert. Launch-Pad-Links, Mein-Kurse-Layout, Mein-Kurse-Statistiken, Dashboard-Layout und kompakte Navigationsleiste sind seitenweite Admin-Einstellungen.';
