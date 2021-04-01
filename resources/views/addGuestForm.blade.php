@extends('layouts.master')
@section('title', 'Halaman Tambah Tamu')
@section('container')
<div class="container">
    <h3 class="text-center mt-3">GUEST FORM</h3>
    <hr>

    <form action="/store" method="post">
        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
        <div class="form-group row">
            <input type="hidden" name="action">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" id="inputName" placeholder="Your Name" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Your Email" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <textarea name="address" id="inputAddress2" class="form-control" placeholder="Your Address" required></textarea>
            </div>
        </div>
        <div class="form-group-row">
            <div class="col-sm-12">
                <input type="submit" value="SAVE" class="btn btn-primary btn-block" name="submit">
            </div>
        </div>
    </form>
    <br>
    <table class="table">
        <thead class="thead-dark">
            <th>NO</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>ADDRESS</th>
            <th>ACTION</th>
        </thead>
        <tbody>
            @foreach($guests as $key=>$guest)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$guest->guestName}}</td>
                <td>{{$guest->guestEmail}}</td>
                <td>{{$guest->guestAddress}}</td>

                <td>
                    <!-- Delete dengan method GET -->
                    <div class="btn-group">
                        <a href="/delete/{{$guest->guestId}}" class="fa fa-trash btn btn-danger btn-delete" onclick="return confirm('Are you sure?')"></a>

                        <!-- Delete dengan Jquery -->
                        <!-- <td><a href="/delete/{{$guest->guestId}}" class="fa fa-trash btn btn-danger btn-delete" data-id="{{$guest->guestId}}" onclick="return confirm('Are you sure?')"></a></td> -->

                        <!-- TOMBOL BUTTON MODAL -->
                        <!-- Edit dengan method GET -->
                        <button class="btn btn-primary btn-sm fa fa-edit" data-toggle="modal" data-target="#editGuest" data-id="{{$guest->guestId}}" data-name="{{$guest->guestName}}" data-email="{{$guest->guestEmail}}" data-address="{{$guest->guestAddress}}"></button>

                        <!-- Edit dengan Jquery -->
                        <!-- <td><a href="/insert/" class="fa fa-edit btn btn-success btn-edit" data-toggle="modal" data-target="#exampleModal" data-id="{{$guest->guestId}}"></a></td> -->
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="editGuest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Guest</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Untuk ke Proses Update -->
            <div class="modal-body">
                <form action="/update" method="POST">
                    @csrf
                    <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <input type="hidden" name="id" class="id" value="">
                        <label for="inputName" class="col-sm-2 cl-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control name" id="inputName" placeholder="Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control email" id="inputEmail" placeholder="Masukkan e-mail anda" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea name="address" id="inputAddress" class="address" placeholder="Masukkan alamat rumah anda" cols="50" rows="5" required></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
@endsection()

@section('ownJavascript')
<script>
    $(document).ready(function() {
        $('#editGuest').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);

            var id = button.data('id');
            var name = button.data('name');
            var email = button.data('email');
            var address = button.data('address');

            var modal = $(this);

            modal.find('.modal-body .id').val(id);
            modal.find('.modal-body .name').val(name);
            modal.find('.modal-body .email').val(email);
            modal.find('.modal-body .address').val(address);
        })
    });
</script>
@endsection()