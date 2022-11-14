<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostController
 *
 * @author MSI RED
 */
class PostController extends Controller
{
	public function actionIndex()
	{
            $criteria = new CDbCriteria;
            $total = News::model()->count();

            $pages = new CPagination($total);
            $pages->pageSize = 2;
            $pages->applyLimit($criteria);

            $posts = News::model()->findAll($criteria);

	    $this->render('index', array(
                'posts' => $posts,
                'pages' => $pages,
            ));
	}
}