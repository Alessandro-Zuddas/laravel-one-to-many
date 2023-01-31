@extends('layouts.admin')

@section('content')

    <h1 class="mt-2">{{ $type->name }}</h1>

    <ul>
        <li>{{ $type->id }}</li>
        <li>{{ $type->name }}</li>
        <li>{{ $type->slug }}</li>

        @forelse ($type->projects as $project)
            <li>{{ $project->name }}</li>
        @empty
            <li>Nessun progetto associato alla categoria!</li>
        @endforelse

        <a href="{{ route("admin.types.index") }}">Torna alla lista</a>
    </ul>

@endsection