@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Scorder
        </h1>
    </section>
    <div class="content">
        @include('basic-template::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'scorders.store']) !!}

                        @include('scorders.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
