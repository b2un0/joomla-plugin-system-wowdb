<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 - 2014 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

class plgSystemWowdb extends JPlugin
{

    private $js = '//static-azeroth.cursecdn.com/current/js/syndication/tt.js';
    private $advanced = 'var WowDbSettings={AdvancedTooltips:true};';

    public function onBeforeRender()
    {
        if (JFactory::getApplication()->isAdmin()) {
            return;
        }

        $document = JFactory::getDocument();

        if ($this->params->get('advanced')) {
            $document->addScriptDeclaration($this->advanced);
        }

        if (JVersion::isCompatible('3')) {
            JHtml::_('jquery.framework');
            $document->addScript($this->js, 'text/javascript', false, true);
            return;
        }

        if ($this->params->get('jquery', 1)) {
            $jquery = '//ajax.googleapis.com/ajax/libs/jquery/' . $this->params->get('jquery_branch') . '/jquery.min.js';

            if ($this->params->get('jquery_noconflict', 1)) {
                $jq[] = '<script src="' . $jquery . '"></script>';
                $jq[] = '<script type="text/javascript">$.noConflict()</script>';
                $jq[] = '<script src="' . $this->js . '"></script>';

                $document->addCustomTag(implode(PHP_EOL, $jq));
            } else {
                $document->addScript($jquery);
                $document->addScript($this->js, 'text/javascript', false, true);
            }
        } else {
            $document->addScript($this->js, 'text/javascript', false, true);
        }
    }
}