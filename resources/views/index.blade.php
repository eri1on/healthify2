
@extends('layouts.app')
@section('content')
<!Doctype html>
<html>     
   <head>
      <title>Halthify</title>

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
      <link rel="icon" href="../img/healthifyFavicon.png" type="image/x-icon">

      <link rel="stylesheet" href="/css/index.css">

   </head>

   <body>

   

      <div class="text-background">

         <div class="text-container"><b>A year from now, you will wish you started today</b><br><br>
            An active mind cannot exist in an inactive body,<br>
           so don't dig your grave with your own knife and fork   
           <br>
           <br>
           <br>
           <button class="diet-button"><a href="{{route('myDiet')}}">Start your diet now</a></button>
         </div>   

      </div>


      
      <div class="detail-container">

         <div class="what-container">
            <img class="img-det1" src="../img/Healthify_LOGO.png">

            <div class="heading-con">What is <span style="color: rgb(42, 230, 42);">H</span>ealthify<br><br>   </div> 
            Healthify is the future of self-wellbeing. We exist to educate, empower and energize consumers to make informed decisions about their health with world class knowledge of nutrition field
            
   
         </div>
 
         <div class="what-container">
            <img class="img-det2" src="../img/how-logo.png">

            <div class="heading-con" ><br><br><br>How we do it<br><br></div>

            Well, we are going to need your help. We first gather some information to analyze and conclude a daily diet. We gather personal informations about you such, weight, height, age, etc... We know that is not proper way to ask this thing, but after that you will thank us

         </div>

         <div class="what-container">
            <img class="img-det3" src="../img/benefits-logo.png">

            <div class="heading-con"><br><br><br>Benefits from us<br><br> </div> 

            We understand that every customer has unique requirements, which is why we offer customizable solutions to meet your specific needs and preferences. That's why after this journey we believed that you will be statisfied with your body

         </div>

      </div>

      <div class="thirdPage-container">

         <div class="thirdPage-text">
            <div class="headTxt-cont">Struggling to find Balance?<br><br><br></div>

            We know your life is stressful enough without having to worry about what to eat every day to see progress. We are experts in health and nutrition so you don’t have to be. Our mission is to pave the most efficient way for you to achieve the results you desire

         </div>

            <button class="thirdPage-button"><a href="{{route('myDiet')}}">Start eating healthy</a></button>
      
      </div>

      <div class="fourPage-container">

         <div class="four-img-container">
            <img class="four-img" src="../img/food-1.png" alt="First Meal">
         </div>

         <div class="four-text">
            
            <div class="fourHeader">Healthify Help</div>

            We can help you sort through the loads of information out there by creating a clear and tailored plan to get you where you want to go. We believe that eating real and nourishing food is not only delicious and enjoyable; it is essential for day-to-day performance and a healthy life.

            <div class="four-button">
               <button class="four-button-cl"><a href="{{route('recipes')}}">Check out our Recipes</a></button>

            </div>

         </div>

      </div>

      <div class="fivePage-container">

         <div class="topFive-container">
            <div class="topHeader">Our Clients</div>

            We work with people who are frustrated with their current health, body and/or performance. Our clients understand the basics of healthy eating and are exercising fairly regularly, but they still can’t seem to reach their health goals. They are seeking the additional support, accountability and expertise needed to make lasting changes within the context of their lifestyle.

         </div>

         <div class="botFive-container">

            <div class="firstImg">

               <img class="imgFive" src="../img/profile1.jpg" alt="Alina Parsov">

               <br><br><br>I recently started using Healthify to help me keep track of my daily food intake, and I have to say, it's been a game-changer for me. Healthify is well-designed and user-friendly, with a sleek interface that makes it easy to navigate and input my information.
            

            </div>

            <div class="secondImg">

               <img class="imgFive" src="../img/profile2.jpg" alt="Alina Parsov">


               <br><br><br>I highly recommend using a Healthify for anyone looking to make healthier choices and improve their overall health and wellbeing. It's a convenient and effective tool for anyone looking to track their food intake and exercise routine and make progress towards their goals.

            </div>

            <div class="thirdImg">

               <img class="imgFive" src="../img/profile3.jpg" alt="Britney White">

               <br><br><br>As someone who has struggled with maintaining a healthy diet in the past, I decided to give Healthify a try, and I'm so glad I did. The app I'm using has been a game-changer for me in terms of keeping me accountable and helping me stay on track.

            </div>

         </div>

         <div class="footerFive">

            We would appreciate if you let us a comment

            <div class="buttonFive">

               <button class="button5"><a href="">Give a Review</a></button>

            </div>

         </div>

      </div>

      <div class="info-container">

         <div class="leftInfo">

            <div class="infoHead"><span style="color: rgb(42, 230, 42);">H</span>ealthify</div>

            You can't exercise your way out of a bad diet. Get comfortable with being uncomfortable.  If it was about knowledge, we would all be skinny and rich. It’s not about what you know but what you do!

         </div>

         <div class="midInfo">

            <div class="midText">Connect With Us<br><br></div>


            <a href="#"  class="fa fa-youtube"  style="padding-right: 30px; margin-left: 25px;"></a>
            <a href="#"  class="fa fa-facebook"  style="padding-right: 30px;"></a>
            <a href="#"  class="fa fa-instagram"  style="padding-right: 30px;"></a>
            <a href="#"  class="fa fa-twitter"  style="padding-right: 30px;"></a>

         </div>


         <div class="rightInfo">

            <div class="rightText">Contact Us</div>
            <i class="fa fa-envelope"> - info@healthify@gmail.com <br></i>
            <i class="fa fa-phone"> - 04*-***-***</i>

         </div>

      </div>


      <footer class="footer">

         Copyright 2023 | HEALTHIFY. Profesional Diet Application

      </footer>

   </body>

</html>
@endsection