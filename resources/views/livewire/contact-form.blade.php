



<div class="container">
 
    <div class="contact-box">
        <div class="left"></div>
  
        <div class="right">
       
            <h2>Contact Us</h2>
            <form wire:submit.prevent="submitForm">
            <input wire:model="firstname" type="text" class="field" placeholder="Name" readonly />
            @error('firstname') <span class="error">{{ $message }}</span> @enderror

            <input wire:model="email" type="text" class="field" placeholder="Email" readonly />
            @error('email') <span class="error">{{ $message }}</span> @enderror

            <input wire:model="phone" type="text" class="field" placeholder="Phone" />
            @error('phone') <span class="error">{{ $message }}</span> @enderror

            <textarea wire:model="message" placeholder="Message" class="field"></textarea>
            @error('message') <span class="error">{{ $message }}</span> @enderror

            <button class="btn">Send</button>
           
            </form>

           @if (session()->has('success'))
              <div style="color:red; font-size:larger" class="success-message">
               {{ session('success') }}
               
              </div>
             
            @endif
            <a href="/" style="font-size: smaller">Go Back To Home Page</a>

        </div>
    </div>
 
    
</div>

