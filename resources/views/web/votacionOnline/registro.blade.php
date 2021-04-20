@extends('web.votacionOnline.app')
@push('stylesheet')
<title>@yield('title', 'Votación - Edugestion')</title>
@endpush
@section('content')

<form-votacion-online
  photo="{{ current_votacion_online()->votacion->present()->getPhoto() }}"
  :current-votacion="{{ current_votacion_online()->votacion}}"
  get-candidatos="{{ route('web.votacionOnline.api.candidatos') }}"
  post-sufragar="{{ route('web.votacionOnline.api.sufragar')}}"
  get-call-back="{{ route('web.votacionOnline.index') }}"
></form-votacion-online>
{{-- photo="{{ current_votacion()->present()->getPhoto() }}"
:current-votacion="{{ current_votacion()}}"
post-search="{{ route('web.votacion.api.search') }}"
post-candidatos="{{ route('web.votacion.api.candidatos') }}"
post-sufragar="{{ route('web.votacion.api.sufragar')}}" --}}
@endsection
