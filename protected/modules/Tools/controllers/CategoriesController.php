<?php

class CategoriesController extends Controller
{
	public function actionIndex()
	{
                $this->setPageTitle("Categories");
		$this->render('index');
	}
}