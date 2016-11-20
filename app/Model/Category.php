<?php

require('../Lib/MediaManager/Category/MediaCategory.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author Franklyn
 */
class Category extends MediaCategory{
    //put your code here
    public $hasMany = array("Video",
            'Subcategory' => array(
            'className' => 'Category',
            'foreignKey' => 'parent_id'
        ));
    
public function countVideos($categories)
{
    $count = 0;
    if(count($categories['Category']['Subcategory']) > 0)
    {
        foreach($categories['Category']['Subcategory'] as $subcategory)
        {
            $count += count($subcategory['Video']);
        }
    }else
    {
        foreach($categories['Category'] as $category)
        {
            $count += count($category['Video']);
        }
    }
    
    return count;
}

}
