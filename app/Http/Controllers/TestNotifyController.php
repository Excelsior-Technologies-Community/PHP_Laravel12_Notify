<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TestNotifyController extends Controller
{
    public function index()
    {
        return redirect()->back();
    }

    public function successNotify()
    {
        $this->persist('success', 'Success!', 'Operation completed successfully.', 'toast');

        notify()->success('Operation completed successfully!', 'Success');

        return redirect()->back();
    }

    public function errorNotify()
    {
        $this->persist('error', 'Error!', 'Something went wrong. Please try again.', 'toast');

        notify()->error('Something went wrong!', 'Error');

        return redirect()->back();
    }

    public function warningNotify()
    {
        $this->persist('warning', 'Warning!', 'Please review your input before proceeding.', 'toast');

        notify()->warning('Please review your input!', 'Warning');

        return redirect()->back();
    }

    public function infoNotify()
    {
        $this->persist('info', 'Info', 'Here is some useful information for you.', 'toast');

        notify()->info('Here is some useful information!', 'Info');

        return redirect()->back();
    }

    public function history(Request $request)
    {
        $notifications = Notification::where('user_id', Auth::id())
            ->latest()
            ->paginate(20);

        $unreadCount = Notification::where('user_id', Auth::id())
            ->unread()
            ->count();

        return view('notifications.history', compact('notifications', 'unreadCount'));
    }

    public function markAsRead($id)
    {
        $notification = Notification::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $notification->update([
            'is_read' => true,
            'read_at' => now(),
        ]);

        notify()->success('Notification marked as read.', 'Success');

        return redirect()->back();
    }

    public function markAllAsRead()
    {
        Notification::where('user_id', Auth::id())
            ->unread()
            ->update([
                'is_read' => true,
                'read_at' => now(),
            ]);

        notify()->success('All notifications marked as read.', 'Success');

        return redirect()->back();
    }

    public function uploadForm()
    {
        return view('notifications.upload');
    }

    public function uploadFile(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|file|max:10240',
            'description' => 'nullable|string|max:255',
        ]);

        $path = $request->file('file')->store('uploads', 'public');

        $this->persist(
            'success',
            'File Uploaded',
            'Your file "' . $request->file('file')->getClientOriginalName() . '" has been uploaded successfully.',
            'upload',
            $path
        );

        notify()->success('File uploaded successfully!', 'Upload Complete');

        return redirect()->route('notifications.upload.form');
    }

    private function persist(string $type, string $title, string $message, ?string $category = null, ?string $relatedId = null): void
    {
        Notification::create([
            'user_id' => Auth::id(),
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'category' => $category,
            'source' => 'web',
            'related_id' => $relatedId,
        ]);
    }
}
