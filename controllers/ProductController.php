<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\product\controllers;

use matacms\product\models\Product;
use matacms\product\models\ProductSearch;
use matacms\controllers\module\Controller;

class ProductController extends Controller {

	public function getModel() {
		return new Product();
	}

	public function getSearchModel() {
		return new ProductSearch();
	}
	
}
