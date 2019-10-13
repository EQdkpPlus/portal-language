<?php
/*	Project:	EQdkp-Plus
 *	Package:	Last Comments Portal Module
 *	Link:		http://eqdkp-plus.eu
 *
 *	Copyright (C) 2006-2016 EQdkp-Plus Developer Team
 *
 *	This program is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU Affero General Public License as published
 *	by the Free Software Foundation, either version 3 of the License, or
 *	(at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU Affero General Public License for more details.
 *
 *	You should have received a copy of the GNU Affero General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if(!defined('EQDKP_INC')){
	header('HTTP/1.0 404 Not Found');exit;
}

class language_portal extends portal_generic {
	protected static $path = 'language';
	
	protected static $data = array(
		'name'			=> 'Language Switch',
		'version'		=> '1.0.0',
		'author'		=> 'GodMod',
		'icon'			=> 'fa-language',
		'contact'		=> EQDKP_PROJECT_URL,
		'description'	=> 'Shows a language switch',
		'multiple'		=> false,
		'lang_prefix'	=> 'pmlanguage_'
	);
	protected static $apiLevel = 20;
	
	protected static $install = array(
		'autoenable'		=> '1',
		'defaultposition'	=> 'right',
		'defaultnumber'		=> '2',
	);
	public $template_file = 'language_portal.html';
	
	public function get_settings($state){
		$settings = array();
		
		return $settings;
	}
	
	public function output(){
		//Language Switcher
		$arrLanguages = $this->user->getAvailableLanguages(false, true);
		$url = (preg_replace('#\&lang\=([a-zA-Z]*)#', "", $this->env->request));
		foreach($arrLanguages as $strKey => $strLangname){
			$this->tpl->assign_block_vars('languageswitcher_row2', array(
					'LANGNAME'	=> $strLangname,
					'LINK'		=> sanitize($url).((strpos($url, "?") === false) ? '?' : '&').'lang='.$strKey,
			));
		}

		return 'Error: Template file is empty.';
	}
}
?>