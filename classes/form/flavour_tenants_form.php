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
 * Form to map Boost Union flavours to MuTMS tenants.
 *
 * @package    theme_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_everon\form;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');

/**
 * Maps each Boost Union flavour to zero or more MuTMS tenants.
 */
class flavour_tenants_form extends \moodleform {

    /**
     * Form definition.
     */
    public function definition() {
        $mform = $this->_form;
        $flavours = $this->_customdata['flavours'] ?? [];
        $maps = $this->_customdata['maps'] ?? [];
        $tenantoptions = $this->_customdata['tenantoptions'] ?? [];
        $yesno = [
            0 => get_string('no'),
            1 => get_string('yes'),
        ];

        $mform->addElement('header', 'flavourtenantsheader', get_string('flavourtenantsheading', 'theme_everon'));
        $mform->addElement('html', '<p class="form-description">' .
            get_string('flavourtenantsintro', 'theme_everon') . '</p>');

        foreach ($flavours as $flavour) {
            $fid = (int) $flavour->id;
            $prefix = 'flavour_' . $fid . '_';

            $mform->addElement('header', $prefix . 'hdr', format_string($flavour->title));

            $mform->addElement('select', $prefix . 'apply', get_string('flavourapplytotenants', 'theme_everon'), $yesno);
            $mform->setType($prefix . 'apply', PARAM_INT);
            $mform->setDefault($prefix . 'apply', 0);
            $mform->addHelpButton($prefix . 'apply', 'flavourapplytotenants', 'theme_everon');

            $mform->addElement(
                'autocomplete',
                $prefix . 'tenants',
                get_string('flavourtenants', 'theme_everon'),
                $tenantoptions,
                ['multiple' => true]
            );
            $mform->setType($prefix . 'tenants', PARAM_INT);
            $mform->hideIf($prefix . 'tenants', $prefix . 'apply', 'neq', 1);
            $mform->addHelpButton($prefix . 'tenants', 'flavourtenants', 'theme_everon');

            if (isset($maps[$fid]) && !empty($maps[$fid]->applytotenants)) {
                $mform->setDefault($prefix . 'apply', 1);
                $ids = json_decode((string) $maps[$fid]->applytotenants_ids, true);
                if (is_array($ids)) {
                    $mform->setDefault($prefix . 'tenants', array_map('intval', $ids));
                }
            }
        }

        $this->add_action_buttons(true, get_string('savechanges'));
    }
}
