@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Sale
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
{{--                @include('common.errors')--}}

                <!-- New Task Form -->
                    <form action="{{ url('/sales')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                        <div class="form-group" style="display: flex">

                            <label for="descriptionId" class="col-sm-3 control-label">description</label>
                            <div class="col-sm-6">

                                <input type="text" name="description" id="descriptionId" class="form-control" value="{{ old('description') }}">
                            </div>


                            <label for="priceId" class="col-sm-3 control-label">price</label>
                            <div class="col-sm-6">

                                <input type="text" name="price" id="priceId" class="form-control" value="{{ old('price') }}">
                            </div>

                            <label for="currencyId" class="col-sm-3 control-label">currency</label>
                            <div class="col-sm-6">

                                <input type="text" name="currency" id="currencyId" class="form-control" value="{{ old('currency') }}">
                            </div>

                        </div>

                        <!-- Add sale Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>insert sale
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @isset($sales)
            @if (count($sales) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Sale</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td class="table-text"><div>{{ $sale->description }}</div></td>

                                    <!-- Task Delete Button -->
                                    <td>
                                        <form action="{{ url('/sales/'.$sale->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            @endisset
        </div>
    </div>
@endsection
{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                @if (session('status'))--}}
{{--                    <div class="alert alert-success" role="alert">--}}
{{--                        {{ session('status') }}--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                <div class="card card-new-task">--}}
{{--                    <div class="card-header">New sale</div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form method="POST" action="{{ route('sales.store') }}">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="title">Title</label>--}}
{{--                                <input id="title" name="title" type="text" maxlength="255" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" autocomplete="off" />--}}
{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn-primary">Create</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Sales</div>--}}

{{--                    <div class="card-body">--}}
{{--                        <table class="table table-striped">--}}
{{--                            @foreach ($sales as $sale)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                         {{ $task->description }}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                        </table>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
