@extends('layouts.master')
@section('title', 'Pendaftaran')

@section('content')
    <section class="section">

        {{-- header start --}}
        <div class="section-header">
            <h1>Pendaftaran Mahasantri</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                <div class="breadcrumb-item">Form</div>
            </div>
        </div>
        {{-- header end --}}

        {{-- body start --}}
        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info">
                                <b>Note!</b> Not all browsers support HTML5 type input.
                            </div>

                            <form action="{{ route('student.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nama_mahasiswa">Nama Lengkap</label>
                                            <input type="text" class="form-control @error('nama_mahasiswa') is-invalid                                                    
                                                @enderror" id="nama_mahasiswa" placeholder="Nama Lengkap"
                                                name="nama_mahasiswa">
                                            @error('nama_mahasiswa')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="fakultas_jurusan_semester"> Fakultas/ Jurusan</label>
                                            <input type="text" class="form-control @error('fakultas_jurusan_semester') is-invalid @enderror " id="fakultas_jurusan_semester"
                                                placeholder="Fakultas/Jurusan" name="fakultas_jurusan_semester">
                                            @error('fakultas_jurusan_semester')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="tempat_tanggal_lahir">Tempat dan tanggal lahir</label>
                                            <input type="text" class="form-control @error('tempat_tanggal_lahir') is-invalid @enderror " id="tempat_tanggal_lahir"
                                                placeholder="Tempat dan Tanggal Lahir" name="tempat_tanggal_lahir">
                                            @error('tempat_tanggal_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class=" mb-3">
                                            <label for="nama_org_tua">Nama Orang Tua</label>
                                            <input type="text" class="form-control @error('nama_org_tua') is-invalid @enderror" id="nama_org_tua"
                                                placeholder="Nama Orang Tua" name="nama_org_tua">
                                            @error('nama_org_tua')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat_lengkap">Alamat</label>
                                            <input type="text" class="form-control @error('alamat_lengkap') is-invalid @enderror" id="alamat_lengkap" placeholder="Alamat"
                                                name="alamat_lengkap">
                                            @error('alamat_lengkap')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nim">NIM</label>
                                            <input type="text" class="form-control @error('nim') is-invalid @enderror " id="nim" placeholder="NIM" name="nim">
                                            @error('nim')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_hp_mahasantri">No hp</label>
                                            <input type="text" class="form-control @error('no_hp_mahasantri') is-invalid @enderror " id="no_hp_mahasantri"
                                                placeholder="No hp" name="no_hp_mahasantri">
                                            @error('no_hp_mahasantri')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="jalur_masuk">Jalur
                                                Masuk:</label>
                                            <select class="form-select" name="jalur_masuk" id="jalur_masuk">
                                                <option value="SNMPTN">SNMPTN</option>
                                                <option value="SPAN PTKIN">SPAN PTKIN </option>
                                                <option value="SBMPTN">SBMPTN</option>
                                                <option value="UMPTKIN">UMPTKIN</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_hp_org_tua">No Hp Orang Tua / Wali</label>
                                            <input type="text" class="form-control @error('no_hp_org_tua') is-invalid @enderror " placeholder="No HP Orang Tua/Wali"
                                                name="no_hp_org_tua">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_mabna">Mabna:</label>
                                            <select class="form-select" id="nama_mabna" name="nama_mabna">
                                                <option value="Mabna Syekh Nawawi">Mabna Syekh Nawawi (Putra-Umum)</option>
                                                <option value="Mabna Syekh Abdul Karim">Mabna Syekh Abdul Karim (Putra-Umum)
                                                </option>
                                                <option value="Mabna Sultan  Hasanuddin ">Mabna Sultan Hasanuddin
                                                    (Putra-Kedokteran)</option>
                                                <option value="Mabna Syarifah Mudaim">Mabna Syarifah Mudaim (Putri-Umum)
                                                </option>
                                                <option value="Mabna Syarifah Khadijah ">Mabna Syarifah Khadijah
                                                    (Putri-Kedokteran))</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit" id="submit"
                                        name="submit">Submit</button>
                                    <button class="btn btn-secondary" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>


            </div>
            {{-- body end --}}
    </section>
@endsection

@push('page-scripts')

@endpush
