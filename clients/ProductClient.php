<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\product\clients;

use matacms\product\models\Product;

class ProductClient extends \matacms\clients\SimpleClient {

	public function findByURI($uri) {
		$model = $this->getModel();
		return $model::find()->where(['and', "PublicationDate <= NOW()", "URI = '$uri'"])->one();
	}

	public function findAll() {
		$model = $this->getModel();
		$this->closureParams = [$model];

		$model = $model::getDb()->cache(function ($db) {
			$closureParams = $this->getClosureParams();
			return $closureParams[0]->find()->where([
				'and', "PublicationDate <= NOW()"
				])->all();
		}, null, new \matacms\cache\caching\MataLastUpdatedTimestampDependency());

		return $model;
	}

	/**
	 * Get the query to find all products with PublicationDate > NOW(). 
	 * Useful for passing to ActiveDataProvider
	 */
	public function getFindAllQuery() {
		return $this->getModel()->find()->where([
			'and', "PublicationDate <= NOW()"
			]);
	}

	public function getModel() {
		return new Product();
	}

}
