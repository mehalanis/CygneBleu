@extends('layout.admin')
@section('head')

@endsection
@section('titre')
Voyage Organise
@endsection
@section('route')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="{{route("VoyageOrganise.index")}}">Voyage Organise</a></li>
@endsection
@section('content')
<!-- Main content -->
<section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Custom Elements</h3>
                </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <div style="text-align: right;margin-bottom:8px;">
                            <a href="{{route("Hotel.create")}}" class="btn btn-success"  > Ajouter </a>
                        </div>
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Pays</th>
                                    <th>ville</th>
                                    <th>operation</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </form>
                <!-- /.card-body -->
              </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

@endsection
@section('script')
<script>
  $(function () {
    var table = $('#table').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               ajax: '{{ route('Hotel.datatables') }}',
               columns: [
                        { data: 'nom', name: 'nom' },
                        { data: 'Pays', name: 'Pays' },
                        { data: 'Ville', name: 'Ville' },
                        { data: 'action', searchable: false, orderable: false },
                     ],
            });
  });
</script>
@endsection