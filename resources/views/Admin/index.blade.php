@extends('layout.admin')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- Donut chart -->
                <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    Donut Chart
                    </h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="donut-chart" style="height: 300px;"></div>
                </div>
                <!-- /.card-body-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="{{asset("Admin")}}/plugins/flot/jquery.flot.js"></script>
<script src="{{asset("Admin")}}/plugins/flot/plugins/jquery.flot.resize.js"></script>
<script src="{{asset("Admin")}}/plugins/flot/plugins/jquery.flot.pie.js"></script>

<script>
    $(function () {
        var donutData = [{label: 'Homme', data : 30, color: '#3c8dbc' },{label: 'Femme',data : 20,color: '#fc6faf'}]
        $.plot('#donut-chart', donutData, {
            series: {
            pie: {
                show       : true,
                radius     : 1,
                innerRadius: 0.5,
                label      : {
                show     : true,
                radius   : 2 / 3,
                formatter: labelFormatter,
                threshold: 0.1
                }
            }
            },
            legend: {
            show: false
            }
        })
    })
    function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:3px; color: #fff; font-weight: 600;">'
        + label
        + '<br>'
        + Math.round(series.percent) + '%</div>'
    }

</script>
@endsection