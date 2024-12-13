<!DOCTYPE html>
<html>
<head>
    <title>New Like Notification</title>
</head>
<body>
    <h1>You received a new like!</h1>

    <p>Hello {{ $likeable->user->name }},</p>

    @if($likeable instanceof \App\Models\Post)
        <p>Your post titled "<strong>{{ $likeable->title }}</strong>" just received a new like!</p>
    @elseif($likeable instanceof \App\Models\Comment)
        <p>Your comment on the post "<strong>{{ $likeable->project->title }}</strong>" just received a new like!</p>
    @endif

    <p><strong>{{ $liker->name }}</strong> liked it!</p>
    <p>Thanks,</p>
    <p>The Team</p>
</body>
</html>
