@extends('index')
@section('body')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-12">
	        <div class="card">
	        	<div class="card-header text-center "><br><hr></div>

				<div class="card-body text-center">
					<form method="POST" action="register">
			            @csrf

			            <div class="form-group row">
			            	<div class="col-md-12">
			                  <div class="form-group">
			                    <input type="text" name="name" class="form-control" placeholder="Digite seu nome...." required="required" multiple />
			                  </div>
			                </div>

			                <div class="col-md-12">
			                  <div class="form-group">
			                    <input type="text" name="email" class="form-control" placeholder="Digite seu e-mail...." required="required" multiple />
			                  </div>
			                </div>

			                <div class="col-md-12">
			                  <div class="form-group">
			                    <input type="password" name="password" class="form-control" placeholder="Digite sua senha...." required="required" multiple />
			                  </div>
			                </div>
			            </div>

			            <div class="form-group row mb-0">
							<div class="col-md-12">
			            		<button type="submit" id="btn-enviar" class="btn btn-primary btn-lg page-scroll">CASDASTRAR-SE</button>
			            	</div>
			            </div>
			        </form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop