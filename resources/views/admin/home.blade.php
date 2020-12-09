@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Admin') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
                    <a class="btn btn-primary me-md-2" href="/admin/create" type="button">Ajouter</a>
                    </div>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Questions</th>
                            <th scope="col">Réponses</th>
                            <th scope="col">Type</th>
                            <th scope="col">Solution</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach ($questions as $ques)
                            @php
                            $myreps = explode(";",$ques->reps);
                            @endphp

                                <tr>
                                    <th scope="row">{{ $i}}</th>
                                    <td>{{ $ques->enonce}}</td>
                                    <td>
                                        @foreach ($myreps  as $rep)
                                        <li class="list-group-item">{{ $rep }}</li>
                                        @endforeach

                                    </td>
                                    <td>
                                        @if ( $ques->type == 0)
                                            <span class="badge bg-primary">Choix simple</span>
                                        @else
                                            <span class="badge bg-info ">Choix multiple</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $TabVrai = explode(";",$ques->vrai);
                                            $nbrVrai = count($TabVrai);
                                        @endphp
                                        <ul class="list-group">
                                            @foreach ($TabVrai as $vrairep)
                                                <li class="list-group-item">{{ $myreps[$vrairep] }}</li>
                                            @endforeach
                                        </ul>
                                    </td>

                                </tr>
                          @php $i++; @endphp
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>




        </div>
    </div>
</div>
@endsection
