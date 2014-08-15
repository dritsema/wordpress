# WordPress
===================

WordPress plugins that were customized in some way to fit a specific need.  Please note these changes below and adjust the code as necessary for your environment.  Otherwise, enjoy!

===================

## saml-20-single-sign-on

Original source: https://wordpress.org/plugins/saml-20-single-sign-on/

Modified for Multisite.  Changes for our specific configuration are noted.

* /lib/classes/saml_client.php
* /lib/views/nav_tabs.php
* /saml/config/authsources.php

Custom changes:
* /lib/classes/saml_settings.php
* /lib/controllers/sso_sp.php
* /lib/views/sso_sp.php
* /saml/modules/saml/lib/Message.php
* /saml/modules/saml/www/sp/saml2-acs.php

## restricted-site-access

Original source: https://wordpress.org/plugins/restricted-site-access/

Modified for SSO. “Restricting” the site means you can not hit any page without authenticating first.  The SAML plugin needs to process the assertion sent from the external IdP.  Unless the SAML URLs are whitelisted, the user is entered into an infinite loop between the WordPress login and the IdP.

* /restricted_site_access.php