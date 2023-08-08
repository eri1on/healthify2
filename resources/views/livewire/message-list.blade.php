

<div>
    @foreach ($messages as $message)
        <div class="message">
            <p><strong>Name:</strong> {{ $message->firstName }}</p>
            <p><strong>Email:</strong> {{ $message->email }}</p>
            <p><strong>Message:</strong> {{ $message->message }}</p>
            <p><strong>signUp ID:</strong> {{ $message->fk_signUp_id }}</p>
            
            <button wire:click="deleteMessage({{ $message->id }})" class="btn">Delete</button>
        </div>
    @endforeach

    @if (session()->has('success'))
        <div style="color: red; font-size: larger" class="success-message">
            {{ session('success') }}
        </div>
    @endif
</div>

