<?php

/**
 * Warning view.
 *
 * @category   apps
 * @package    redwood-content-filter
 * @subpackage views
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2016 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/redwood_content_filter/
 */

///////////////////////////////////////////////////////////////////////////////
// Load dependencies
///////////////////////////////////////////////////////////////////////////////

$this->lang->load('base');
$this->lang->load('network');
$this->lang->load('redwood_content_filter');

///////////////////////////////////////////////////////////////////////////////
// Form 
///////////////////////////////////////////////////////////////////////////////

// TODO: header tags are not well defined in theme, hack using <p>
$content = '';

// Address
if (!empty($url))
    $content .= '<p><strong>' . lang('redwood_content_filter_web_address') . '</strong></p><p>' . $url . '</p>';

// User
if (!empty($user))
    $content .= '<p><strong>' . lang('redwood_content_filter_user') . '</strong></p><p>' . $user . '</p>';

// IP
if (!empty($ip))
    $content .= '<p><strong>' . lang('network_ip') . '</strong></p><p>' . $ip . '</p>';

// Categories
if (!empty($categories)) {
    $content .= '<p><strong>' . lang('redwood_content_filter_categories') . '</strong></p><ul>';
    foreach ($categories as $category)
        $content .= '<li>' . $category . '</li>';
    $content .= '</ul>';
}

// Scores
if (!empty($scores)) {
    $content .= '<p><strong>' . lang('redwood_content_filter_scores') . '</strong></p><ul>';
    foreach ($scores as $category => $score)
        $content .= '<li>' . $category . ': ' . $score . '</li>';
    $content .= '</ul>';
}

echo box_open(lang('redwood_content_filter_content_filter_warning'));
echo box_content_open();
echo box_content($content);
echo box_content_close();
echo box_close();
