<div id="sidebar">
    
    <div>    
        <ul class="nav nav-pills nav-stacked">
            <?php 
            if(!empty($categories)){

                foreach($categories as $category)
                {
                   //print_r($category);
    //                if(!empty($category["Category"]["name"])){
                        $cat = $category["Category"]["name"];
                        print '<li role="presentation" '. (empty($category["Subcategory"])?'>':'class="dropdown">') . $this->Html->link($cat, array(
                                                                    'controller' => 'categories',
                                                                     'action' => 'view',
                                                                     $cat
                                                                ), ['class' => 'dropdown-toggle',
                                                                    'data-toggle'=>"dropdown", 
                                                                    "role"=>"button", "aria-haspopup"=>"true", 
                                                                    "aria-expanded"=>"false"]);
                        
                        if(!(empty($category["Subcategory"]))){
                                ?><ul  class="dropdown-menu">
                                    <?php
                                       foreach($category["Subcategory"] as $subcategory)
                                        {
                                           $sub = $subcategory["name"];
                                           print '<li> '.$this->Html->link($sub, array(
                                                                    'controller' => 'categories',
                                                                     'action' => 'view',
                                                                     $sub
                                                                )).' </li> ';
                                        } ?>

                                </ul>
                        <?php
                            }
                                        
                                print '</li>';
    //               }
                }
            }
            ?>
        </ul>
    </div>
</div>