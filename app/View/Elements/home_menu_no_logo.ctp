    <div class="navbar-header"> 
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#menu-bottom-nav" aria-controls="menu-bottom-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
        </button> <a href="#" class="navbar-brand">Seon Batson Academy</a> 
    </div>
         <nav class="navbar collapse navbar-collapse" id="menu-bottom-nav">
            
             <ul  class="nav navbar-nav">
            <li><a href="/">Home</a> </li>
            <li><a href="#testimonials">Testimonials</a> </li>
            <li><a href="#courses">Courses</a> </li>
           <?php 
            if(isset($user))
            {

                print   '<li><a href="/courses">Tutorials</a> </li>'.
                        '<li><a href="/users/logout">Logout</a></li>';

            }else{

                print '<li><a href="/login">Login</a></li>';
            }
          ?>
          

 
             </ul>    <?php
        if(isset($user))
        { 
            echo '<div  class="navbar-right"><p class="navbar-text">Signed in as <a href="#" class="navbar-link">'.$user['firstname'].'</a></p><div>';

//            echo '<div>'.$user['firstname'].'</div>';
        }  else {
            echo '<div  class="navbar-right"><p class="navbar-text"><a href="/users/add" class="navbar-link">Sign up</a></p></div>';
        }?>
            
           </nav>   

