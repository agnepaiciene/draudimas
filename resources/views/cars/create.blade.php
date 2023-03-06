

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Savinikai</div>

                    <div class="card-body">
                        <form method="post" action="{{ route("cars.store") }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Registracijos numeris</label>
                                <input type="text" class="form-control" name="reg_number">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Please provide a valid reg_number
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Markė</label>
                                <input type="text" class="form-control" name="brand">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Modelis</label>
                                <input type="text" class="form-control" name="model">

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Savininko Vardas</label>

                                <select name="owner_id" class="form-select">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <button class="btn btn-success">Pridėti</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
