<?php

use EventEspresso\core\services\addon\AddonCollection;
use EventEspresso\core\services\addon\api\v1\AddonApi;

/*
  Plugin Name:  Espresso Analytics
  Plugin URI:  http://www.eventespresso.com
  Description: Integrates Event Espresso with analytics and commerce tracking services
  Version: 0.0.1.rc.001
  Author: Event Espresso
  Author URI: http://www.eventespresso.com
  License: GPLv3
  TextDomain: event_espresso
  Copyright (c) 2008-2020 Event Espresso  All Rights Reserved.

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */
add_action(
	'AHEE__EventEspresso_core_services_addon_AddonManager__initialize__addons',
	function (AddonCollection $addon_collection): void
	{
		$addon = new AddonApi(
			'eea-espresso-analytics',
			'EspressoAnalytics',
			'EventEspresso\Analytics',
			'0.0.1.rc.001',
			'4.11.0.rc.001',
			__FILE__
		);
		$addon->addDataMigrationScripts('EventEspresso\Analytics\services\dms');
		$addon->addEntityClasses('EventEspresso\Analytics\entities\classes');
		$addon->addEntityClassExtensions('EventEspresso\Analytics\entities\class_extensions');
		$addon->addEntityModels('EventEspresso\Analytics\entities\models');
		$addon->addEntityModelExtensions('EventEspresso\Analytics\entities\model_extensions');
		$addon_collection->addAddon($addon);
	}
);
