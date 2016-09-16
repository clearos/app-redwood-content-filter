
Name: app-redwood-content-filter
Epoch: 1
Version: 1.0.0
Release: 1%{dist}
Summary: Redwood Content Filter
License: GPLv3
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
Redwood Content Filter - a description goes here.

%package core
Summary: Redwood Content Filter - Core
License: LGPLv3
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
Redwood Content Filter - a description goes here.

This package provides the core API and libraries.

%prep
%setup -q
%build

%install
mkdir -p -m 755 %{buildroot}/usr/clearos/apps/redwood_content_filter
cp -r * %{buildroot}/usr/clearos/apps/redwood_content_filter/

install -d -m 0755 %{buildroot}/var/clearos/redwood_content_filter
install -D -m 0755 packaging/network-configuration-event %{buildroot}/var/clearos/events/network_configuration/redwood_content_filter
install -D -m 0644 packaging/redwood-filter.php %{buildroot}/var/clearos/base/daemon/redwood-filter.php
install -D -m 0644 packaging/redwood_content_filter.acl %{buildroot}/var/clearos/base/access_control/public/redwood_content_filter

%post
logger -p local6.notice -t installer 'app-redwood-content-filter - installing'

%post core
logger -p local6.notice -t installer 'app-redwood-content-filter-core - installing'

if [ $1 -eq 1 ]; then
    [ -x /usr/clearos/apps/redwood_content_filter/deploy/install ] && /usr/clearos/apps/redwood_content_filter/deploy/install
fi

[ -x /usr/clearos/apps/redwood_content_filter/deploy/upgrade ] && /usr/clearos/apps/redwood_content_filter/deploy/upgrade

exit 0

%preun
if [ $1 -eq 0 ]; then
    logger -p local6.notice -t installer 'app-redwood-content-filter - uninstalling'
fi

%preun core
if [ $1 -eq 0 ]; then
    logger -p local6.notice -t installer 'app-redwood-content-filter-core - uninstalling'
    [ -x /usr/clearos/apps/redwood_content_filter/deploy/uninstall ] && /usr/clearos/apps/redwood_content_filter/deploy/uninstall
fi

exit 0

%files
%defattr(-,root,root)
/usr/clearos/apps/redwood_content_filter/controllers
/usr/clearos/apps/redwood_content_filter/views

%files core
%defattr(-,root,root)
%exclude /usr/clearos/apps/redwood_content_filter/packaging
%dir /usr/clearos/apps/redwood_content_filter
%dir /var/clearos/redwood_content_filter
/usr/clearos/apps/redwood_content_filter/deploy
/usr/clearos/apps/redwood_content_filter/language
/usr/clearos/apps/redwood_content_filter/libraries
/var/clearos/events/network_configuration/redwood_content_filter
/var/clearos/base/daemon/redwood-filter.php
/var/clearos/base/access_control/public/redwood_content_filter
