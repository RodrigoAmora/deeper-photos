@extends('index')
@section('body')
  <div id="about" class="text-center">
    <div class="overlay">
      <div class="container">
        <h1>Criar Álbum</h1>

        <!-- Form de criar album -->
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="saveAlbum">
              @csrf
              <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Nome do álbum....." required="required">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" name="description" class="form-control" placeholder="Descrição...." required="required">
                </div>
              </div>

              </div>
              <button type="submit" id="btn-enviar" class="btn btn-primary btn-lg page-scroll">ENVIAR</button>
              <!--<button type="submit" id="btn-enviar" class="btn btn-default">ENVIAR</button>-->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop