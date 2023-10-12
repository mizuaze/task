@extends('layouts.main')

@section('container')
@csrf

    <h1>Daftar Tugas</h1>
    <a href='http://coba-laravel.test/tasks/add' class="btn btn-primary mb-2">Tambah+</a>
    <table id="task-list" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tugas</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Ubah</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php $i = 1; ?>
        @foreach($tasks as $task)
        <tbody>
          <td>{{ $i }}</td>
          <td><span class="task-name">{{ $task->name }}</span></td>
          <td><span class="task-description">{{ $task->description }}</span></td>
          <td><span class="{{ $task->id.'-task-status' }}">{{ $task->status ? 'Selesai' : 'Belum Selesai' }}</span></td>
          <td><button id='mark-complete' class="{{ $task->id.'-mark-complete' }}" data-task-id="{{ $task->id }}" data-task-status="{{ $task->status }}">UbahStatus</button></td>
          <td><button class="delete-task" data-task-id="{{ $task->id }}">Hapus</button></td>
        </tbody>
        <?php $i++; ?>
        @endforeach
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Tandai tugas sebagai selesai
        $(document).on('click', '#mark-complete', function() {
            var taskId = $(this).data('task-id');
            var taskStatus = $(this).data('task-status');
            console.log(taskId);
            console.log(taskStatus);
            if(taskStatus==0){
              $.ajax({
                  url: '/tasks/' + taskId + '/complete',
                  type: 'PATCH',
                  data: {
                      "_token": "{{ csrf_token() }}"
                  },
                  success: function() {
                      // Update status tugas di halaman tanpa refresh
                      $('.'+taskId+'-task-status').text('Selesai');
                      $('.'+taskId+'-mark-complete').data('task-status','1');
                  }.bind(this)
              });
            }else{
               $.ajax({
                  url: '/tasks/' + taskId + '/incomplete',
                  type: 'PATCH',
                  data: {
                      "_token": "{{ csrf_token() }}"
                  },
                  success: function() {
                      // Update status tugas di halaman tanpa refresh
                      $('.'+taskId+'-task-status').text('Belum Selesai');
                      $('.'+taskId+'-mark-complete').data('task-status','0');
                  }.bind(this)
              });
            }
        });

        // Hapus tugas
        $(document).on('click', '.delete-task', function() {
            var taskId = $(this).data('task-id');
            $.ajax({
                url: '/tasks/' + taskId,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function() {
                    // Hapus tugas dari halaman tanpa refresh
                    $(this).parent().parent().remove();
                }.bind(this)
            });
        });
    });
</script>
@endsection

