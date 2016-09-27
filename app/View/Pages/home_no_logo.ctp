

    <?php
    $this->layout = 'home';
    //MediaManager::create_thumbnail();
    if(isset($user))
    {
        //print_r($user);
        //print 'subscription ends '. strtotime($user['Subscription']['end_date']). ' now' .(new DateTime())->getTimestamp();
//        if($issubscribed)
//        {
//            echo '<p> you are subscribed </p>';
//        }  else {
//            echo '<p> you are NOT subscribed </p>';
//        }
        //$user['Subscription']['stripe_cust_id'] = 1;
        //print($user['Subscription']['stripe_cust_id']);
        
    }
    
    ?>
    

    <div class="clear-fix"></div>
    <div class="intro-container container section-container">
        <div class="intro-section row section">
            <div class="col-lg-6 intro-right-paragraph">
                
                <h3 class="section-title"> Welcome to The Seon Batson Tutoring! </h3>
                    <div>
                        <p class="description">The Seon Batson Tutoring is a Private Institution that 
                           offers Tutoring Services to individuals who wish to hone 
                           their Mathematics and English Language Arts skills.</p><p> We believe that every student has the ability to learn and 
                            succeed in the classroom. So if you are just starting or continuing 
                            your education, let us help you unleash your potential!</p>

                    </div>
            </div>
        </div>
    </div>
    
    <div>
        <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
      
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="/img/photo-1429216967620-ece20ff3a5f9.jpg" alt="First slide">
          
        </div>
        <div class="item">
          <img class="first-slide" src="/img/photo-1434626881859-194d67b2b86f.jpg" alt="Second slide">
          
        </div>
        <div class="item">
          <img class="second-slide" src="/img/photo-1434030216411-0b793f4b4173.jpg" alt="Third slide">
          
        </div>
        <div class="item">
          <img class="third-slide" src="/img/photo-1454165804606-c3d57bc86b40.jpg" alt="Fouth slide">
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
    </div>
    
    
    
    <div class="about-us-container container section-container">
            <div class="row about-us-section section">
                <div class="col-lg-6">
                    <div class="col-lg-8 col-md-12">
                        <h3 class="section-title">Challenge Your Mind!</h3>
                        <div>
                            <p class="description">At The Seon Batson Academy, you will be taught 
                                by extremely qualified teachers all of whom possess years of experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="courses" class="col-lg-8 col-md-12">
                        <h3  class="section-title">Courses</h3>
                        <div>
                            <div>
                                <div>
                                    <p class="description">Our broad spectrum of courses and workshops are designed 
                                        specifically to foster the growth, development, and success of every student.</p>
                                    <p class="description"><a href="#">Learn More...</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
    <div class="meet-our-team-container container section-container">
        <div class="row meet-our-team-section section">
            <div class="col-lg-12">
                <h1 class="section-title"> Meet Our Team </h1>
            </div>
            <div class="col-lg-12">
                <div class="team-member col-lg-2">
                    <div>
                        <img class="team-member-image" src="/img/2931182104.jpg" alt="Seon Batson"/>
                    </div>
                    <div class="team-member-name"><h3>Seon Batson</h3></div>
                    
                    <div class="team-member-name">
                        <p class="description">Director</p></div>
                        <div class="row-space-1"></div>
                        <p class="description">Areas of Emphasis</p>
                        <p class="description">Mathematics and English</p>

                        <div class="row-space-1"></div>
                        <p class="description">Professional Development</p>
                        <p class="description">2010-Present</p>
                        <p class="description">Math Teacher, Columbia University</p>
                        
                        <div class="row-space-1"></div>
                        <p class="description">2009, Economics, M.S.</p>
                        <p class="description">2006, Economics, B.S.</p>
                </div>
                
                <div class="team-member col-lg-2">
                    <div>
                        <img class="team-member-image" src="/img/3394743804.jpg" alt="Kayana Batson"/>
                    </div>
                    <div class="team-member-name"><h3>Kayana Batson</h3></div>
                    
                    <div class="team-member-name"> <p class="description">&NegativeMediumSpace;</p></div>
                        <div class="row-space-1"></div>
                        <p class="description">Areas of Emphasis</p>
                        <p class="description">English and Penmanship</p>

                        <div class="row-space-1"></div>
                        <p class="description">Professional Development</p>
                        
                        <div class="row-space-1"></div>
                        <p class="description">2011, Psychology, B.S.</p>
                        <p class="description">2007, Occupational Therapy, A.S.</p>
                        
                        <p class="description">&NegativeMediumSpace;</p>
                        <p class="description">&NegativeMediumSpace;</p>
                        <p class="description"> </p>
                </div>
                
                <div class="team-member col-lg-2">
                    <div>
                        <img class="team-member-image" style="width: 150px; height: 160px;" src="/img/3735195404.jpg" alt="Dawn Amsterdam"/>
                    </div>
                    <div class="team-member-name"><h3>Dawn Amsterdam</h3></div>
                    
                    <div class="team-member-name"> <p class="description">&NegativeMediumSpace;</p></div>
                        <div class="row-space-1"></div>
                        <p class="description">Areas of Emphasis</p>
                        <p class="description">Mathematics and English</p>

                        <div class="row-space-1"></div>
                        <p class="description">Professional Development</p>
                        
                        <div class="row-space-1"></div>
                        <p class="description">2012, Childhood Education, B.A.</p>
                        <p class="description">2012, Children and Youth Studies, B.A.</p>
                        <p class="description">1996, Teacher Education, A.A.</p> 
                        <p class="description">&NegativeMediumSpace;</p>
                       
                </div>
                
                <div class="team-member col-lg-2">
                    <div>
                        <img class="team-member-image" src="/img/3735283204.jpg" alt="Alastair J. Waithe"/>
                    </div>
                    <div class="team-member-name"><h3>Alastair J. Waithe</h3></div>
                    
                    <div class="team-member-name"> <p class="description">&NegativeMediumSpace;</p></div>
                        <div class="row-space-1"></div>
                        <p class="description">Areas of Emphasis</p>
                        <p class="description">English, U.S. History, & Global History</p>

                        <div class="row-space-1"></div>
                        <p class="description">Professional Development</p>
                        
                        <div class="row-space-1"></div>
                        <p class="description">2010, Economics, B.A.</p>
                        
                        <p class="description">&NegativeMediumSpace;</p>
                        <p class="description">&NegativeMediumSpace;</p>
                        <p class="description">&NegativeMediumSpace;</p>
                </div>
                
                <div class="team-member col-lg-2">
                    <div>
                        <img class="team-member-image"  style="width: 150px; height: 160px;" src="/img/3735204804.jpg" alt="Donya Locke"/>
                    </div>
                    <div class="team-member-name"><h3>Donya Locke</h3></div>
                    
                    <div class="team-member-name">
                    <div class="team-member-name"> <p class="description">&NegativeMediumSpace;</p></div>
                        <div class="row-space-1"></div>
                        <p class="description">Areas of Emphasis</p>
                        <p class="description">Mathematics and English</p>

                        <div class="row-space-1"></div>
                        <p class="description">Professional Development</p>
                        
                        <div class="row-space-1"></div>
                        <p class="description">2013, Social Work, M.</p>
                        <p class="description">2012, Social Work, B.S.</p>
                        <p class="description">2007-2008, High School Counsellor
                        CORO, New York</p>
                        <p class="description">&NegativeMediumSpace;</p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="right-for-u-container section-container">
        <div class="right-for-u-section section">
            <div>
                <h3 class="section-title"> Is The Seon Batson Academy right for you? </h3>
            </div>
            <div>
                <p class="description">We are proud of our work at The Seon Batson Academy. To find out why, 
                    visit us, or sit in on a class or workshop with no obligation to you.</p>
            </div>
            </div>
    </div>
    
    
    <div class="testimonials-container contaienr section-container">
        
        <div class="testimonials-section section row">
            <div class="col-lg-12 section-title">
                    <h3 id="testimonials">Catch the Buzz</h3>
            </div>
             <div class="col-lg-3 testimonial">
                <div class="testimonial-text-container">
                <div class="testimonial-text">
                    <p> As an educator, it was difficult to find a tutor that incorporated quality, 
                        patience, professionalism, and dedication...all while producing outstanding 
                        results. Mr. Seon has exceeded my expectations. My daughter, who is an A student, 
                        began struggling with math during her freshman year... </p>
                    <p><a href="#">read more...</a></p>
                   
                </div>
                <div class="testimonial-image">
                    
                </div>
                <div>
                    <p> Jillian Garcia (Parent)</p>
                    <p>Brooklyn, New York</p></div>
                </div>
            </div>
            <div class="col-lg-3 testimonial">
                <div class="testimonial-text-container">
                <div class="testimonial-text">
                    <p> My family is so grateful to have found Seon Batson to help my 10 year old daughter with her Math. 
                        She had struggled for years with basic concepts because the way they are taught in NYC Pulblic schools 
                        is non-traditional and confusing to both kids (and the parents trying to assist with homework)....</p>
                    <p><a href="#">read more...</a></p>
                </div>
                <div class="testimonial-image">
                    
                </div>
                <div><p> Leila Benn, (Parent)</p>
                    <p>New York, New York</p></div>
                </div>
            </div>
             <div class="col-lg-3 testimonial">
                <div class="testimonial-text-container">
                <div class="testimonial-text">
                    <p> Seon is the best Math Teacher I've ever had. I always thought Math was the most difficult subject in the world but 
                        then I realized Math is the easiest subject. If everyone gets a teacher like Seon! He is so polite when he teaches me. 
                        Thank you so much Seon for helping me with Math with lots...</p>
                    <p><a href="#">read more...</a></p>
                </div>
                <div class="testimonial-image">
                    
                </div>
                <div><p> Fathima (GED student)</p>
                    <p>Bronx, New York.</p></div>
                </div>
            </div>
            </div>
    </div>
    <div id="footer" class="page-footer-container">
        <div class="container section-container">
            <div class="section">
                
            </div>
        </div>
    </div>