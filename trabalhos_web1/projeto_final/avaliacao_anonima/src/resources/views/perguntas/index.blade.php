@extends('layouts.padrao')

@section('title', 'Avaliação')

@section('content')
    <h1>Responder Avaliação</h1>

    <livewire:responder-questoes :dispositivo-id="$dispositivo_id" />
@endsection