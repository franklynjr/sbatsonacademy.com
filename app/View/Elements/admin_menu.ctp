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
<div class="collapse navbar-collapse" id="mm-navbar-container">
    <nav  id="mm-navbar">
             <div class="container">
             <ul  class="nav navbar-nav">
            <li><a href="/">Home</a> </li>
            <li><a href="/courses">Tutorials</a> </li>
           <?php 
            if(isset($user))
            {

               print '<li><a href="/users/logout">Logout</a></li>';

            }else{
                print   '<li><a href="/login">Login</a></li>';
            }
          ?>
            </ul>
             <div class="navbar-right">
                <?php
                if(isset($user))
                { 
                    echo '<p class="navbar-text navbar-username">Signed in as <a href="#" class="navbar-link">'.$user['User']['firstname'].'</a></p>';
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
    <div id="mm-admin-nav">
        <ul class="nav navbar-nav">
           <li>
               <a href="/admin/courses/view">Courses</a>
           </li>
           <li>
               <a href="/admin/topics/view">Topics</a>
           </li>
           <li>
               <a href="/admin/videos">Videos</a>
           </li>
           <li>
               <a href="/admin/users">Users</a>
           </li>
           <li>
               <a href="/admin/pages/view">Pages</a>
           </li>
           <li>
               <a href="/admin/subscriptionPlans/view">Subscription Plans</a>
           </li>
           <li>
               <a href="/admin/testimonials/view">Testimonials</a>
           </li>
           <li>
               <a href="/admin/settings/payments">Payment API Settings</a>
           </li>
        </ul>
        <div style="clear:both"></div>
    </div>
</div>
         