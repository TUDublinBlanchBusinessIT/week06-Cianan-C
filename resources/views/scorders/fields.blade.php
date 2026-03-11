<!-- Orderdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orderdate', 'Orderdate:') !!}
    {!! Form::date('orderdate', null, ['class' => 'form-control']) !!}
</div>

<!-- Deliverystreet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deliverystreet', 'Deliverystreet:') !!}
    {!! Form::text('deliverystreet', null, ['class' => 'form-control']) !!}
</div>

<!-- Deliverycity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deliverycity', 'Deliverycity:') !!}
    {!! Form::text('deliverycity', null, ['class' => 'form-control']) !!}
</div>

<!-- Deliverycounty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deliverycounty', 'Deliverycounty:') !!}
    {!! Form::text('deliverycounty', null, ['class' => 'form-control']) !!}
</div>

<!-- Ordertotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ordertotal', 'Ordertotal:') !!}
    {!! Form::number('ordertotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('scorders.index') !!}" class="btn btn-default">Cancel</a>
</div>
