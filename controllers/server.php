<?php

/**
 * Redwood daemon controller.
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
// B O O T S T R A P
///////////////////////////////////////////////////////////////////////////////

$bootstrap = getenv('CLEAROS_BOOTSTRAP') ? getenv('CLEAROS_BOOTSTRAP') : '/usr/clearos/framework/shared';
require_once $bootstrap . '/bootstrap.php';

///////////////////////////////////////////////////////////////////////////////
// D E P E N D E N C I E S
///////////////////////////////////////////////////////////////////////////////

require clearos_app_base('base') . '/controllers/daemon.php';

///////////////////////////////////////////////////////////////////////////////
// C L A S S
///////////////////////////////////////////////////////////////////////////////

/**
 * Redwood daemon controller.
 *
 * @category   apps
 * @package    content-filter-business
 * @subpackage controllers
 * @author     ClearCenter <developer@clearcenter.com>
 * @copyright  2016 ClearCenter
 * @license    http://www.clearcenter.com/app_license ClearCenter license
 * @link       http://www.clearcenter.com/support/documentation/clearos/content_filter_business/
 */

class Server extends Daemon
{
    /**
     * DansGuardian daemon constructor.
     */

    function __construct()
    {
        parent::__construct('redwood-filter', 'content_filter_business');
    }
}
