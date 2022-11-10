@extends('layouts.app')

@section('template_title')
    {{ $detallemenu->name ?? 'Show Detallemenu' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detallemenu</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detallemenus.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Menu Id:</strong>
                            {{ $detallemenu->menu_id }}
                        </div>
                        <div class="form-group">
                            <strong>Catitem Id:</strong>
                            {{ $detallemenu->catitem_id }}
                        </div>
                        <div class="form-group">
                            <strong>Item Id:</strong>
                            {{ $detallemenu->item_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
