<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Messages</title>
<link rel="stylesheet" href="styles.css">

</head>
<body>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <div id="messages" class="messages"></div>
    <form id="messageForm" class="message-form" action='/messages/send' method="POST">
    @csrf <!-- Ajoutez ceci pour la protection CSRF -->
    <input type="hidden" name="sender_id" value="{{ auth()->id() }}">
    <select name="recipient_type" id="recipient_type" class="form-control" required="required">
        <option value="">Select a recipient type</option>
        <option value="ba">Business Analyst</option>
        <option value="admin">Admin</option>
        <option value="rh">Admin RH</option>
        <option value="vc">Admin VC</option>
        <option value="fn">Admin Finance</option>
    </select> 
    <textarea id="messageContent" name="message_content" placeholder="Your message"></textarea>
    <button type="submit">Send</button>
</form>

</div>

</body>
</html>
</x-app-layout>