<?php

/////////////////////////////////////////////////////////////////////////////
// General information
/////////////////////////////////////////////////////////////////////////////

$app['basename'] = 'content_filter_business';
$app['version'] = '1.0.0';
$app['release'] = '1';
$app['vendor'] = 'ClearCenter';
$app['packager'] = 'ClearCenter';
$app['license'] = 'Proprietary';
$app['license_core'] = 'Proprietary';
$app['description'] = lang('content_filter_business_app_description');

/////////////////////////////////////////////////////////////////////////////
// App name and categories
/////////////////////////////////////////////////////////////////////////////

$app['name'] = lang('content_filter_business_app_name');
$app['category'] = lang('base_category_gateway');
$app['subcategory'] = lang('base_subcategory_content_filter_and_proxy');

/////////////////////////////////////////////////////////////////////////////
// Controllers
/////////////////////////////////////////////////////////////////////////////

$app['controllers']['content_filter']['title'] = lang('content_filter_business_app_name');
$app['controllers']['settings']['title'] = lang('base_settings');
$app['controllers']['policy']['title'] = lang('base_app_policy');

/////////////////////////////////////////////////////////////////////////////
// Packaging
/////////////////////////////////////////////////////////////////////////////

$app['requires'] = array(
    'app-antivirus',
    'app-network',
    'app-groups',
    'app-users',
);

$app['core_requires'] = array(
    'app-antivirus-core',
    'app-base-core',
    'app-events-core',
    'app-firewall-core',
    'app-policy-manager-core',
    'app-groups-core',
    'app-network-core',
    'redwood-filter',
);

$app['core_directory_manifest'] = array(
    '/var/clearos/content_filter_business' => array(),
);

$app['core_file_manifest'] = array(
    'content_filter_business.acl'=> array('target' => '/var/clearos/base/access_control/public/content_filter_business'),
    'redwood-filter.php'=> array('target' => '/var/clearos/base/daemon/redwood-filter.php'),
    'network-configuration-event'=> array(
        'target' => '/var/clearos/events/network_configuration/content_filter_business',
        'mode' => '0755'
    )
);

$app['delete_dependency'] = array(
    'app-content-filter-business-core',
    'redwood-filter'
);
