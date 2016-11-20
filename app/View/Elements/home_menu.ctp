    <div class="navbar-header"> 
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#mm-navbar" aria-controls="mm-navbar" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
        </button> 
          <div class="logo-container">
              <div class="logo-inner-container"> 
                  <a href="/" alt="Seon Batson Tutoring"/>
                    <img src="/img/logo.png" alt="logo"/>
                </a>
            </div>
        </div>  
    </div>
    <nav class="navbar-collapse  collapse" id="mm-navbar">
         <div class="container">
            <ul  class="nav navbar-nav">
                <li><a href="/">Home</a> </li>
                <li><a href="#testimonials">Testimonials</a> </li>
                <li><a href="#courses">Courses</a> </li>
                <li><a href="/courses">Tutorials</a> </li>
            <li><a href="/FAQs">FAQs</a> </li>
                <?php    
                    if(isset($user))
                    {
                        print  (isset($is_admin) && $is_admin? $this->element('admin_menu_option'):'').
                                  '<li><a href="/users/logout">Logout</a></li>';
                    }else{
                        print   '<li><a href="/login">Login</a></li>';
                    }
                    ?>
            </ul>
             <div class="navbar-right">
                <?php
                if(isset($user))
                { 
                    echo '<p class="navbar-text navbar-username">Signed in as <a href="/account" class="navbar-link">'.$user['User']['firstname'].'</a></p>';
                    //echo '<div>'.$user['firstname'].'</div>';
                }  else {
                    echo '<div class="sign-up-btn btn"><p class="navbar-text"><a href="/signup" class="navbar-link">Sign up</a></p></div>';
                }?>
                <div class="search-box">
                    <form method='post' action="/search">
                        <div class="search-input-container">
                            <input id="search-input" class="form-control"  type="text" name="q" placeholder="Search">
                        </div>
                        <div id="search-button-container" class="search-button-container">
                            <button id="search-button" class="btn">
                                <span class="glyphicon glyphicon-search"></span> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
             
            </div>
    </nav>

<?php

//if(isset($is_admin) && $is_admin)
//           echo $this->element('admin_sub-menu');