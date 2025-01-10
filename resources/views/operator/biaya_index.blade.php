@extends('layouts.app_sneat')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">{{ $title }}</div>

            <div class="card-body">

                <a href="{{ route($routePrefix . '.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a>
                <p>
                    
                </p>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <td style="width: 50px;">No</td>
                                <td>Nama Biaya</td>
                                <td>Total Tagihan</td>
                                <td>Created</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($models as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ format_rupiah($item->total_tagihan) }}</td>
                                <td>{{ $item->user ? $item->user->name : 'Tidak Ada User' }}</td>
                                <td width="250" class="text-center">
                                    {!! Form::open([
                                    'route' => [$routePrefix . '.destroy', $item->id],
                                    'method' => 'DELETE',
                                    'onsubmit' => 'return confirm("Apakah yakin akan menghapus data ini.?")',
                                    ]) !!}

                                    <a href="{{ route($routePrefix . '.create', ['parent_id' => $item->id]) }}"
                                        class="btn btn-info btn-sm mb-1" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-title="Items"><i class="fas fa-sitemap"></i>
                                    </a>

                                    <a href="{{ route($routePrefix . '.edit', $item->id) }}"
                                        class="btn btn-success btn-sm mb-1 mx-2" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-title="Edit"><i
                                            class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <button type="submit" class="btn btn-danger btn-sm mb-1" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-title="Hapus"><i
                                            class="fa-solid fa-trash"></i></button>

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- pagination --}}
                    {!! $models->links() !!}

                </div>

            </div>
        </div>
    </div>

</div>
@endsection
