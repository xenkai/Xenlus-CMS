<?php
/**
 * Xenlus
 * Copyright 2011 Xenlus Group. All Rights Reserved.
 */

// No direct access to anyone.
defined('_XEXEC') or die;

/**
 * Version information.
 */
class XVersion {
	// Product Name
	public $PRODUCT = 'Xenlus CMS';
	// Main Release Level
	public $RELEASE = '1.0';
	// Development Status
	public $DEV_STATUS = 'Pre-Alpha';
	// Codename
	public $CODENAME = 'BlueBerry Yogurt';
	// Release Date
	public $RELDATE = '20-Jan-2011';
	// Release Time
	public $RELTIME = '20:00';
	// Release Timezone
	public $RELTZ = 'GMT';
	// Copyright Text
	public $COPYRIGHT = 'Copyright &copy; 2010 - 2011 Xenlus. All Rights Reserved.';
	// URL
	public $URL = '<a href="http://www.xenlus.com">Xenlus CMS</a> is Free Software released under the GNU General Public License.';
	
	/**
	 * Method to get the long version information.
	 */
	public function getLongVersion() {
		return $this->PRODUCT . ' ' . $this->RELEASE . '.' . $this->DEV_STATUS . ' [ '.$this->CODENAME . ' ] ' . $this->RELDATE . ' ' . $this->RELTIME . ' ' . $this->RELTZ;
	}
	
	/**
	 * Method to get the short version information.
	 */
	public function getShortVersion() {
		return $this->RELEASE . '.' . $this->DEV_STATUS;
	}
}

?>
