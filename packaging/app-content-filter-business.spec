
Name: app-content-filter-business
Epoch: 1
Version: 1.0.0
Release: 1%{dist}
Summary: Content Filter for Business
License: Proprietary
Group: ClearOS/Apps
Source: %{name}-%{version}.tar.gz
Buildarch: noarch
Requires: %{name}-core = 1:%{version}-%{release}
Requires: app-base
Requires: app-antivirus
Requires: app-network
Requires: app-groups
Requires: app-users

%description
Content Filter for Business - a description goes here.

%package core
Summary: Content Filter for Business - Core
License: Proprietary
Group: ClearOS/Libraries
Requires: app-base-core
Requires: app-antivirus-core
Requires: app-base-core
Requires: app-events-core
Requires: app-firewall-core
Requires: app-policy-manager-core
Requires: app-groups-core
Requires: app-network-core
Requires: redwood-filter

%description core
Content Filter for Business - a description goes here.

This package provides the core API and libraries.

%prep
%setup -q
%build

%install
mkdir -p -m 755 %{buildroot}/usr/clearos/apps/content_filter_business
cp -r * %{buildroot}/usr/clearos/apps/content_filter_business/

install -d -m 0755 %{buildroot}/var/clearos/content_filter_business
install -D -m 0644 packaging/content_filter_business.acl %{buildroot}/var/clearos/base/access_control/public/content_filter_business
install -D -m 0755 packaging/network-configuration-event %{buildroot}/var/clearos/events/network_configuration/content_filter_business
install -D -m 0644 packaging/redwood-filter.php %{buildroot}/var/clearos/base/daemon/redwood-filter.php

%post
logger -p local6.notice -t installer 'app-content-filter-business - installing'

%post core
logger -p local6.notice -t installer 'app-content-filter-business-core - installing'

if [ $1 -eq 1 ]; then
    [ -x /usr/clearos/apps/content_filter_business/deploy/install ] && /usr/clearos/apps/content_filter_business/deploy/install
fi

[ -x /usr/clearos/apps/content_filter_business/deploy/upgrade ] && /usr/clearos/apps/content_filter_business/deploy/upgrade

exit 0

%preun
if [ $1 -eq 0 ]; then
    logger -p local6.notice -t installer 'app-content-filter-business - uninstalling'
fi

%preun core
if [ $1 -eq 0 ]; then
    logger -p local6.notice -t installer 'app-content-filter-business-core - uninstalling'
    [ -x /usr/clearos/apps/content_filter_business/deploy/uninstall ] && /usr/clearos/apps/content_filter_business/deploy/uninstall
fi

exit 0

%files
%defattr(-,root,root)
/usr/clearos/apps/content_filter_business/controllers
/usr/clearos/apps/content_filter_business/htdocs
/usr/clearos/apps/content_filter_business/views

%files core
%defattr(-,root,root)
%exclude /usr/clearos/apps/content_filter_business/packaging
%dir /usr/clearos/apps/content_filter_business
%dir /var/clearos/content_filter_business
/usr/clearos/apps/content_filter_business/deploy
/usr/clearos/apps/content_filter_business/language
/usr/clearos/apps/content_filter_business/libraries
/var/clearos/base/access_control/public/content_filter_business
/var/clearos/events/network_configuration/content_filter_business
/var/clearos/base/daemon/redwood-filter.php
