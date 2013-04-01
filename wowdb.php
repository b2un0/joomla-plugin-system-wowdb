<?php

/**
 * WoWDB
 *
 * @author     Branko Wilhelm <bw@z-index.net>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 Branko Wilhelm
 * @package    plg_wowdb
 * @license    GNU General Public License v3
 * @version    $Id$
 */
 
// no direct access
defined('_JEXEC') or die;

class plgSystemWoWDB extends JPlugin {

	public function onBeforeRender() {
		if (JFactory::getApplication()->isAdmin()) {
			return;
		}
		
		if($this->params->get('jquery', 1)) {
			$jquery = '//ajax.googleapis.com/ajax/libs/jquery/' . $this->params->get('jquery_branch') . '/jquery.min.js';
			
			if($this->params->get('jquery_noconflict', 1)) {
				$js[] = '<script src="' . $jquery . '" type="text/javascript"></script>';
				$js[] = '<script>$.noConflict()</script>';
				$js[] = '<script src="//static-azeroth.cursecdn.com/current/js/syndication/tt.js" type="text/javascript"></script>';
				
				JFactory::getDocument()->addCustomTag(implode(PHP_EOL, $js));
			}else{
				JFactory::getDocument()->addScript($jquery);
				JFactory::getDocument()->addScript('//static-azeroth.cursecdn.com/current/js/syndication/tt.js');
			}
		}else{
			JFactory::getDocument()->addScript('//static-azeroth.cursecdn.com/current/js/syndication/tt.js');
		}
    }
}
