@component('mail::message')

<h2> <center> {{ __('Instructor Apply Request') }} </center> </h2>

<ul>
  <li>Username      : {{ $applyService->name }}</li>
  <li>Email         : {{ $applyService->email }}</li>
  <li>Service       : {{ $applyService->service->title }}</li>
  <li>Message       : {{ $applyService->desc}}</li>
</ul>


@endcomponent
