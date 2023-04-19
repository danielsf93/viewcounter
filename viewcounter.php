<?php

import('lib.pkp.classes.plugins.GenericPlugin');

class viewcounter extends GenericPlugin {
    public function register($category, $path, $mainContextId = NULL) {
        $success = parent::register($category, $path);
            if ($success && $this->getEnabled()) {
               HookRegistry::register('TemplateResource::getFilename', array($this, '_overridePluginTemplates'));
    
            }
        return $success;
    }

  /**
   * Provide a name for this plugin
   *
   * The name will appear in the plugins list where editors can
   * enable and disable plugins.
   */
	public function getDisplayName() {
		return __('viewcounter');
	}

	/**
   * Provide a description for this plugin
   *
   * The description will appear in the plugins list where editors can
   * enable and disable plugins.
   */
	public function getDescription() {
		return __('viewcounter');
	}
	
	/**
	 * Get the name of the settings file to be installed on new context
	 * creation.
	 * @return string
	 */
	function getContextSpecificPluginSettingsFile() {
		return $this->getPluginPath() . '/settings.xml';
	}

	public function _overridePluginTemplates($hookName, $args) {
		$templatePath = $args[0];
		if ($templatePath === 'templates/frontend/objects/article_details.tpl') {
			$args[0] = 'plugins/generic/viewcounter/templates/frontend/objects/article_details.tpl';
		}
		return false;
	}





}