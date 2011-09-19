<?php
	/*******************************************************************
	 *  Copyright notice
	 *
	 *  (c) 2011 Rüdiger Marwein <ruediger.marwein@googlemail.com>
	 *
	 *  All rights reserved
	 *
	 *  This script is part of the TYPO3 project. The TYPO3 project is
	 *  free software; you can redistribute it and/or modify
	 *  it under the terms of the GNU General Public License as
	 *  published by the Free Software Foundation; either version 2 of
	 *  the License, or (at your option) any later version.
	 *
	 *  The GNU General Public License can be found at
	 *  http://www.gnu.org/copyleft/gpl.html.
	 *
	 *  This script is distributed in the hope that it will be useful,
	 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
	 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 *  GNU General Public License for more details.
	 *
	 *  This copyright notice MUST APPEAR in all copies of the script!
	 ******************************************************************/

	/**
	 * Controller for Paginate View Helper
	 */
	class Tx_Paginate_ViewHelpers_Widget_Controller_PaginateController extends Tx_Fluid_ViewHelpers_Widget_Controller_PaginateController {

		/**
		 * Returns an array with the keys:
		 * - pages
		 * - current
		 * - numberOfPages
		 * - itemsPerPage
		 * - paginationStart
		 * - paginationEnd
		 * - thresholdStart
		 * - thresholdEnd
		 * - first
		 * - last
		 * - count
		 *
		 * @return array
		 */
		protected function buildPagination() {
			$pagination = parent::buildPagination();

			$this->configuration['margin']      = 2;
			if( empty($this->widgetConfiguration['configuration']['margin']) ) {
				$this->configuration['margin']  = $this->widgetConfiguration['configuration']['margin'];
			}
			$pagination['count']                = $this->numberOfPages;
			$pagination['paginationStart']      = max(2, $this->currentPage - $this->configuration['margin']);
			$pagination['paginationEnd']        = min($this->currentPage + $this->configuration['margin'], max(0, $this->numberOfPages-1));
			$pagination['thresholdStart']       = $this->configuration['margin'] + 2;
			$pagination['thresholdEnd']         = count($pagination['pages']) - $this->configuration['margin'] - 1;
			$pagination['first']                = $pagination['pages'][0];
			$pagination['last']                 = $pagination['pages'][max(0,$this->numberOfPages - 1)];

			return $pagination;
		}

		/**
		 * Allows the widget template root path to be overriden via the framework configuration,
		 * e.g. plugin.tx_extension.view.widget.<WidgetViewHelperClassName>.templateRootPath
		 *
		 * This implementation was suggested in the ticket below, but was not yet
		 * integrated in the Extbase core.
		 *
		 * @todo remove, override or modify this method as soon as this feature is in extbase
		 * @param Tx_Extbase_MVC_View_ViewInterface $view
		 * @see Classes/Core/Widget/Tx_Fluid_Core_Widget_AbstractWidgetController::setViewConfiguration()
		 * @see http://forge.typo3.org/issues/10823
		 */
		protected function setViewConfiguration(Tx_Extbase_MVC_View_ViewInterface $view) {
			$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
			$widgetViewHelperClassName = $this->request->getWidgetContext()->getWidgetViewHelperClassName();

			if (isset($extbaseFrameworkConfiguration['view']['widget'][$widgetViewHelperClassName]['templateRootPath'])
					&& strlen($extbaseFrameworkConfiguration['view']['widget'][$widgetViewHelperClassName]['templateRootPath']) > 0
					&& method_exists($view, 'setTemplateRootPath')) {

				if($this->widgetConfiguration->hasArgument('templateFilePath')) {
					$view->setTemplatePathAndFilename(t3lib_div::getFileAbsFileName($extbaseFrameworkConfiguration['view']['widget'][$widgetViewHelperClassName]['templateRootPath']).$this->widgetConfiguration['templateFilePath']);
				} else {
					$view->setTemplateRootPath(t3lib_div::getFileAbsFileName($extbaseFrameworkConfiguration['view']['widget'][$widgetViewHelperClassName]['templateRootPath']));
				}

			} elseif($this->widgetConfiguration->hasArgument('templateFilePath')) {
				$view->setTemplatePathAndFilename(t3lib_div::getFileAbsFileName($this->widgetConfiguration['templateFilePath']));
			}
		}
	}
?>