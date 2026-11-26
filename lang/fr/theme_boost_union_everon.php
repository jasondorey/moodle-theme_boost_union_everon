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
$string['choosereadme'] = 'Everon est un thème enfant de Boost Union pour Project Theme. Il fournit l’apparence standard d’Union ainsi que des fonctionnalités optionnelles telles que la barre d’accessibilité, Launch Pad, le mode Focus, la disposition Mes cours et la disposition du Tableau de bord.';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon est un thème enfant de Boost Union pour Project Theme. Préférez les réglages Apparence/Contenu d’Union ; Everon ajoute des fonctionnalités telles que la barre d’accessibilité, les raccourcis Launch Pad, le mode Focus, la disposition en cartes de Mes cours et la disposition du Tableau de bord.';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = 'Héritage';
$string['inheritanceinherit'] = 'Hériter';
$string['inheritanceduplicate'] = 'Dupliquer';
$string['inheritanceoptionsexplanation'] = 'La plupart du temps, l’héritage convient parfaitement. Cependant, un code imparfait intégré dans Boost Union peut empêcher un simple héritage SCSS pour certaines fonctionnalités de Boost Union. Si vous rencontrez des problèmes avec des fonctionnalités de Boost Union qui ne semblent pas non plus fonctionner dans Everon, essayez de basculer ce réglage sur « Dupliquer » et, si cela résout le problème, signalez un problème sur Github (voir le fichier README.md pour savoir comment signaler un problème).';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'Héritage Pre SCSS';
$string['prescssinheritancesetting_desc'] = 'Avec ce réglage, vous contrôlez si le code pre SCSS de Boost Union doit être hérité ou dupliqué.';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'Héritage Extra SCSS';
$string['extrascssinheritancesetting_desc'] = 'Avec ce réglage, vous contrôlez si le code extra SCSS de Boost Union doit être hérité ou dupliqué.';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = 'Accessibilité';
$string['accessibilityheading'] = 'Barre d’accessibilité';
$string['accessibilityheading_desc'] = 'Utilitaire de la barre de navigation permettant à chaque utilisateur d’ajuster le contenu, la couleur et les outils d’assistance. Les préférences sont stockées dans le navigateur (localStorage), pas dans les préférences utilisateur Moodle.';
$string['enableaccessibilitytool'] = 'Activer la barre d’accessibilité';
$string['enableaccessibilitytool_desc'] = 'Afficher l’icône d’accessibilité dans la barre supérieure (à côté des notifications/messages) et charger la barre. Par défaut : Oui.';
$string['accessibilitymenu'] = 'Options d’accessibilité';
$string['a11ycontentadjustments'] = 'Ajustements du contenu';
$string['a11ycoloradjustments'] = 'Ajustements des couleurs';
$string['a11ytools'] = 'Outils';
$string['a11yadjustfontsize'] = 'Ajuster la taille de police';
$string['a11ydecreasefont'] = 'Diminuer la taille de police';
$string['a11yincreasefont'] = 'Augmenter la taille de police';
$string['a11yhighlighttitle'] = 'Surligner le titre';
$string['a11yhighlightlinks'] = 'Surligner les liens';
$string['a11ydyslexiafont'] = 'Police dyslexie';
$string['a11yletterspacing'] = 'Espacement des lettres';
$string['a11ylineheight'] = 'Hauteur de ligne';
$string['a11yfontweight'] = 'Graisse de police';
$string['a11ydarkcontrast'] = 'Contraste sombre';
$string['a11ylightcontrast'] = 'Contraste clair';
$string['a11yhighcontrast'] = 'Contraste élevé';
$string['a11yhighsaturation'] = 'Saturation élevée';
$string['a11ylowsaturation'] = 'Saturation faible';
$string['a11ymonochrome'] = 'Monochrome';
$string['a11ycolourmode'] = 'Mode couleur';
$string['a11ycolourmodedark'] = 'Sombre';
$string['a11ycolourmodelight'] = 'Clair';
$string['a11ycolourmodesystem'] = 'Système';
$string['a11yreadingguide'] = 'Guide de lecture';
$string['a11ystopanimations'] = 'Arrêter les animations';
$string['a11ybigcursor'] = 'Grand curseur';
$string['a11yresetall'] = 'Réinitialiser tous les réglages d’accessibilité';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = 'Icône de la barre de navigation ouvrant des raccourcis adaptés au rôle. Le pack par défaut est Administrateurs du site ; ajoutez d’autres rôles du site au besoin. Les packs correspondants sont fusionnés et dédoublonnés par URL. L’icône est masquée lorsque Launch Pad est désactivé ou que l’utilisateur actuel n’a aucun lien.';
$string['enablelaunchpad'] = 'Activer Launch Pad';
$string['enablelaunchpad_desc'] = 'Afficher l’icône Launch Pad dans la barre supérieure (après l’outil d’accessibilité, avant le menu utilisateur) lorsque l’utilisateur a au moins un lien configuré. Par défaut : Non — activez-le après avoir ajouté les liens JSON ci-dessous.';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = 'Tableau JSON d’objets avec <code>label</code>, <code>url</code> (chemin relatif au site tel que <code>/admin/search.php</code>) et <code>icon</code> facultatif (classe Font Awesome, p. ex. <code>fa-cog</code>). Les URL externes sont rejetées en v1. Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = 'Liens : Administrateurs du site';
$string['launchpadlinks_siteadmin_desc'] = 'Affiché lorsque l’utilisateur est administrateur du site (<code>is_siteadmin()</code>).';
$string['launchpadlinks_manager'] = 'Liens : Gestionnaire';
$string['launchpadlinks_manager_desc'] = 'Réglage MVP hérité (migré vers un pack de rôle gestionnaire lorsque c’est possible).';
$string['launchpadlinks_authenticated'] = 'Liens : Utilisateurs authentifiés';
$string['launchpadlinks_authenticated_desc'] = 'Solution de repli pour tout utilisateur connecté non invité. Fusionné après siteadmin et les packs de rôles.';

$string['launchpadrolelinks'] = 'Packs de liens par rôle';
$string['launchpadrolelinks_desc'] = 'Configurez des listes de liens JSON. Administrateurs du site est toujours présent (par défaut). Utilisez Ajouter un rôle pour tout autre rôle du site. Les packs de rôle correspondent lorsque l’utilisateur a ce rôle dans n’importe quel contexte. Le stockage utilise les ids de rôle ; les libellés affichent le nom actuel du rôle.';
$string['launchpadbuiltinpacks'] = 'Packs intégrés';
$string['launchpadconfiguredroles'] = 'Packs configurés';
$string['launchpadaddrole'] = 'Ajouter un rôle';
$string['launchpadremoverole'] = 'Supprimer';
$string['launchpadchooserole'] = 'Choisir un rôle…';
$string['launchpadlinks_role'] = 'Liens : {$a}';
$string['launchpadrolemissing'] = 'Rôle #{$a} (manquant)';
$string['launchpadrolemapinvalid'] = 'Les liens de rôle Launch Pad doivent être un objet JSON associant des clés de pack à des tableaux de liens.';

$string['launchpadjsoninvalid'] = 'Les liens Launch Pad doivent être un tableau JSON d’objets, chacun avec un label et une url non vides.';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = 'Mode Focus';
$string['focusmodeheading'] = 'Mode Focus';
$string['focusmodeheading_desc'] = 'Un contrôle flottant sur les pages de contenu de cours, le Tableau de bord (/my/), Mes cours (/my/courses.php) et les pages d’accueil personnalisées MuTMS qui masque la navigation secondaire et les tiroirs et élargit le contenu principal. La préférence est stockée par cours ou par page dans le navigateur (localStorage).';
$string['enablefocusmode'] = 'Activer le mode Focus';
$string['enablefocusmode_desc'] = 'Afficher le bouton Mode Focus (en bas à droite) sur les pages d’accueil de cours, de section et d’activité ainsi que sur le Tableau de bord (/my/), Mes cours (/my/courses.php) et les pages d’accueil personnalisées MuTMS. Par défaut : Oui.';
$string['focusmodeenable'] = 'Mode Focus';
$string['focusmodedisable'] = 'Quitter le mode Focus';
$string['focusmodenotice'] = 'Le mode Focus est activé. Cliquez sur × en bas à droite pour le désactiver.';


// Settings: User menu tiles tab.
$string['usermenutab'] = 'Menu utilisateur';
$string['usermenuheading'] = 'Tuiles du menu utilisateur';
$string['usermenuheading_desc'] = 'Restyle le menu de profil en une grille de tuiles style Launch Pad (mêmes destinations Boost). L’apparence du panneau correspond déjà à Accessibilité / Launch Pad. Désactivez pour conserver la liste verticale de liens.';
$string['enableusermenutiles'] = 'Activer les tuiles du menu utilisateur';
$string['enableusermenutiles_desc'] = 'Afficher les éléments du menu de profil en grille de tuiles à 3 colonnes avec des icônes Font Awesome. Par défaut : Oui. Mettez Non pour la liste verticale.';

// Settings: Compact navbar tab.
$string['navbartab'] = 'Barre de navigation';
$string['navbarheading'] = 'Barre de navigation compacte';
$string['navbarheading_desc'] = 'Barre supérieure un peu plus serrée, soulignement plus clair du lien actif et cibles de clic cohérentes pour les icônes utilitaires. Le logo du site et la couleur de marque restent dans Boost Union → Apparence (parcours multi-clients). La disposition de connexion est inchangée (connexion Boost Union uniquement).';
$string['enablecompactnavbar'] = 'Activer la barre de navigation compacte';
$string['enablecompactnavbar_desc'] = 'Appliquer l’apparence compacte de la barre sur toutes les pages sauf la connexion. Par défaut : Oui. Désactivez pour utiliser la hauteur standard de la barre Boost Union.';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = 'Mes cours';
$string['mycoursesheading'] = 'Disposition Mes cours';
$string['mycoursesheading_desc'] = 'Habillage optionnel de grille de cartes sur la page Mes cours (/my/courses.php) à la largeur par défaut de Moodle / Boost Union (extensible via le mode Focus). Habille le bloc standard Vue d’ensemble des cours — ne le remplace pas. Recherche, regroupement, tri et modes d’affichage restent ceux de Moodle central.';
$string['enablemycourseslayout'] = 'Activer la disposition Mes cours';
$string['enablemycourseslayout_desc'] = 'Affiche une grille de cartes responsive (1 à 3 colonnes à la largeur par défaut, jusqu’à 5 colonnes en mode Focus) et restyle les cartes (ombre, progression circulaire sur l’image, étoile sur l’image). Par défaut : Oui.';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = 'Statistiques Mes cours';
$string['mycoursesstatsheading_desc'] = 'Bandeau de statistiques optionnel en haut de Mes cours (/my/courses.php) pour l’utilisateur actuel : Inscriptions, Achèvements, Badges et Certificats. Chaque panneau peut être activé indépendamment.';
$string['enablemycoursesstats'] = 'Activer les statistiques Mes cours';
$string['enablemycoursesstats_desc'] = 'Afficher le bandeau de statistiques au-dessus de la vue d’ensemble des cours sur Mes cours. Par défaut : Oui.';
$string['mycoursesstatsenrolments'] = 'Afficher le panneau Inscriptions';
$string['mycoursesstatsenrolments_desc'] = 'Nombre de cours actifs (en cours) de l’utilisateur actuel. Par défaut : Oui.';
$string['mycoursesstatscompletions'] = 'Afficher le panneau Achèvements';
$string['mycoursesstatscompletions_desc'] = 'Nombre de cours que l’utilisateur actuel a terminés. Par défaut : Oui.';
$string['mycoursesstatsbadges'] = 'Afficher le panneau Badges';
$string['mycoursesstatsbadges_desc'] = 'Nombre de badges attribués à l’utilisateur actuel. Par défaut : Oui.';
$string['mycoursesstatscertificates'] = 'Afficher le panneau Certificats';
$string['mycoursesstatscertificates_desc'] = 'Nombre de certificats attribués à l’utilisateur actuel (tool_certificate ou mod_customcert s’ils sont installés ; sinon 0). Par défaut : Oui.';
$string['mycoursesstatsaria'] = 'Statistiques Mes cours';
$string['mycoursesstatsenrolmentstitle'] = 'Inscriptions';
$string['mycoursesstatsenrolmentssub'] = '{$a} Cours actifs';
$string['mycoursesstatscompletionstitle'] = 'Achèvements';
$string['mycoursesstatscompletionssub'] = '{$a} Cours terminés';
$string['mycoursesstatsbadgestitle'] = 'Badges';
$string['mycoursesstatsbadgessub'] = '{$a} Attribués';
$string['mycoursesstatscertificatestitle'] = 'Certificats';
$string['mycoursesstatscertificatessub'] = '{$a} Attribués';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = 'Tableau de bord';
$string['dashboardheading'] = 'Disposition du Tableau de bord';
$string['dashboardheading_desc'] = 'Habillage optionnel de grille de cartes et de surfaces de blocs du Tableau de bord sur /my/ à la largeur par défaut de Moodle / Boost Union (extensible via le mode Focus), avec un chrome de cartes Vue d’ensemble des cours partagé avec Mes cours. La disposition en colonnes (Calendrier / Événements à venir à droite) utilise Boost Union Outside (droite) — configurez sous Sensation → Blocs.';
$string['enabledashboardlayout'] = 'Activer la disposition du Tableau de bord';
$string['enabledashboardlayout_desc'] = 'Applique le même chrome de cartes Vue d’ensemble des cours que Mes cours sur le Tableau de bord (1 à 3 colonnes à la largeur par défaut, 4 colonnes en mode Focus). Unifie aussi les surfaces des blocs Chronologie / Calendrier / À venir et adoucit les états vides pour qu’ils correspondent. Par défaut : Oui. Activez Boost Union Outside (droite) séparément pour la colonne de droite.';
$string['dashboardsurfacesnote'] = 'Lorsque la disposition du Tableau de bord est activée, Everon applique aussi des jetons de surface de bloc partagés (bordure douce, rayon, ombre) et un style d’état vide plus calme pour Chronologie / À venir afin que les blocs d’accompagnement correspondent aux cartes de cours.';

// Privacy API.
$string['privacy:metadata'] = 'Le thème Everon ne stocke aucune donnée personnelle sur aucun utilisateur. Les préférences d’Accessibilité et du mode Focus sont stockées uniquement dans le navigateur. Les liens Launch Pad, la disposition Mes cours, les statistiques Mes cours, la disposition du Tableau de bord et la barre compacte sont des réglages d’administration du site.';
