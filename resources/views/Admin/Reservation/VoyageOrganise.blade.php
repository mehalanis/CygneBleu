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
                        <table id="table_voyage" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom et Prenom</th>
                                    <th>Pays</th>
                                    <th>Ville</th>
                                    <th>Action</th>
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
    var table = $('#table_voyage').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               ajax: '{{ route('VoyageOrganiseReservationController.datatables') }}',
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