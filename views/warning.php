<?php

/**
 * Warning view.
 *
 * @category   apps
 * @package    content-filter
 * @subpackage views
 * @author     ClearCenter <developer@clearcenter.com>
 * @copyright  2016 ClearCenter
 * @license    http://www.clearcenter.com/app_license ClearCenter license
 * @link       http://www.clearcenter.com/support/documentation/clearos/content_filter_business/
 */

///////////////////////////////////////////////////////////////////////////////
// Load dependencies
///////////////////////////////////////////////////////////////////////////////

$this->lang->load('base');
$this->lang->load('network');
$this->lang->load('content_filter_business');

///////////////////////////////////////////////////////////////////////////////
// Form 
///////////////////////////////////////////////////////////////////////////////

// TODO: header tags are not well defined in theme, hack using <p>
$content = '';

// Address
if (!empty($url))
    $content .= '<p><strong>' . lang('content_filter_business_web_address') . '</strong></p><p>' . $url . '</p>';

// User
if (!empty($user))
    $content .= '<p><strong>' . lang('content_filter_business_user') . '</strong></p><p>' . $user . '</p>';

// IP
if (!empty($ip))
    $content .= '<p><strong>' . lang('network_ip') . '</strong></p><p>' . $ip . '</p>';

// Categories
if (!empty($categories)) {
    $content .= '<p><strong>' . lang('content_filter_business_categories') . '</strong></p><ul>';
    foreach ($categories as $category)
        $content .= '<li>' . $category . '</li>';
    $content .= '</ul>';
}

// Scores
if (!empty($scores)) {
    $content .= '<p><strong>' . lang('content_filter_business_scores') . '</strong></p><ul>';
    foreach ($scores as $category => $score)
        $content .= '<li>' . $category . ': ' . $score . '</li>';
    $content .= '</ul>';
}

echo box_open(lang('content_filter_business_content_filter_warning'));
echo box_content_open();
echo box_content($content);
echo box_content_close();
echo box_close();
