@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alertDanger">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Danger!</strong>
            @foreach ($errors->all() as $error)
                <ul>
                    <ol>{{ $error }}</ol>
                </ul>
            @endforeach
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center"> Encaissement Journaliere </h4>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Numero</th>
                                    <th> Date </th>
                                    <th> Description </th>
                                    <th> Montant </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($encaissement as $data)
                                    <tr>
                                        <td> {{ $data['num'] }} </td>
                                        <td> {{ $data['date'] }} </td>
                                        <td> {{ $data['designation'] }} </td>
                                        <td> {{ $data['montant'] }} Ar </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-right">Total</th>
                                    <th id="total"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
