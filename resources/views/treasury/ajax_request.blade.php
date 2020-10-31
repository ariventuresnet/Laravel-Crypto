<script>
    $('#search').click( function(event){
        event.preventDefault();

        let country  = $("input[name=country]").val();
        let _token = $('meta[name="csrf-token"]').attr('content');


        $.ajax({
            url : "{{url('gettreasuries')}}",
            type: "POST",
            data: {
                "country" : country,
                "_token" : _token
            },
            success: function(response){
                // console.log(response.treasuries);
                let treasuries = response.treasuries;
                $("tbody").html("");
                $(".separator").html("Search Result");
                for (let count=0 ; count < treasuries.length ; count++){
                    let treasury = treasuries[count];
                    // console.log(treasury);
                    let name = treasury["name"];
                    let country_name = country;
                    let filings = treasury["filings"];
                    let symbol = treasury["symbol"];
                    let btc_holding = treasury["btc_holding"];

                    $('tbody').append('<tr><td class="font-weight-bold">'+name+'</td> <td>'+country_name+'</td> <td><a href="'+filings+'" target="_blank">Link</a></td> <td>'+symbol+'</td> <td>'+btc_holding+'</td>');
                }

            },
        });
    });
</script>