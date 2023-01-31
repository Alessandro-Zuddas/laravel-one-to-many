@extends('layouts.admin')

@section('content')

    <h1 class="mt-2">{{ $project->name }}</h1>

    <h2>Categoria: 
        @if (isset($project->type->name))
            <a href="{{ route("admin.types.show",  $project->type)}}">{{ $project->type->name }}</a>
        @else
            Nessuna categoria
        @endif
    </h2>

    <ul>
        <li>{{ $project->description }}</li>
        <li>{{ $project->date }}</li>
        <li>{{ $project->slug }}</li>
        @if($project->project_image)
        <li>
            <img class="w-25" src="{{ asset("storage/$project->project_image") }}" alt="{{ $project->name }}">
        </li>
        @endif

        <a href="{{ route("admin.projects.index") }}">Torna alla lista</a>
    </ul>

@endsection