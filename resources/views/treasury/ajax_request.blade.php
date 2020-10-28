<script>
    $('#search').click( function(event){
        event.preventDefault();

        let country  = $("input[name=country]").val();
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url : "gettreasuries",
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
                    console.log(treasury);
                    let name = treasury["name"];
                    let filings = treasury["filings"];
                    let symbol = treasury["symbol"];
                    let btc_holding = treasury["btc_holding"];

                    $('tbody').append('<tr class="table-row"><td class="td-name">'+name+'</td> <td>'+filings+'</td> <td>'+symbol+'</td> <td>'+btc_holding+'</td>');
                }

            },
        });
    });
</script>