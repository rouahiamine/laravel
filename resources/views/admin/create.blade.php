@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin/home">Accueil</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Ajouter question</li>
                </ol>
              </nav>
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard Admin') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <form method="POST" action="/admin/add">
                        @csrf
                        <div class="mb-3">
                            <label for="enonce" class="form-label">Question</label>
                            <input type="text" class="form-control" id="enonce" name="enonce" required>
                          </div>


                        <div class="mb-3">
                          <label for="reps" class="form-label">Réponse</label>
                          <input type="text" class="form-control" id="reps" name="reps" required aria-describedby="presHelp">
                          <div id="presHelp" class="form-text">Séparer par des Point-virgule ( ; ) </div>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" aria-label="Type" id="type" name="type">
                                <option value="0" selected>Choix simple</option>
                                <option value="1">Choix multiple</option>
                          </select>
                        </div>

                        <div class="mb-3">
                            <label for="vrai" class="form-label">Solution</label>
                            <input type="text" class="form-control" id="vrai" name="vrai" required aria-describedby="vraiHelp">
                            <div id="vraiHelp" class="form-text">Indice solution Séparer par des Point-virgule ( ; ) 1ere indixe = 0</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Valider</button>
                      </form>



                </div>
            </div>




        </div>
    </div>
</div>
@endsection
