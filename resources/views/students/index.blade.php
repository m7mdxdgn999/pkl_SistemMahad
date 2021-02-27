@extends('layouts.master')
@section('title', 'Admin Panel')

@section('content')
    <section class="section">

        <div class="section-header">
            <h1>Admin Panel</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                <div class="breadcrumb-item">Form</div>
            </div>
        </div>

        <div class="section-body">

            <a href="{{ route('student.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah
                Data</a>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">

                    @if(session('message'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>×</span>
                          </button>
                          {{ session('message') }}
                        </div>
                      </div>
                    @endif

                    {{-- table start --}}
                    <div class="card-body">
                        <table class="table table-borderless text-center ">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col" >Aksi</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                           
                                            <form action="{{ route('student.edit',$student->id) }}" class="float-start" style="margin:2px"  method="get">
                                              <button  type="submit"  class="btn btn-primary ">Edit</button>
                                            </form>
                                            <form action="{{ route('student.destroy',$student->id) }}" class="float-start swal-confirm" style="margin:2px" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger swal-confirm ">Delete</button>
                                            </form>

                                        </td>
                                        <td>{{ $student->nama_mahasiswa }}</td>
                                        <td>{{ $student->nim }}</td>
                                        <td><button type="button" class="btn btn-warning">Details</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $students->links() }}

                    </div>
                    {{-- tablde end --}}


                </div>

            </div>


        </div>
    </section>
@endsection

@push('page-scripts')
    <script src=" {{ asset('assets/js/page/modules-sweetalert.js') }}"></script>
@endpush

@push('after-scripts')
<script>
$(".swal-confirm").click(function() {
    swal({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover this imaginary file!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
        swal('Poof! Your imaginary file has been deleted!', {
          icon: 'success',
        });
        } else {
        swal('Your imaginary file is safe!');
        }
      });
  });
</script>
    
@endpush
