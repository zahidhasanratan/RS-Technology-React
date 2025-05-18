@component('mail::message')

# Thank You For Your Registration
<p><strong>Name</strong> {{$data['name']}}</p>
<p><strong>Email</strong> {{$data['email']}}</p>
<p><strong>Ticket</strong> <a href="https://dmcalumnitrust.org/dmc/ticket/{{$data['random']}}">Download Ticket</a></p>

@endcomponent
