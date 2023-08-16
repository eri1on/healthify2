@if (isset($unauthorized) && $unauthorized)
<div style="color: red; background-color: #fff; padding: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
    Unauthorized access!  <a href="/">Go back</a>
</div>
@else

        <div>
            @if ($messages->isEmpty())
                <h4 style="font-style: italic; color: #252B48; text-align: center;">No Messages Here!</h4>
            @else
                @foreach ($messages as $message)
                    <div class="message">
                        <p><strong>SignUp ID:</strong> {{ $message->fk_signUp_id }}</p>
                        <p><strong>Name:</strong> {{ $message->firstName }}</p>
                        <p><strong>Email:</strong> {{ $message->email }}</p>
                        <p><strong>Message:</strong> {{ $message->message }}</p>
                        <button wire:click="deleteMessage({{ $message->id }})" class="btn">Delete</button>
                    </div>
                @endforeach
            @endif

            @if (session()->has('success'))
                <div style="color: crimson; font-size: larger;" class="success-message">
                    {{ session('success') }}
                </div>
            @endif
        </div>
   
@endif
