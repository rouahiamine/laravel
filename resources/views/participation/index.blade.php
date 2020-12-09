@extends('welcome')

@section('content')

<table class="table table-success table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Questions</th>
        <th scope="col">Respo</th>
        <th scope="col">Type</th>
        <th scope="col">Vrai repo</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @php $i=1; @endphp
        @foreach ($question  as $ques)

        @php
        $myreps = explode(";",$ques->reps);
        @endphp

            <tr>
            <th scope="row">{{ $i}}</th>
            <td>{{ $ques->enonce}}</td>
                <td>
                    <ul class="list-group">
                        @foreach ($myreps  as $rep)
                            <li class="list-group-item">{{ $rep }}</li>
                        @endforeach
                    </ul>
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
                        @foreach ($TabVrai  as $vrairep)
                            <li class="list-group-item">{{ $myreps[$vrairep] }}</li>
                        @endforeach
                    </ul>
                </td>
                <td></td>
            </tr>
        @php $i++; @endphp
        @endforeach




    </tbody>
  </table>

@endsection
