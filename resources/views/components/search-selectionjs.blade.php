<script>
    function fetchData(object, dataRequest, target){
        $.ajax({
            url: "{{ route('data.index') }}",
            type: "POST",
            data: {
                '_token' : "{{ csrf_token() }}",
                'dataRequest' : dataRequest,
                'target' : target
            },
            success: function (response) {
                $(object).siblings('.selectOptions').find('.selectGroups').html('');
                if(response.length){
                    response.forEach(item => {
                        $(object).siblings('.selectOptions').find('.selectGroups').append(`<div class="btn btn-light py-0 mb-1 text-start text-truncate" data-code="${item.code}">${item.name}</div>`);
                    });
                } else{
                    $(object).siblings('.selectOptions').find('.selectGroups').append(`<div class="text-secondary text-start text-truncate">There's nothing here...</div>`);
                }
                $(".selectOptions .btn").each(function () {
                    $(this).click(function(){
                        $(this).closest('.selectContainer').find('.selectedValue').val($(this).data('code'));
                        $(this).closest('.selectContainer').find('.selectedName').val($(this).text());
                        $(this).closest('.selectOptions').addClass('d-none');
                    });
                });
            }
        });
    }
    $(document).ready(function () {
        $(".selectOptions .btn").each(function () {
            $(this).click(function(){
                $(this).closest('.selectContainer').find('.selectedValue').val($(this).data('code'));
                $(this).closest('.selectContainer').find('.selectedName').val($(this).text());
                $(this).closest('.selectOptions').addClass('d-none');
            });
        });

        var doRequest;
        $(".selectedName").focus(function(){
            $(this).siblings('.selectedValue').val('');
            $(this).val('');
            $(this).siblings('.selectOptions').removeClass('d-none');
        }).blur(function(){
            setTimeout(() => {
                $(this).siblings('.selectOptions').addClass('d-none');
                if($(this).siblings('.selectedValue').val() == ''){
                    $(this).siblings('.selectedValue').val($(this).siblings('.selectOptions').find('.selectGroups > .btn:first-child').data('code'));
                    $(this).val($(this).siblings('.selectOptions').find('.selectGroups > .btn:first-child').text());
                }
            }, 100);
        }).on('input', function(){
            $(this).siblings('.selectedValue').val('');
            clearTimeout(doRequest);
            
            doRequest = setTimeout(() => {
                fetchData(this, $(this).attr('data-request'), $(this).val());
            }, 500);
        })
    });
</script>