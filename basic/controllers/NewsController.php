<?php 
	namespace app\controllers;
	use Yii;
	use yii\web\Controller;

	class NewsController extends Controller{
		public function data(){
			return [
				[ "id" => 1, "date" => "2015-04-19", "category" => "business",
					"title" => "Test news of 2015-04-19" ],
			    [ "id" => 2, "date" => "2015-05-20", "category" => "shopping",  
			    	"title" => "Test news of 2015-05-20" ],
			    [ "id" => 3, "date" => "2015-06-21", "category" => "business",  
			    	"title" => "Test news of 2015-06-21" ],
			    [ "id" => 4, "date" => "2016-04-19", "category" => "shopping",  
			    	"title" => "Test news of 2016-04-19" ],
			    [ "id" => 5, "date" => "2017-05-19", "category" => "business",  
			    	"title" => "Test news of 2017-05-19" ],
			    [ "id" => 6, "date" => "2018-06-19", "category" => "shopping",  
			    	"title" => "Test news of 2018-06-19" ]
			];
		}

		public function actionNewItemsList(){
			// if missing, value will be null
			$year = Yii::$app->request->get('year');
			// if missing, value will be null
			$category = Yii::$app->request->get('category');

			$data = $this->data();
			$filteredData = [];

			foreach ($data as $el){
				if (($year != null)&&(date('Y', strtotime($el['date'])) == 
					$year)) $filteredData[] = $el;
				if (($category != null)&&($el['category'] == $category))
					$filteredData[] = $el;
			}

			return $this->render('newItemsList', ['year' => $year, 'category' => $category, 'filteredData' => $filteredData]);
		}

		public function actionIndex(){
			return $this->render('index');
		}

		public function actionInternationalIndex(){
			// if missing, value will be 'en'
			$lang = Yii::$app->request->get('lang', 'en');

			Yii::$app->language = $lang;

			return $this->render('internationalIndex');
		}

		public function actionNewItemDetail(){
			$title = Yii::$app->request->get('title');

			$data = $this->data();

			$itemFound = null;

			foreach($data as $d){
				if ($d['title'] == $title){
					$itemFound = $d;
					break;
				}
			}

			return $this->render('newItemDetail', ['title' => $title,
				'itemFound' => $itemFound]);
		}

		public function dataItems(){
			$newsList = [
				['id' => 1, 'title' => 'First World War', 'date' => '1914-07-28'],
				['id' => 2, 'title' => 'Second World War', 'date' => '1939-09-01'],
				['id' => 3, 'title' => 'Fist man on the moon', 'date' => '1969-07-20']
			];

			return $newsList;			
		}

		public function actionItemsList(){
			$newsList = $this->dataItems();

			return $this->render('itemsList', ['newsList' => $newsList]);
		}

		public function actionItemDetail($id){
			$newsList = $this->dataItems();

			$item = null;
			foreach($newsList as $new){
				if ($id == $new['id']){
					$item = $new;
					break;
				}
			}

			return $this->render('itemDetail', ['item' => $item]);
		}

	    /**
	     * Displays my static Info page
	     */
	    public function actionInfo(){
	        return $this->render('info');
	    }

	    /**
	     * Displays ads block
	     */
	    public function actionAdvTest(){
	    	return $this->render('advTest');
	    }

	    /**
	     * Displays a page using a different layout (from main.php)
	     */
	    public function actionResponsiveContentTest(){
	    	$responsive = Yii::$app->request->get('responsive', 0);

	    	if ($responsive){
	    		$this->layout = 'responsive';
	    	}
	    	else {
	    		$this->layout = 'main';
	    	}

	    	return $this->render('responsiveContentTest', 
	    							['responsive' => $responsive]);
	    }

	    public function actions(){
	    	return [
	    		'pages' => [
	    			'class' => 'yii\web\ViewAction',
	    		],
	    	];
	    }
	}
 ?>