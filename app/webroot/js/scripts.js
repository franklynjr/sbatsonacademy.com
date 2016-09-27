/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//
//$(function(){
//        // Check the initial Poistion of the Sticky Header
//        var stickyHeaderTop = $('#menu').offset().top;
//
//        $(window).scroll(function(){
//                if( $(window).scrollTop() > stickyHeaderTop ) {
//                        $('#menu').css({position: 'fixed', top: '0px'});
//                        $('#menu-alias').css('display', 'block');
//                } else {
//                        $('#menu').css({position: 'absolute', bottom: '0'});
//                        $('#menu-alias').css('display', 'none');
//                }
//        });
//  });

function getVideoLength()
{

        var video = document.getElementById("video");
        
        //alert(video.duration);
        
        //alert(video.currentTime);
        
        document.getElementById("video-length").value = Math.floor(video.duration / 60) + 'm ' +  Math.floor((((video.duration / 60) - Math.floor(video.duration / 60)) * 60)) + 's' ;
        
}
    
function getVideoPosition()
    {
        var video = document.getElementById("video");
        var canvas =  document.getElementById("canvas");
        var image =  document.getElementById("image");
        
        var time = video.currentTime;
        document.getElementById("position").innerHTML = time;
        //document.getElementById("video-length").value = video.duration;
        
        var context = canvas.getContext("2d");
        
        draw(video,context,canvas.width,canvas.height);
        image.value = canvas.toDataURL();
    }
    
    function draw(v,c,w,h) {
    //if(v.ended) return false;
    c.drawImage(v,0,0,w,h);
    setTimeout(draw,20,v,c,w,h);
}
    
 $(function(){
     
     $('#search-input').on('focusin', function(e)
     {
        e.preventDefault();
         setTimeout(function(){
            $('#search-button-container').toggle({display:false, duration: 400, complete: function()
            {
                console.log('showing');
            }});
        },1000);
     });
     
     $('#search-input').on('focusout', function(e)
     {
         
        e.preventDefault();
        setTimeout(function(){
            $('#search-button-container').toggle({display:false, duration: 400, complete: function()
            {
                console.log('hiding');
            }});
        
        }, 1000);
    });
    
 
 });