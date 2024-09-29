let id = null;
$('.delete_link').click(function() {
    id = this.getAttribute('data-id');
})

$('#deleteModal').on('shown.bs.modal', function () {
    $('.delete_confirm').attr("action", "delete/"+id);
})

$('.completed_checkbox').click(function() {
    id = this.getAttribute('data-id');
    let checked = this.checked;
    request = $.ajax({
            url: "/api/edit/"+id,
            method: "POST",
            data:
                {
                    "completed":checked,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
            datatype: "json"
        });

        request.done(function(msg) {
            $('.my-alert').removeClass('hidden');
            $('.close_span').click(function(){
                $('.my-alert').addClass('hidden');
            })
        });
        request.fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
})
