@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Accueil') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(session('success'))


                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong> Merci pour votre participation
                      </div>


                @endif

                    <div class="list-group">

                        <form method="POST" data-parsley-validate="">
                            @csrf
                            @foreach ($questions as $ques)
                            @php
                                $TabVrai = explode(";",$ques->vrai);
                                $nbrVrai = count($TabVrai);
                            @endphp
                                <li href="#" class="list-group-item list-group-item-action " aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $ques->enonce}}</h5>
                                    <small>@if ($ques->type == 0) Choix simple @else Choix multiple | {{ $nbrVrai }} choix possible @endif</small>

                                    </div>
                                    <p class="mb-1"></p>

                                    @php
                                        $myreps = explode(";",$ques->reps);
                                    @endphp



                                    @if ($ques->type == 0)
                                        @php
                                        $i=0;
                                        @endphp
                                        @foreach ($myreps as $repi)

                                            <div class="form-check">
                                            <input @php if($i==0) echo 'required'; @endphp  class="form-check-input" value="{{$i}}"  type="radio" name="radio{{$ques->id}}" id="{{ $ques->id.$i}}">
                                                <label class="form-check-label"  for="{{ $ques->id.$i}}">
                                                {{$repi}}
                                                </label>
                                            </div>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach


                                    @else

                                        @php
                                        $i=0;
                                        @endphp
                                        @foreach ($myreps as $repj)

                                            <div class="form-check">
                                            <input  class="form-check-input" name="check{{$i}}" type="checkbox" value="{{$i}}" id="{{ $ques->id.$i}}">
                                                <label class="form-check-label" for="{{ $ques->id.$i}}">
                                                    {{$repj}}
                                                </label>
                                            </div>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach
                                    @endif
                                </li>



                            @endforeach

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Valider</button>
                              </div>
                        </form>
                        </div>









                </div>
            </div>
        </div>
    </div>
</div>
@endsection
