<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/MyDiet.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <header>
 <div class="header-top-div">

    <div class="logo-div">

        <img class="logo"src="../img/Healthify_LOGO.png" alt="">
        <div class="logo-text"><span class="h" style="color:#379237">H</span>ealthify</div>
        
        
    </div>

 
    <div class="nav-div">
    @if(Auth::user()&&Auth::user()->is_admin || Auth::user()&&Auth::user()->is_superadmin) 
    <button class="nav-btn"><a href="{{route('userinfoshow')}}">Dashboard</a></button>
    @endif
    <button class="nav-btn"> <a href="{{route('index')}}" >Home</a></button>
    <button class="nav-btn"> <a href="{{route('userprofileshow')}}" >My Profile</a></button>
    <button class="nav-btn"> <a href="{{route('index')}}" >Blog</a></button>
    <button class="nav-btn"> <a href="{{route('index')}}" >FAQ</a></button>

    </div>
    


 </div>

</header>

<main>



<section class="section-1">

<div class="section-1-text">



<h2>Healthy Food & Nutrition <br> Gives You Good Life</h2><br>
<p class="section-1-p">
    Healthy food, healthy you. Learn how proper nutrition can improve your life.
</p>

<button class="create-diet-btn"><a href="#">Create Your Diet</a></button>
</div>


<div class="div-1">
    <img  class="four-divs-img"src="../img/icon-1.png" alt="info-img">  
  <h3>Health Strategy</h3>
  <p class="divs-p">Everything you need to know</p>

  </div>
  
  
  <div class="div-2">
     <img   class="four-divs-img" class="four-divs"src="../img/icon-2.png">
  <h3>Nutritional Levels</h3>
  <p class="divs-p">Made just for you</p>
  
  
  
  </div>
  
  <div class="div-3">
      <img  class="four-divs-img" class="four-divs" src="../img/icon-3.png">
  <h3>Healthy Diet</h3>
  <p class="divs-p">Fuel your body right</p> 
  
  
  </div>
  
  <div class="div-4">
      <img   class="four-divs-img" class="four-divs" src="../img/icon-4.png">
      <h3>Exercise Planning</h3>
      <p class="divs-p">Achive your desired goal</p>
      
  </div>



  </section>






  <section class="section-2">

    <div class="section-2-img-div">
        <div class="experience-div">
            <p class="number">15+</p>
            <p> Years Of <br>Experience</p>
        </div>
    </div>

    <div class="about-us-div">
     
          <h5>ABOUT US</h5>

          <h1>We Provide Best Weight Loss <br>Support In Town</h1>
          <p>Teritatis et quasi architecto. Sed ut perspiciatis unde omnis iste natus error sit
            <br> voluptatem accusantium dolore mque 
            laudantium, totam rem aperiam eaque<br>
             ipsa quae ab illo invent. Sed ut perspiciatis unde omnis.</p>


            <div class="check-box-p-1">

                 <div class="checkbox-h4">
                    <img class="check-img" src="../img/yellow-check.png">
                <h4>Weight Loss Daily Service</h4>

                 </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Proin aliquam<br> lobortis rutrum. Maecenas laoreet tristique auctor.</p>

            </div>

            <div class="check-box-p-2">
                <div class="checkbox-h4">
                <img class="check-img"src="../img/green-check.png">
                <h4>Every Week Schedule Programme</h4>
                </div>
                <p>Curabitur vitae metus luctus, mollis magna eu, accumsan tortor. 
                Donec<br> faucibus dolor vel blandit egestas. Etiam at ex nibh.</p>
            </div>

            <div class="about-btn-div">
                <button class="about-btn">Learn More</button>
            </div>

    </div>







    
  </section>


  <section class="section-3">


<div class="section-3-div-1">

    <div class="text-div">
    <h4>Our Services</h4>
    <h2>We Create Best <br>Programs For You</h2>

    </div>

    <div class="call-now-div">
        <div class="phone-pic-div">
            <img src="../img/green-phone.png" alt="phone">
        </div>
        <div class="number-div">Call Now: +1(888)1234-5678</div>

    </div>
</div>




<div class="section-3-div-2">
   
    <div class="program-1" class="pr">
        <div class="program-img">
            <img class="section-3-img"src="https://nutrio.radiantthemes.com/wp-content/uploads/elementor/thumbs/service-4-pvbamy3jjv9lk6ynwlxjjfuo1r3dudntjsuy6scffs.jpg" alt="">
        </div>
        <div class="program-text">
            <h3>Expert Nutrition Guidance</h3>
            <img src="../img/arrow.png" alt="">
        </div>

    </div>


       
    <div class="program-2" class="pr">
        <div class="program-img">
            <img class="section-3-img"src="https://images.pexels.com/photos/4474052/pexels-photo-4474052.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
        </div>
        <div class="program-text">
            <h3>Weight Loss Program</h3>
            <img src="../img/arrow.png" alt="">
        </div>

    </div>


       
    <div class="program-3" class="pr">
        <div class="program-img">
            <img class="section-3-img"src="https://media.istockphoto.com/id/1201640434/photo/this-app-is-like-my-own-personal-trainer.jpg?b=1&s=170667a&w=0&k=20&c=bDTEgD07jtf9w8aY9L5xG0t8clwPWzt5HJ4DbXM8zz0=" alt="">
        </div>
        <div class="program-text">
            <h3>Exercise Program</h3>
            <img src="../img/arrow.png" alt="">
        </div>

    </div>




       
    <div class="program-4" class="pr">
        <div class="program-img">
            <img class="section-3-img" src="https://media.istockphoto.com/id/1473459040/photo/fitness-relax-or-black-man-drinking-water-in-training-or-exercise-for-body-recovery-or.jpg?s=612x612&w=0&k=20&c=uO_oPL11uoBJ7cODrJFKmGc8gLRIbEP7Icj7QWZg7dw=" alt="">
        </div>
        <div class="program-text">
            <h3>Healthy Diet</h3>
            <img src="../img/arrow.png" alt="arrow">
        </div>

    </div>


</div>

  </section>


 
</main>

</body>
</html>