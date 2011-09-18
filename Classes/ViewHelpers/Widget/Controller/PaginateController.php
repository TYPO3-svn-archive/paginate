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

	}
?>
