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
$string['choosereadme'] = 'Everon es un tema hijo de Boost Union para Project Theme. Incluye el aspecto estándar de Union más funciones opcionales como la barra de accesibilidad, Launch Pad, Modo enfoque, el diseño de Mis cursos y el diseño del Tablero.';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon es un tema hijo de Boost Union para Project Theme. Prefiera los ajustes de Aspecto/Contenido de Union; Everon añade funciones como la barra de accesibilidad, atajos de Launch Pad, Modo enfoque, el diseño de tarjetas de Mis cursos y el diseño del Tablero.';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = 'Herencia';
$string['inheritanceinherit'] = 'Heredar';
$string['inheritanceduplicate'] = 'Duplicar';
$string['inheritanceoptionsexplanation'] = 'La mayoría de las veces, heredar será perfectamente adecuado. Sin embargo, puede ocurrir que se integre código imperfecto en Boost Union que impida una herencia SCSS sencilla para determinadas funciones de Boost Union. Si encuentra problemas con funciones de Boost Union que tampoco parecen funcionar en Everon, pruebe a cambiar este ajuste a \'Duplicar\' y, si eso resuelve el problema, informe de un problema en Github (consulte el archivo README.md para saber cómo informar de un problema).';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'Herencia de Pre SCSS';
$string['prescssinheritancesetting_desc'] = 'Con este ajuste controla si el código pre SCSS de Boost Union debe heredarse o duplicarse.';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'Herencia de Extra SCSS';
$string['extrascssinheritancesetting_desc'] = 'Con este ajuste controla si el código extra SCSS de Boost Union debe heredarse o duplicarse.';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = 'Accesibilidad';
$string['accessibilityheading'] = 'Barra de accesibilidad';
$string['accessibilityheading_desc'] = 'Utilidad de la barra de navegación que permite a cada usuario ajustar el contenido, el color y las herramientas de asistencia. Las preferencias se guardan en el navegador (localStorage), no en las preferencias de usuario de Moodle.';
$string['enableaccessibilitytool'] = 'Activar la barra de accesibilidad';
$string['enableaccessibilitytool_desc'] = 'Mostrar el icono de accesibilidad en la barra superior (junto a notificaciones/mensajes) y cargar la barra. Predeterminado: Sí.';
$string['accessibilitymenu'] = 'Opciones de accesibilidad';
$string['a11ycontentadjustments'] = 'Ajustes de contenido';
$string['a11ycoloradjustments'] = 'Ajustes de color';
$string['a11ytools'] = 'Herramientas';
$string['a11yadjustfontsize'] = 'Ajustar tamaño de fuente';
$string['a11ydecreasefont'] = 'Reducir tamaño de fuente';
$string['a11yincreasefont'] = 'Aumentar tamaño de fuente';
$string['a11yhighlighttitle'] = 'Resaltar título';
$string['a11yhighlightlinks'] = 'Resaltar enlaces';
$string['a11ydyslexiafont'] = 'Fuente para dislexia';
$string['a11yletterspacing'] = 'Espaciado entre letras';
$string['a11ylineheight'] = 'Altura de línea';
$string['a11yfontweight'] = 'Grosor de fuente';
$string['a11ydarkcontrast'] = 'Contraste oscuro';
$string['a11ylightcontrast'] = 'Contraste claro';
$string['a11yhighcontrast'] = 'Alto contraste';
$string['a11yhighsaturation'] = 'Alta saturación';
$string['a11ylowsaturation'] = 'Baja saturación';
$string['a11ymonochrome'] = 'Monocromo';
$string['a11ydarkmode'] = 'Modo oscuro';
$string['a11yreadingguide'] = 'Guía de lectura';
$string['a11ystopanimations'] = 'Detener animaciones';
$string['a11ybigcursor'] = 'Cursor grande';
$string['a11yresetall'] = 'Restablecer todos los ajustes de accesibilidad';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = 'Icono de la barra de navegación que abre enlaces de acceso rápido según el rol. El paquete predeterminado es Administradores del sitio; añada otros roles del sitio según sea necesario. Los paquetes coincidentes se combinan y se deduplican por URL. El icono se oculta cuando Launch Pad está desactivado o el usuario actual no tiene enlaces.';
$string['enablelaunchpad'] = 'Activar Launch Pad';
$string['enablelaunchpad_desc'] = 'Mostrar el icono de Launch Pad en la barra superior (después de la herramienta de accesibilidad, antes del menú de usuario) cuando el usuario tenga al menos un enlace configurado. Predeterminado: No — actívelo después de añadir los enlaces JSON a continuación.';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = 'Matriz JSON de objetos con <code>label</code>, <code>url</code> (ruta relativa al sitio como <code>/admin/search.php</code>) e <code>icon</code> opcional (clase Font Awesome, p. ej. <code>fa-cog</code>). Las URL externas se rechazan en la v1. Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = 'Enlaces: Administradores del sitio';
$string['launchpadlinks_siteadmin_desc'] = 'Se muestra cuando el usuario es administrador del sitio (<code>is_siteadmin()</code>).';
$string['launchpadlinks_manager'] = 'Enlaces: Gestor';
$string['launchpadlinks_manager_desc'] = 'Ajuste legado del MVP (migrado a un paquete de rol de gestor cuando es posible).';
$string['launchpadlinks_authenticated'] = 'Enlaces: Usuarios autenticados';
$string['launchpadlinks_authenticated_desc'] = 'Reserva para todo usuario registrado que no sea invitado. Se combina después de siteadmin y los paquetes de roles.';

$string['launchpadrolelinks'] = 'Paquetes de enlaces por rol';
$string['launchpadrolelinks_desc'] = 'Configure listas de enlaces JSON. Administradores del sitio siempre está presente (predeterminado). Use Añadir rol para cualquier otro rol del sitio. Los paquetes de rol coinciden cuando el usuario tiene ese rol en cualquier contexto. El almacén usa ids de rol; las etiquetas muestran el nombre actual del rol.';
$string['launchpadbuiltinpacks'] = 'Paquetes integrados';
$string['launchpadconfiguredroles'] = 'Paquetes configurados';
$string['launchpadaddrole'] = 'Añadir rol';
$string['launchpadremoverole'] = 'Eliminar';
$string['launchpadchooserole'] = 'Elija un rol…';
$string['launchpadlinks_role'] = 'Enlaces: {$a}';
$string['launchpadrolemissing'] = 'Rol #{$a} (ausente)';
$string['launchpadrolemapinvalid'] = 'Los enlaces de rol de Launch Pad deben ser un objeto JSON que asigne claves de paquete a matrices de enlaces.';

$string['launchpadjsoninvalid'] = 'Los enlaces de Launch Pad deben ser una matriz JSON de objetos, cada uno con label y url no vacíos.';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = 'Modo enfoque';
$string['focusmodeheading'] = 'Modo enfoque';
$string['focusmodeheading_desc'] = 'Un control flotante en las páginas de contenido del curso, el Tablero (/my/) y Mis cursos (/my/courses.php) que oculta la navegación secundaria y los cajones y ensancha el contenido principal. La preferencia se guarda por curso o página en el navegador (localStorage).';
$string['enablefocusmode'] = 'Activar Modo enfoque';
$string['enablefocusmode_desc'] = 'Mostrar el botón de Modo enfoque (abajo a la derecha) en las páginas de inicio del curso, sección y actividad, así como en el Tablero (/my/) y Mis cursos (/my/courses.php). Predeterminado: Sí.';
$string['focusmodeenable'] = 'Modo enfoque';
$string['focusmodedisable'] = 'Salir del modo enfoque';
$string['focusmodenotice'] = 'El modo enfoque está activado. Haga clic en × abajo a la derecha para desactivarlo.';


// Settings: User menu tiles tab.
$string['usermenutab'] = 'Menú de usuario';
$string['usermenuheading'] = 'Mosaicos del menú de usuario';
$string['usermenuheading_desc'] = 'Rediseña el menú de perfil como una cuadrícula de mosaicos al estilo Launch Pad (mismos destinos de Boost). El aspecto del panel ya coincide con Accesibilidad / Launch Pad. Desactívelo para conservar la lista vertical de enlaces.';
$string['enableusermenutiles'] = 'Activar mosaicos del menú de usuario';
$string['enableusermenutiles_desc'] = 'Mostrar los elementos del menú de perfil como una cuadrícula de mosaicos de 3 columnas con iconos Font Awesome. Predeterminado: Sí. Póngalo en No para la lista vertical.';

// Settings: Compact navbar tab.
$string['navbartab'] = 'Barra de navegación';
$string['navbarheading'] = 'Barra de navegación compacta';
$string['navbarheading_desc'] = 'Barra superior ligeramente más estrecha, subrayado más claro del enlace activo e iconos de utilidad con zonas de pulsación coherentes. El logo del sitio y el color de marca permanecen en Boost Union → Aspecto (ruta multi-cliente). El diseño de inicio de sesión no cambia (solo el inicio de sesión de Boost Union).';
$string['enablecompactnavbar'] = 'Activar barra de navegación compacta';
$string['enablecompactnavbar_desc'] = 'Aplicar el aspecto de barra compacta en todas las páginas excepto el inicio de sesión. Predeterminado: Sí. Desactívelo para usar la altura estándar de la barra de Boost Union.';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = 'Mis cursos';
$string['mycoursesheading'] = 'Diseño de Mis cursos';
$string['mycoursesheading_desc'] = 'Diseño opcional de cuadrícula de tarjetas en la página Mis cursos (/my/courses.php) con el ancho predeterminado de Moodle / Boost Union (ampliable mediante el Modo enfoque). Aplica estilo al bloque estándar Resumen de cursos — no lo sustituye. La búsqueda, el agrupamiento, la ordenación y los modos de vista siguen siendo de Moodle central.';
$string['enablemycourseslayout'] = 'Activar diseño de Mis cursos';
$string['enablemycourseslayout_desc'] = 'Muestra una cuadrícula responsiva de tarjetas (1–3 columnas con el ancho predeterminado y hasta 5 columnas en Modo enfoque) y rediseña las tarjetas (sombra, progreso circular en la imagen, estrella en la imagen). Predeterminado: Sí.';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = 'Estadísticas de Mis cursos';
$string['mycoursesstatsheading_desc'] = 'Franja de estadísticas opcional en la parte superior de Mis cursos (/my/courses.php) para el usuario actual: Matrículas, Finalizaciones, Insignias y Certificados. Cada panel puede activarse de forma independiente.';
$string['enablemycoursesstats'] = 'Activar estadísticas de Mis cursos';
$string['enablemycoursesstats_desc'] = 'Mostrar la franja de estadísticas encima del resumen de cursos en Mis cursos. Predeterminado: Sí.';
$string['mycoursesstatsenrolments'] = 'Mostrar panel de Matrículas';
$string['mycoursesstatsenrolments_desc'] = 'Recuento de los cursos activos (en progreso) del usuario actual. Predeterminado: Sí.';
$string['mycoursesstatscompletions'] = 'Mostrar panel de Finalizaciones';
$string['mycoursesstatscompletions_desc'] = 'Recuento de cursos que el usuario actual ha completado. Predeterminado: Sí.';
$string['mycoursesstatsbadges'] = 'Mostrar panel de Insignias';
$string['mycoursesstatsbadges_desc'] = 'Recuento de insignias concedidas al usuario actual. Predeterminado: Sí.';
$string['mycoursesstatscertificates'] = 'Mostrar panel de Certificados';
$string['mycoursesstatscertificates_desc'] = 'Recuento de certificados concedidos al usuario actual (tool_certificate o mod_customcert si están instalados; en caso contrario 0). Predeterminado: Sí.';
$string['mycoursesstatsaria'] = 'Estadísticas de Mis cursos';
$string['mycoursesstatsenrolmentstitle'] = 'Matrículas';
$string['mycoursesstatsenrolmentssub'] = '{$a} Cursos activos';
$string['mycoursesstatscompletionstitle'] = 'Finalizaciones';
$string['mycoursesstatscompletionssub'] = '{$a} Cursos completados';
$string['mycoursesstatsbadgestitle'] = 'Insignias';
$string['mycoursesstatsbadgessub'] = '{$a} Concedidas';
$string['mycoursesstatscertificatestitle'] = 'Certificados';
$string['mycoursesstatscertificatessub'] = '{$a} Concedidos';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = 'Tablero';
$string['dashboardheading'] = 'Diseño del Tablero';
$string['dashboardheading_desc'] = 'Diseño opcional de cuadrícula de tarjetas y superficies de bloques del Tablero en /my/ con el ancho predeterminado de Moodle / Boost Union (ampliable mediante el Modo enfoque) y el mismo aspecto de tarjetas del Resumen de cursos que en Mis cursos. El diseño en columnas (Calendario / Próximos eventos a la derecha) usa Boost Union Outside (derecha) — configúrelo en Sensación → Bloques.';
$string['enabledashboardlayout'] = 'Activar diseño del Tablero';
$string['enabledashboardlayout_desc'] = 'Aplica el mismo aspecto de tarjetas del Resumen de cursos que en Mis cursos en el Tablero (1–3 columnas con el ancho predeterminado y 4 columnas en Modo enfoque). También unifica las superficies de los bloques Línea de tiempo / Calendario / Próximos y suaviza los estados vacíos para que coincidan. Predeterminado: Sí. Active Boost Union Outside (derecha) por separado para la columna derecha.';
$string['dashboardsurfacesnote'] = 'Cuando el diseño del Tablero está activado, Everon también aplica tokens compartidos de superficie de bloque (borde suave, radio, sombra) y un estilo más calmado de estados vacíos de Línea de tiempo / Próximos para que los bloques de apoyo coincidan con las tarjetas de curso.';

// Privacy API.
$string['privacy:metadata'] = 'El tema Everon no almacena ningún dato personal de ningún usuario. Las preferencias de Accesibilidad y Modo enfoque se guardan solo en el navegador. Los enlaces de Launch Pad, el diseño de Mis cursos, las estadísticas de Mis cursos, el diseño del Tablero y la barra compacta son ajustes de administración del sitio.';
