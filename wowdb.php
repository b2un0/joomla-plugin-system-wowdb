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
 
defined('_JEXEC') or die;

class plgSystemWowdb extends JPlugin {
	
	private $js = '//static-azeroth.cursecdn.com/current/js/syndication/tt.js';
	
	public function onBeforeRender() {
		if (JFactory::getApplication()->isAdmin()) {
			return;
		}
		
		$document = JFactory::getDocument();
		
		if(version_compare(JVERSION, '3.0', 'ge')) {
			JHtml::_('jquery.framework');
			$document->addScript($this->js);
			return; 
		}
		
		if($this->params->get('jquery', 1)) {
			$jquery = '//ajax.googleapis.com/ajax/libs/jquery/' . $this->params->get('jquery_branch') . '/jquery.min.js';
			
			if($this->params->get('jquery_noconflict', 1)) {
				$jq[] = '<script src="' . $jquery . '" type="text/javascript"></script>';
				$jq[] = '<script>$.noConflict()</script>';
				$jq[] = '<script src="' . $this->js . '" type="text/javascript"></script>';

				$document->addCustomTag(implode(PHP_EOL, $jq));
			}else{
				$document->addScript($jquery);
				$document->addScript($this->js);
			}
		}
    }
}