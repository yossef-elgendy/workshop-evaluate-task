
$(document).ready(function(){
    $(".select2").select2({
            placeholder: "select skills",
            tokenSeparators: [',',';'," "],
            theme: "classic"
    });
    $('.select2 option:selected').prop('disabled', true);

    $("#File").change(function(){
        let filename = $(this).val().split('\\').pop();
        $('#FilePath').html(filename);
    })

})


