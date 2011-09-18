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
	 * Pagination view helper
	 *
	 * Usage:
	 *   {namespace p=Tx_Paginate_ViewHelpers}
	 *
	 *   <p:widget.paginate objects="{myObjects}" as="paginatedObjects" configuration="{margin:2, itemsPerPage: 5, insertAbove: 1, insertBelow: 0}">
	 *     <f:for each="{paginatedObjects}" as="object">
	 *       ...
	 *     </f:for>
	 *   </spb:widget.paginate>
	 *
	 */
	class Tx_Paginate_ViewHelpers_Widget_PaginateViewHelper extends Tx_Fluid_ViewHelpers_Widget_PaginateViewHelper {

		/**
		 * Inject controller
		 *
		 * @param Tx_Paginate_ViewHelpers_Widget_Controller_PaginateController $controller
		 * @return void
		 */
		public function injectController(Tx_Paginate_ViewHelpers_Widget_Controller_PaginateController $controller) {
			$this->controller = $controller;
		}

	}
?>
