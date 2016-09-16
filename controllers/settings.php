<?php

/**
 * Redwood global settings controller.
 *
 * @category   apps
 * @package    content-filter-business
 * @subpackage controllers
 * @author     ClearCenter <developer@clearcenter.com>
 * @copyright  2016 ClearCenter
 * @license    http://www.clearcenter.com/app_license ClearCenter license
 * @link       http://www.clearcenter.com/support/documentation/clearos/content_filter_business/
 */

///////////////////////////////////////////////////////////////////////////////
// C L A S S
///////////////////////////////////////////////////////////////////////////////

/**
 * Redwood global settings controller.
 *
 * @category   apps
 * @package    content-filter-business
 * @subpackage controllers
 * @author     ClearCenter <developer@clearcenter.com>
 * @copyright  2016 ClearCenter
 * @license    http://www.clearcenter.com/app_license ClearCenter license
 * @link       http://www.clearcenter.com/support/documentation/clearos/content_filter_business/
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

        $this->lang->load('content_filter_business');
        $this->load->library('content_filter_business/Redwood');

        // Set validation rules
        //---------------------

        // Handle form submit
        //-------------------

        if (($this->input->post('submit') && $form_ok)) {
            try {
                $this->redwood->reset(TRUE);

                $this->page->set_status_updated();

                redirect('/content_filter_business/settings');
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

        $this->page->view_form('content_filter_business/settings', $data, lang('content_filter_business_global_settings'));
    }
}
