<?php 
	namespace app\components;

	use yii\web\UrlRuleInterface;
	use yii\base\Object;

	class NewsUrlRule extends Object implements UrlRuleInterface{

		public function createUrl($manager, $route, $params){
			if ($route === 'news/new-item-detail'){
				if (isset($params['title'])){
					return 'news/'.$params['title'];
				}
			}
			return false; // this rule doesn't apply
		}

		public function parseRequest($manager, $request){
			$pathInfo = $request->getPathInfo();

			if (preg_match('%^([^\/]*)\/([^\/]*)$%', $pathInfo, $matches)){
				if ($matches[1] == 'news'){
					$params = ['title' => $matches[2]];
					return ['news/new-item-detail', $params];
				}
				else{
					return false;
				}
			}
			return false; // this rule doesn't apply
		}
	}
 ?>