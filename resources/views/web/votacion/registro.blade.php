@extends('web.votacion.app')
@push('stylesheet')
<title>@yield('title', 'Votación - Edugestion')</title>
@endpush
@section('content')

<form-votacion
  photo="{{ current_votacion()->present()->getPhoto() }}"
  :current-votacion="{{ current_votacion()}}"
  post-search="{{ route('web.votacion.api.search') }}"
  post-candidatos="{{ route('web.votacion.api.candidatos') }}"
  post-sufragar="{{ route('web.votacion.api.sufragar')}}"
></form-votacion>

@endsection
