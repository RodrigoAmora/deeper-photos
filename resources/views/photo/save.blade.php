@extends('index')
@section('body')
  <div >
    <div class="container">
      <?php if (Auth::check()): ?>
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
            <h1>Enviar Fotos</h1>
            <!-- Form de enviar fotos -->
            <form method="POST" action="sendPhoto" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="hidden" name="idAlbum" class="form-control" value="{{$idAlbum}}" />
                    <input type="hidden" name="nameAlbum" class="form-control" value="{{$nameAlbum}}" />
                    <input type="file" name="names[]" class="form-control" placeholder="Selecione uma foto...." required="required" multiple />
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" id="btn-enviar" class="btn btn-default btn-lg page-scroll">ENVIAR</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--<button type="submit" id="btn-enviar" class="btn btn-primary">ENVIAR</button>-->
            </form>
          </div>
        </div>
      <?php endif ?>

      <br><br><br>
      <hr>
      <br><br><br>

      <!-- Photos -->
      <div class="portfolio-items">
        <?php foreach ($listPhotos as $photo): ?>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="card text-center">
              <div class="card-body">
                <p class="rounded">
                  <img src="{{$photo->destination_path}}" width="100" height="100" />
                </p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>

      <div class="col-xs-12 col-md-12 text-center">
        <br><br><br><hr>
        <p>
          {!! $listPhotos->appends(['idAlbum' => $idAlbum, 'nameAlbum' => $nameAlbum])->render() !!}
        </p>
      </div>
    </div>
  </div>
@stop