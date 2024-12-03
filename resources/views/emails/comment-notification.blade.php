<!DOCTYPE html>
<html>
<head>
    <title>New Comment</title>
</head>
<body>
    <h2>{{ $commenter->name }} commented on your project: <strong>{{ $project->title }}</strong></h2>
    <p>Your project: <strong>{{ $project->title }}</strong></p>
    <p>Comment: "{{ $comment->content }}"</p>
</body>
</html>
