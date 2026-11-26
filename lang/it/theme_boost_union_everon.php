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
$string['choosereadme'] = 'Everon è un tema figlio di Boost Union per Project Theme. Offre l’aspetto standard di Union più funzioni opzionali come la barra di accessibilità, Launch Pad, Modalità Focus, layout I miei corsi e layout Dashboard.';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon è un tema figlio di Boost Union per Project Theme. Preferire le impostazioni Aspetto/Contenuto di Union; Everon aggiunge funzioni come la barra di accessibilità, le scorciatoie Launch Pad, Modalità Focus, il layout a schede di I miei corsi e il layout Dashboard.';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = 'Ereditarietà';
$string['inheritanceinherit'] = 'Eredita';
$string['inheritanceduplicate'] = 'Duplica';
$string['inheritanceoptionsexplanation'] = 'Nella maggior parte dei casi, ereditare è assolutamente adeguato. Tuttavia, può capitare che codice imperfetto integrato in Boost Union impedisca una semplice ereditarietà SCSS per particolari funzioni di Boost Union. Se riscontri problemi con funzioni di Boost Union che sembrano non funzionare anche in Everon, prova a impostare questa opzione su «Duplica» e, se ciò risolve il problema, segnala un issue su Github (vedi il file README.md per i dettagli su come segnalare un problema).';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'Ereditarietà Pre SCSS';
$string['prescssinheritancesetting_desc'] = 'Con questa impostazione controlli se il codice pre SCSS di Boost Union deve essere ereditato o duplicato.';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'Ereditarietà Extra SCSS';
$string['extrascssinheritancesetting_desc'] = 'Con questa impostazione controlli se il codice extra SCSS di Boost Union deve essere ereditato o duplicato.';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = 'Accessibilità';
$string['accessibilityheading'] = 'Barra di accessibilità';
$string['accessibilityheading_desc'] = 'Utilità della barra di navigazione che consente a ciascun utente di regolare contenuto, colore e strumenti assistivi. Le preferenze sono memorizzate nel browser (localStorage), non nelle preferenze utente di Moodle.';
$string['enableaccessibilitytool'] = 'Abilita la barra di accessibilità';
$string['enableaccessibilitytool_desc'] = 'Mostra l’icona di accessibilità nella barra superiore (accanto a notifiche/messaggi) e carica la barra. Predefinito: Sì.';
$string['accessibilitymenu'] = 'Opzioni di accessibilità';
$string['a11ycontentadjustments'] = 'Regolazioni del contenuto';
$string['a11ycoloradjustments'] = 'Regolazioni del colore';
$string['a11ytools'] = 'Strumenti';
$string['a11yadjustfontsize'] = 'Regola dimensione carattere';
$string['a11ydecreasefont'] = 'Riduci dimensione carattere';
$string['a11yincreasefont'] = 'Aumenta dimensione carattere';
$string['a11yhighlighttitle'] = 'Evidenzia titolo';
$string['a11yhighlightlinks'] = 'Evidenzia collegamenti';
$string['a11ydyslexiafont'] = 'Carattere per dislessia';
$string['a11yletterspacing'] = 'Spaziatura lettere';
$string['a11ylineheight'] = 'Altezza riga';
$string['a11yfontweight'] = 'Spessore carattere';
$string['a11ydarkcontrast'] = 'Contrasto scuro';
$string['a11ylightcontrast'] = 'Contrasto chiaro';
$string['a11yhighcontrast'] = 'Contrasto elevato';
$string['a11yhighsaturation'] = 'Saturazione elevata';
$string['a11ylowsaturation'] = 'Saturazione bassa';
$string['a11ymonochrome'] = 'Monocromatico';
$string['a11ydarkmode'] = 'Modalità scura';
$string['a11yreadingguide'] = 'Guida alla lettura';
$string['a11ystopanimations'] = 'Interrompi animazioni';
$string['a11ybigcursor'] = 'Cursore grande';
$string['a11yresetall'] = 'Reimposta tutte le impostazioni di accessibilità';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = 'Icona della barra di navigazione che apre collegamenti rapidi in base al ruolo. Amministratori del sito è il pacchetto predefinito; aggiungi altri ruoli del sito se necessario. I pacchetti corrispondenti vengono uniti e deduplicati per URL. L’icona è nascosta quando Launch Pad è disabilitato o l’utente corrente non ha collegamenti.';
$string['enablelaunchpad'] = 'Abilita Launch Pad';
$string['enablelaunchpad_desc'] = 'Mostra l’icona Launch Pad nella barra superiore (dopo lo strumento di accessibilità, prima del menu utente) quando l’utente ha almeno un collegamento configurato. Predefinito: No — attivalo dopo aver aggiunto i collegamenti JSON sotto.';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = 'Array JSON di oggetti con <code>label</code>, <code>url</code> (percorso relativo al sito come <code>/admin/search.php</code>) e <code>icon</code> opzionale (classe Font Awesome, ad es. <code>fa-cog</code>). Gli URL esterni sono rifiutati in v1. Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = 'Collegamenti: Amministratori del sito';
$string['launchpadlinks_siteadmin_desc'] = 'Mostrato quando l’utente è amministratore del sito (<code>is_siteadmin()</code>).';
$string['launchpadlinks_manager'] = 'Collegamenti: Manager';
$string['launchpadlinks_manager_desc'] = 'Impostazione MVP legacy (migrata in un pacchetto ruolo manager quando possibile).';
$string['launchpadlinks_authenticated'] = 'Collegamenti: Utenti autenticati';
$string['launchpadlinks_authenticated_desc'] = 'Ripiego per ogni utente autenticato non ospite. Uniti dopo siteadmin e i pacchetti di ruolo.';

$string['launchpadrolelinks'] = 'Pacchetti di collegamenti per ruolo';
$string['launchpadrolelinks_desc'] = 'Configura elenchi di collegamenti JSON. Amministratori del sito è sempre presente (predefinito). Usa Aggiungi ruolo per qualsiasi altro ruolo del sito. I pacchetti di ruolo corrispondono quando l’utente ha quel ruolo in qualsiasi contesto. L’archivio usa gli id di ruolo; le etichette mostrano il nome corrente del ruolo.';
$string['launchpadbuiltinpacks'] = 'Pacchetti integrati';
$string['launchpadconfiguredroles'] = 'Pacchetti configurati';
$string['launchpadaddrole'] = 'Aggiungi ruolo';
$string['launchpadremoverole'] = 'Rimuovi';
$string['launchpadchooserole'] = 'Scegli un ruolo…';
$string['launchpadlinks_role'] = 'Collegamenti: {$a}';
$string['launchpadrolemissing'] = 'Ruolo #{$a} (mancante)';
$string['launchpadrolemapinvalid'] = 'I collegamenti di ruolo Launch Pad devono essere un oggetto JSON che associa chiavi di pacchetto ad array di collegamenti.';

$string['launchpadjsoninvalid'] = 'I collegamenti Launch Pad devono essere un array JSON di oggetti, ciascuno con label e url non vuoti.';
$string['launchpad_section_global'] = 'Globale';
$string['launchpad_item_appearance'] = 'Aspetto';
$string['launchpad_item_certifications'] = 'Certificazioni';
$string['launchpad_item_customreports'] = 'Report personalizzati';
$string['launchpad_item_dynamicrules'] = 'Regole dinamiche';
$string['launchpad_item_orgstructure'] = 'Struttura organizzativa';
$string['launchpad_item_programs'] = 'Programmi';
$string['launchpad_item_users'] = 'Utenti';
$string['launchpad_item_catalogue'] = 'Catalogo';
$string['launchpad_item_customhomepages'] = 'Pagine home personalizzate';
$string['launchpad_item_alltenants'] = 'Tutti i tenant';
$string['launchpad_item_allusers'] = 'Tutti gli utenti';
$string['launchpad_item_certificates'] = 'Certificati';
$string['launchpad_item_courses'] = 'Corsi';
$string['launchpad_item_custompages'] = 'Pagine personalizzate';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = 'Modalità Focus';
$string['focusmodeheading'] = 'Modalità Focus';
$string['focusmodeheading_desc'] = 'Un controllo mobile sulle pagine dei contenuti del corso, sulla Dashboard (/my/), su I miei corsi (/my/courses.php) e sulle pagine home personalizzate MuTMS che nasconde la navigazione secondaria e i cassetti e allarga il contenuto principale. La preferenza è memorizzata per corso o pagina nel browser (localStorage).';
$string['enablefocusmode'] = 'Abilita Modalità Focus';
$string['enablefocusmode_desc'] = 'Mostra il pulsante Modalità Focus (in basso a destra) nelle pagine home del corso, sezione e attività oltre che in Dashboard (/my/), I miei corsi (/my/courses.php) e pagine home personalizzate MuTMS. Predefinito: Sì.';
$string['focusmodeenable'] = 'Modalità Focus';
$string['focusmodedisable'] = 'Esci dalla modalità Focus';
$string['focusmodenotice'] = 'La modalità Focus è attiva. Fai clic su × in basso a destra per disattivarla.';


// Settings: User menu tiles tab.
$string['usermenutab'] = 'Menu utente';
$string['usermenuheading'] = 'Riquadri del menu utente';
$string['usermenuheading_desc'] = 'Ridisegna il menu profilo come griglia di riquadri in stile Launch Pad (stesse destinazioni Boost). L’aspetto del pannello corrisponde già ad Accessibilità / Launch Pad. Disattiva per mantenere l’elenco verticale di collegamenti.';
$string['enableusermenutiles'] = 'Abilita riquadri del menu utente';
$string['enableusermenutiles_desc'] = 'Mostra gli elementi del menu profilo come griglia a 3 colonne con icone Font Awesome. Predefinito: Sì. Imposta No per l’elenco verticale.';

// Settings: Compact navbar tab.
$string['navbartab'] = 'Barra di navigazione';
$string['navbarheading'] = 'Barra di navigazione compatta';
$string['navbarheading_desc'] = 'Barra superiore leggermente più compatta, sottolineatura più chiara del collegamento attivo e aree di tocco coerenti per le icone di utilità. Logo del sito e colore del brand restano in Boost Union → Aspetto (percorso multi-cliente). Il layout di accesso non cambia (solo accesso Boost Union).';
$string['enablecompactnavbar'] = 'Abilita barra di navigazione compatta';
$string['enablecompactnavbar_desc'] = 'Applica l’aspetto compatto della barra su tutte le pagine tranne l’accesso. Predefinito: Sì. Disattiva per usare l’altezza standard della barra Boost Union.';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = 'I miei corsi';
$string['mycoursesheading'] = 'Layout I miei corsi';
$string['mycoursesheading_desc'] = 'Aspetto opzionale a griglia di schede nella pagina I miei corsi (/my/courses.php) con la larghezza predefinita di Moodle / Boost Union (espandibile tramite Modalità Focus). Personalizza il blocco standard Panoramica corsi — non lo sostituisce. Ricerca, raggruppamento, ordinamento e modalità di visualizzazione restano di Moodle core.';
$string['enablemycourseslayout'] = 'Abilita layout I miei corsi';
$string['enablemycourseslayout_desc'] = 'Mostra una griglia responsive di schede (1–3 colonne a larghezza predefinita, fino a 5 colonne in Modalità Focus) e ridisegna le schede (ombra, progresso circolare sull’immagine, stella sull’immagine). Predefinito: Sì.';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = 'Statistiche I miei corsi';
$string['mycoursesstatsheading_desc'] = 'Striscia di statistiche opzionale in alto su I miei corsi (/my/courses.php) per l’utente corrente: Iscrizioni, Completamenti, Badge e Certificati. Ogni pannello può essere abilitato indipendentemente.';
$string['enablemycoursesstats'] = 'Abilita statistiche I miei corsi';
$string['enablemycoursesstats_desc'] = 'Mostra la striscia di statistiche sopra la panoramica corsi su I miei corsi. Predefinito: Sì.';
$string['mycoursesstatsenrolments'] = 'Mostra pannello Iscrizioni';
$string['mycoursesstatsenrolments_desc'] = 'Conteggio dei corsi attivi (in corso) dell’utente corrente. Predefinito: Sì.';
$string['mycoursesstatscompletions'] = 'Mostra pannello Completamenti';
$string['mycoursesstatscompletions_desc'] = 'Conteggio dei corsi che l’utente corrente ha completato. Predefinito: Sì.';
$string['mycoursesstatsbadges'] = 'Mostra pannello Badge';
$string['mycoursesstatsbadges_desc'] = 'Conteggio dei badge assegnati all’utente corrente. Predefinito: Sì.';
$string['mycoursesstatscertificates'] = 'Mostra pannello Certificati';
$string['mycoursesstatscertificates_desc'] = 'Conteggio dei certificati assegnati all’utente corrente (tool_certificate o mod_customcert se installati; altrimenti 0). Predefinito: Sì.';
$string['mycoursesstatsaria'] = 'Statistiche I miei corsi';
$string['mycoursesstatsenrolmentstitle'] = 'Iscrizioni';
$string['mycoursesstatsenrolmentssub'] = '{$a} Corsi attivi';
$string['mycoursesstatscompletionstitle'] = 'Completamenti';
$string['mycoursesstatscompletionssub'] = '{$a} Corsi completati';
$string['mycoursesstatsbadgestitle'] = 'Badge';
$string['mycoursesstatsbadgessub'] = '{$a} Assegnati';
$string['mycoursesstatscertificatestitle'] = 'Certificati';
$string['mycoursesstatscertificatessub'] = '{$a} Assegnati';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = 'Dashboard';
$string['dashboardheading'] = 'Layout Dashboard';
$string['dashboardheading_desc'] = 'Aspetto opzionale a griglia di schede e superfici dei blocchi della Dashboard su /my/ con la larghezza predefinita di Moodle / Boost Union (espandibile tramite Modalità Focus), condividendo il chrome delle schede Panoramica corsi con I miei corsi. Il layout a colonne (Calendario / Eventi imminenti a destra) usa Boost Union Outside (destra) — configura in Feel → Blocchi.';
$string['enabledashboardlayout'] = 'Abilita layout Dashboard';
$string['enabledashboardlayout_desc'] = 'Applica lo stesso chrome delle schede Panoramica corsi di I miei corsi sulla Dashboard (1–3 colonne a larghezza predefinita, 4 colonne in Modalità Focus). Unifica anche le superfici dei blocchi Timeline / Calendario / Imminenti e attenua gli stati vuoti. Predefinito: Sì. Abilita Boost Union Outside (destra) separatamente per la colonna destra.';
$string['dashboardsurfacesnote'] = 'Quando il layout Dashboard è abilitato, Everon applica anche token di superficie di blocco condivisi (bordo morbido, raggio, ombra) e uno stile più calmo degli stati vuoti di Timeline / Imminenti così che i blocchi di supporto corrispondano alle schede corso.';

// Privacy API.
$string['privacy:metadata'] = 'Il tema Everon non memorizza alcun dato personale su nessun utente. Le preferenze di Accessibilità e Modalità Focus sono memorizzate solo nel browser. I collegamenti Launch Pad, il layout I miei corsi, le statistiche I miei corsi, il layout Dashboard e la barra compatta sono impostazioni di amministrazione del sito.';
