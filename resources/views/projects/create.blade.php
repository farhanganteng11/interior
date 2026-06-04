<form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf 
    
    <div>
        <label>Nama Proyek</label>
        <input type="text" name="title" required>
    </div>

    <div>
        <label>Foto Proyek</label>
        <input type="file" name="thumbnail" accept="image/*" required>
    </div>

    <button type="submit">Simpan Proyek</button>
</form>