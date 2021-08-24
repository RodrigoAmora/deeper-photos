@extends('index')
@section('body')
  <div id="about" class="text-center">
    <h1>Lista de Álbuns</h1>

    <!-- Albuns -->
    <div class="row">
      <?php foreach ($listaAlbuns as $album): ?>
        <div class="col-md-3 col-sm-6 skill">
          <a class="page-scroll" href="sendPhoto?idAlbum={{$album->id}}&nameAlbum={{$album->name}}"><h4>{{$album->name}}</h4></a>

          <p class="card-text text-center">
            {{$album->description}}
          </p>
        </div>
      <?php endforeach ?>
    </div>
  </div>
@stop