
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Automobiliai</div>

                    <div class="card-body ">
                        <a href="{{ route("cars.create") }}" class="btn btn-success float-end mb-3" >Pridėti naują automobilį</a>

                          <form method="post" action="{{route('cars.search')}}">
                              @csrf

                              <div class="mb-3">
                                  <select class="form-select" aria-label="multiple select example" name="owner_id">
                                      <br>

                                      <option  value=""> Pasirinkite automobilio savininka</option>
                                      @foreach($cars as $car)
                                          <option  value="{{$car->owner->id}}" {{ ($car->owner->id==$owner_id)?'selected':'' }}>{{$car->owner->name}} {{$car->owner->surname}}</option>
                                      @endforeach
                                  </select>
                              </div>

                              <hr>


                              <div class="mb-3">
                                  <label class="form-label">Prekinis ženklas</label>
                                  <input class="form-control" type="search" id="brand" name="brand"  value="{{$brand}}">

                              </div>
                              <hr>
                              <div class="mb-3">
                                  <label class="form-label">Modelis</label>
                                  <input class="form-control" type="search" id="model" name="model"  value="{{$model}}">

                              </div>
                              <hr>
                              <div class="mb-3">
                                  <label class="form-label">Registracijos Numeris</label>
                                  <input class="form-control" type="search" id="reg_number" name="reg_number"  value="{{$reg_number}}">

                              </div>

                              <button class=" btn btn-info">Ieškoti</button>

                          </form>
                        <form method="post" action="{{route('cars.forget')}}">
                            @csrf
                            <button class="btn btn-danger m-2 ">Išvalyti paiešką</button>
                        </form>


                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Registracijos numeris</th>
                                <th>Markė</th>
                                <th>Modelis</th>
                                <th>Savininko Id</th>
                                <th>Savininko Vardas</th>
                                <th>Savininko Pavardė</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{ $car->id }} </td>
                                    <td>{{ $car->reg_number }} </td>
                                    <td>{{ $car->brand }} </td>
                                    <td>{{ $car->model }} </td>
                                    <td>{{ $car->owner_id }}</td>
                                    <td>{{ $car->owner->name }}</td>
                                    <td>{{ $car->owner->surname}}</td>
                                    <td style="width: 150px;">
                                        <a href="{{ route("cars.edit", $car->id) }}" class="btn btn-success">Redaguoti</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route("cars.destroy", $car->id) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger">Ištrinti</button>
                                        </form>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table>

                         Susisiekite su mumis: [[shortcode]]
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
