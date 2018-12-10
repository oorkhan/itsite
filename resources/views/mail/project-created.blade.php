@component('mail::message')
New project: {{$project->title}}


{{$project->description}}

@component('mail::button', ['url' => '/projects/'.$project->id])
View
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
