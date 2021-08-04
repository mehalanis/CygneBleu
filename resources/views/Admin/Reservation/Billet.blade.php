@extends('layout.admin')
@section('head')

@endsection
@section('titre')
Billet
@endsection
@section('route')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="{{route("BilletReservation.index")}}">Billet</a></li>
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
                                    <th>Ville Depart</th>
                                    <th>Ville Arrivee</th>
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
               ajax: '{{ route('BilletReservationController.datatables') }}',
               columns: [
                        { data: 'nom', name: 'nom' },
                        { data: 'ville_depart', name: 'ville_depart' },
                        { data: 'ville_arrivee', name: 'ville_arrivee' },
                        { data: 'action', searchable: false, orderable: false },
                     ],
            });
  });
</script>
@endsection