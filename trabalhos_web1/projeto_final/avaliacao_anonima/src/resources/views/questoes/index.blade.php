@extends('layouts.padrao')
@section('title', 'Avaliação')

@section('content')
    <h2 class="titulo-principal">Responder Avaliação</h2>
    <livewire:responder-questoes :dispositivo-id="$dispositivo_id" />
@endsection