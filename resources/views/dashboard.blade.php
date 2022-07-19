<x-app-layout>
    <div class="container m-auto px-6 md:px-12 xl:px-6 text-gray-900 text-base">
        {{-- style="height: calc (100vh - 80px)" --}}
        <div class="grid gap-2 my-2 md:grid-rows-2 lg:grid-cols-3">        
            @foreach ($projects as $project)
                <x-project :project="$project"/>
            @endforeach
        </div>
    </div>
</x-app-layout>

{{-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
    console.log("ajax ready");
    $("#add-stuff-btn").click(function (e) {
        console.log('click');
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
        });

        $.ajax({
            url: "{{ url('/dashboard') }}",
            type: "POST",
            data: {
                content: $("input[name='content']").val(),
            },
            success: function (response) {
                console.log(response);
                location.reload();
            },
        });
    });
});

</script> --}}
