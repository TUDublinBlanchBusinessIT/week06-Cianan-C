@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Orderdetail
        </h1>
    </section>
    <div class="content">
       @include('basic-template::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orderdetail, ['route' => ['orderdetails.update', $orderdetail->id], 'method' => 'patch']) !!}

                        @include('orderdetails.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
    </div>
@endsection