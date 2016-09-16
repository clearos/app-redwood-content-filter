<?php

/**
 * Redwood global settings controller.
 *
 * @category   apps
 * @package    redwood-content-filter
 * @subpackage controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2016 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/redwood_content_filter/
 */

///////////////////////////////////////////////////////////////////////////////
// C L A S S
///////////////////////////////////////////////////////////////////////////////

/**
 * Redwood global settings controller.
 *
 * @category   apps
 * @package    redwood-content-filter
 * @subpackage controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2016 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/redwood_content_filter/
 */

class Settings extends ClearOS_Controller
{
    /**
     * Redwood settings controller
     *
     * @return view
     */

    function index()
    {
        $this->view();
    }

    /**
     * Content filter settings edit view.
     *
     * @return view
     */

    function edit()
    {
        $this->_common('edit');
    }

    /**
     * Content filter settings view view.
     *
     * @return view
     */

    function view()
    {
        $this->_common('view');
    }

    /**
     * Content filter common form handler.
     *
     * @param string $form_type form type
     *
     * @return view
     */

    function _common($form_type)
    {
        // Load dependencies
        //------------------

        $this->lang->load('redwood_content_filter');
        $this->load->library('redwood_content_filter/Redwood');

        // Set validation rules
        //---------------------

        // Handle form submit
        //-------------------

        if (($this->input->post('submit') && $form_ok)) {
            try {
                $this->redwood->reset(TRUE);

                $this->page->set_status_updated();

                redirect('/redwood_content_filter/settings');
            } catch (Exception $e) {
                $this->page->view_exception($e);
                return;
            }
        }

        // Load view data
        //---------------

        try {
        } catch (Exception $e) {
            $this->page->view_exception($e);
            return;
        }

        // Load views
        //-----------

        $this->page->view_form('redwood_content_filter/settings', $data, lang('base_settings'));
    }
}
