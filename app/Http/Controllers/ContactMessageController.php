<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::all();
        return view('message.index', compact('messages'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        
        $message->update([
            'read' => true,
        ]);
        
        return view('message.show', compact('message'));
    }

    public function delete($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();
        return redirect()->route('message.index')->with('success', 'Mensaje eliminado exitosamente.');
    }
}
