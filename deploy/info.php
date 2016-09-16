<?php

/////////////////////////////////////////////////////////////////////////////
// General information
/////////////////////////////////////////////////////////////////////////////

$app['basename'] = 'redwood_content_filter';
$app['version'] = '1.0.0';
$app['release'] = '1';
$app['vendor'] = 'ClearFoundation';
$app['packager'] = 'ClearFoundation';
$app['license'] = 'GPLv3';
$app['license_core'] = 'LGPLv3';
$app['description'] = lang('redwood_content_filter_app_description');

/////////////////////////////////////////////////////////////////////////////
// App name and categories
/////////////////////////////////////////////////////////////////////////////

$app['name'] = lang('redwood_content_filter_app_name');
$app['category'] = lang('base_category_gateway');
$app['subcategory'] = lang('base_subcategory_content_filter_and_proxy');

/////////////////////////////////////////////////////////////////////////////
// Controllers
/////////////////////////////////////////////////////////////////////////////

$app['controllers']['content_filter']['title'] = lang('redwood_content_filter_app_name');
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
    '/var/clearos/redwood_content_filter' => array(),
);

$app['core_file_manifest'] = array(
    'redwood_content_filter.acl'=> array('target' => '/var/clearos/base/access_control/public/redwood_content_filter'),
    'redwood-filter.php'=> array('target' => '/var/clearos/base/daemon/redwood-filter.php'),
    'network-configuration-event'=> array(
        'target' => '/var/clearos/events/network_configuration/redwood_content_filter',
        'mode' => '0755'
    )
);

$app['delete_dependency'] = array(
    'app-redwood-content-filter-core',
    'redwood-filter'
);
