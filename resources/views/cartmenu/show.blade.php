@extends('layouts.app')

@section('template_title')
    {{ $cartmenu->name ?? 'Show Cartmenu' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cartmenu</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cartmenus.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Session:</strong>
                            {{ $cartmenu->session }}
                        </div>
                        <div class="form-group">
                            <strong>Menu Id:</strong>
                            {{ $cartmenu->menu_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
