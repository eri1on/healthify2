<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageList extends Component
{
    public function deleteMessage($messageId)
    {
        $message = Contact::find($messageId);

        if ($message) {
            $message->delete();
            session()->flash('success', 'Message deleted successfully.');
        }
    }

    public function render()
    {
        $user = Auth::user();

        if ($user && ($user->is_admin || $user->is_superadmin)) {
            $messages = Contact::all();
            return view('livewire.message-list', compact('messages'));
        }

        return redirect()->back()->with('error', 'Unauthorized access!');
    }
}
