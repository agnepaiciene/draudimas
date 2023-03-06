@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Savininkai</div>

                    <div class="card-body">
                        <div class="clearfix">
                          <a href="{{ route("owners.create") }}" class="btn btn-success float-end">Pridėti naują saviniką</a>
                        </div>

                        <br>
                         <hr>

                       <form method="post" action="{{route('owners.search')}}">
                           @csrf
                         <div class="mb-3">
                             <label class="form-label"> Vardas</label>
                             <input class="form-control" type="search" id="surname" name="name" placeholder="ieškokite pagal vardą" value="{{$name}}">
                         </div>
                           <button class="btn btn-info">Ieškoti</button>


                        <hr>


                            <div class="mb-3">
                                <label class="form-label">Pavardė</label>
                                <input class="form-control" type="search" id="surname" name="surname" placeholder="ieškokite pagal pavardę" value="{{$surname}}">

                            </div>
                            <button class=" btn btn-info">Ieškoti</button>
                        </form>


                       <hr>

                        <table class="table">
                            <thead>
                            <tr class="fs-4">
                                <th >Vardas</th>
                                <th>Pavardė</th>
                                <th>Automobiliai</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($owners as $owner)
                                <tr>
                                    <td>{{ $owner->name }} </td>
                                    <td>{{ $owner->surname }} </td>
                                    <td>
                                        @foreach($owner->cars as $car)
                                            {{ $car->brand}} {{ $car->model}} <br>
                                        @endforeach

                                    </td>
                                    <td style="width: 200px;">
                                        <a href="{{ route("owners.update", $owner->id) }}" class="btn btn-success">Redaguoti</a>
                                        @if ($owner->cars->count()==0)
                                            <a href="{{ route('owners.delete', $owner->id) }}" class="btn btn-danger">Ištrinti</a>
                                        @endif
{{--                                        <a href="{{ route('$owners.delete', $owner->id) }}" class="btn btn-danger">Ištrinti</a>--}}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
