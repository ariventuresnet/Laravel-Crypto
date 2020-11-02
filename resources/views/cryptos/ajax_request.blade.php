<script>
    $('#search').click( function(event){
        event.preventDefault();

        let name = $("input[name=name]").val();
        let type  = $("input[name=type]").val();

        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url : "{{url('getcryptos')}}",
            type: "POST",
            data: {
                "name"   : name,
                "type"   : type,
                "_token" : _token
            },
            success: function(response){
                // console.log(response.cryptoLists);
                let cryptoLists = response.cryptoLists;
                $("tbody").html("");
                $(".separator").html("Search Result");
                for (let count=0 ; count < cryptoLists.length ; count++){
                    let crypto = cryptoLists[count];
                    // console.log(crypto);
                    let market_cap = crypto["market_cap"];
                    let algorithm = crypto["algorithm"];
                    let dominance = crypto["dominance"];

                    $('tbody').append('<tr><td class="font-weight-bold">'+name+'</td> <td>'+type+'</td> <td>'+market_cap+'</td> <td>'+algorithm+'</td> <td>'+dominance+'</td>');

                }

            },
        });
    });
</script>