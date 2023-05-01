<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="/css/SignUp.css">
    
</head>
<body>

    



 



    <div id="signup-form-div">
        <form id="signup-form" method="post"> 


            <img class="img"src="https://cdn-icons-png.flaticon.com/512/10252/10252437.png">

            <h2>Welcome! Please enter your details</h2>
            <input class="form-input" id="username"   type = "text" name="username" placeholder="Username">

            <div class="form-row" >
            <input class="form-input" id="email"  type = "email" name="email" placeholder="Email">
            <input class="form-input" id="password"  type = "password" name="password" placeholder="Password"><br>
            </div>
             
     <div class="form-row">

            <input class="form-input" id="age"  type = "number" name="age" placeholder="Age">

            <select class="form-input" id="gender"  type = "text" name="gender">
                <option value="">Gender</option>
               <option value="male">Male</option>
               <option value="female">Female</option>
            </select>
     </div>


        <div class="form-row">
            <input class="form-input" id="height"  type = "number" name="height" placeholder="Height">
            <input class="form-input" id="weight"  type = "number" name="weight" placeholder="Weight">
        </div>

        <div class="form-row">

            <select class="form-input" id="goal" type = "text" name="goal">

            <option value="">Select a goal</option>
            <option value ="lose weight">Lose weight</option>
            <option value="gain weight">Gain weight</option>

            </select>


            <select class="form-input" id="activity"  type = "text" name="activity">
                <option value="">Select Your Activity Level</option>
                <option value="low activity">Low activity</option>
                <option value="very active">Very active</option>

            </select>

        </div> 
        
        <br> <br>
        
        <button  class="submit-btn"  type="submit" name ="submit">Sign Up</button>

        <p class="existing-user-p"> Already have an  Account? <a href="{{route('login1')}}">Login here</a></p>
        </form>

     



      </div>
      <div id="why-div">
 
        <div class="why-div-li">
        
        
                <ul>
                    <h2>  Building Your Profile: Why Your Information Matters</h2>
            <li>Username: A unique username will be used to identify you on our platform.</li>
            <li>Email: Your email will be used for communication and account verification.</li>
            <li>Password: A strong password will help keep your account secure.</li>
            <li>Age: Your age is important for setting up personalized fitness goals.</li>
            <li>Gender: Your gender helps us understand your body type and create customized plans for you.</li>
            <li>Height: Your height is an important factor in determining your body mass index (BMI) and your personalized fitness goals.</li>
            <li>Weight: Your weight is important in setting up your personalized fitness plan and tracking your progress.</li>
            <li>Your Goal : Setting up your fitness goal helps us customize a plan that will help you achieve your desired results.</li>
            <li>Activity: Knowing your activity level helps us customize a fitness plan that suits your lifestyle.</li>
        </ul>
        
        </div>
        
        
        
        
        
        
        
            </div>






    



    
</body>
</html>