<?php

/**
 * wowdb
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
		if($this->params->get('jquery')) {
			JFactory::getDocument()->addScript('//ajax.googleapis.com/ajax/libs/jquery/' . $this->params->get('jquery_branch') . '/jquery.min.js');
		}
		
		JFactory::getDocument()->addScript('//static-azeroth.cursecdn.com/current/js/syndication/tt.js');
    }
}
