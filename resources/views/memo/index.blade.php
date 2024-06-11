<!-- resources/views/memo/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memo Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header class="py-5 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1>Daftar Catatan</h1>
                    <a href="/memo/create" class="btn btn-success">Tambah Data</a>
                </div>
                <div>
                    <a href="/logout" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </header>

        <!-- Table Section -->
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Mata Kuliah</th>
                        <th>Deskripsi</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data Rows -->
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->mata_kuliah}}</td>
                            <td>{{$item->deskripsi}}</td>
                            <td>{{$item->semester}}</td>
                            <td>
                                <a href="/memo/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>

                                <!-- Formulir Hapus -->
                                <form action="{{ route('memo.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus catatan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>