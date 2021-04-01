// UNTUK DELETE
// $('.btn-delete').on('click', function() {
//     if(!confirm('Are you sure?')) return false;
//     var token = $('#token').val();
//     var id = $(this).data('id');
//     console.log(id);
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': token
//         }
//     });
//     $.ajax({
//         url: '/'+id,
//         type: 'DELETE',
//         dataType: "html",
//         data: {
//             'id' : $(this).data('id'),
//             '_token':token
//         },
//         error: function(error) {
//             alert(error);
//         }
//     })
// })

// UNTUK MODAL INSERT
// $('.btn-edit').on('click', function() {
//     var id = $(this).data('id');
//     var token = $('#token').val();

//     $.ajax({
//         url:'/edit/' + id,
//         type: 'get',
//         dataType: 'json',
//         data: {
//             'id': id,
//         },
//         success: function(result) {

//             let guest = result.Search;
//             console.log(result/guestId);
//             $('.modal-body).html('<form method ="POST" action="/update">
//                 input type:"hidden" name="")
//         }
//     })
// })

// $(document).ready(function(){
//     $('#editGuest').on('shown.bs.modal', function(event){
//         var button = $(event.relatedTarget);

//         var id = button.data('id');
//         var nama = button.data('name');
//         var email = button.data('email');
//         var address = button.data('address');

//         var modal = $(this);

//         modal.find('.modal-body .id').val(id);
//         modal.find('.modal-body .id').val(nama);
//         modal.find('.modal-body .id').val(email);
//         modal.find('.modal-body .id').val(address);
//     })
// });