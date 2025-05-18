@component('mail::message')

# Thank You For Your Message
<p><strong>Name</strong> {{$data['name']}}</p>
<p><strong>Lname</strong> {{$data['lname']}}</p>
<p><strong>Email</strong> {{$data['email']}}</p>
<p><strong>Subject</strong> {{$data['address']}}</p>
<strong>Message</strong>
{{$data['message']}}
@endcomponent
