@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 1604.8px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fas fa-chart-line"></i></span>
                            <div class="info-box-content">
                                {{--<span class="info-box-text">Sales To Date</span>--}}
                                {{--<span class="info-box-number text-lg">1,410</span>--}}
                                <h1 class="info-box-number">{{ $gallon_count['number_of_gallons'] ?? 0 }} <span class="text-md text-muted">Gallon(s)</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
