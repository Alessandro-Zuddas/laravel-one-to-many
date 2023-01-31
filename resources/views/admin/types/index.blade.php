@extends('layouts.admin')

@section('content')

  <div class="row align-items-center">
    <div class="col">    
      <h1>Lista categorie:</h1>
    </div>
    <div class="col text-end px-4 mx-3">
      <a href="{{ route("admin.types.create") }}" class="btn btn-success"><i class="fa-solid fa-plus"></i></a>
    </div>
  </div>

  @if (session("message"))
    <div class="alert alert-success">
      {{ session("message") }}
    </div>
  @endif

  <table class="table">
      <thead>
        <tr class="text-center">
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Slug</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($types as $type)
        <tr>
          <th scope="row">{{ $type->id }}</th>
          <td>{{ $type->name }}</td>
          <td>{{ $type->slug }}</td>
          
          {{-- Actions buttons --}}
          <td class="text-center">
            <a href="{{ route("admin.types.show", $type->id) }}" class="btn btn-primary mt-1"><i class="fa-solid fa-eye"></i></a>
            <a href="{{ route("admin.types.edit", $type->id) }}" class="btn btn-warning mt-1"><i class="fa-solid fa-pen"></i></a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger mt-1" data-bs-toggle="modal" data-bs-target="#modal-{{ $type->id }}">
              <i class="fa-solid fa-trash"></i>
            </button>

          </td>
          {{-- /Actions buttons --}}
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="modal-{{ $type->id }}" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sei sicuro?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Vuoi eliminare definitivamente la categoria "{{ $type->name }}"?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Indietro</button>
                <form action="{{ route("admin.types.destroy", $type->id) }}" method="POST">

                  @csrf
                  @method("DELETE")
  
                  <button type="submit" class="btn btn-primary">Conferma</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        @endforeach

      </tbody>
  </table>

@endsection