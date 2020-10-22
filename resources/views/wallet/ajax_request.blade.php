<script>
    $('#search').click( function(event){
        event.preventDefault();

        let currency = $("input[name=currency]").val();
        let wallet_type  = $("input[name=wallet_type]").val();

        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url : "getwallets",
            type: "POST",
            data: {
                "currency": currency,
                "wallet_type" : wallet_type,
                "_token" : _token
            },
            success: function(response){
                // console.log(response.wallets);
                let wallets = response.wallets;
                $("tbody").html("");
                $(".separator").html("Search Result");
                for (let count=0 ; count < wallets.length ; count++){
                    let wallet = wallets[count];
                    // console.log(wallet);
                    let name = wallet["name"];
                    let slug_name = name.replace(" ", "_");
                    let logo = wallet["logo"];
                    let btc_only = wallet["btc_only"];
                    let lightning = wallet["lightning"];
                    let liquid = wallet["liquid"];
                    let security = wallet["security"];
                    let multi_sig = wallet["multi_sig"];
                    let buy_crypto = wallet["buy_crypto"];
                    let ease = wallet["ease"];
                    let privacy = wallet["privacy"];
                    let speed = wallet["speed"];
                    let fee = wallet["fee"];
                    let reputation = wallet["reputation"];
                    let limit = wallet["limit"];

                    let image = '{{asset("images/") . "/" . ":logo"}}';
                    image = image.replace(':logo', logo);
                    let path = '{{route("cryptowallet.show", ":slug")}}';
                    path = path.replace(':slug', slug_name);
                    $('tbody').append('<tr class="table-row"><td class="td-name"><a href="'+path+'" class="text-dark text-nowrap"> <img src="'+image+'" class="rounded-circle" width="15%" alt="Exchange Logo"> '+name+' </a></td> <td>'+btc_only+'</td> <td>'+lightning+'</td> <td>'+liquid+'</td> <td>'+security+'</td> <td>'+multi_sig+'</td> <td>'+buy_crypto+'</td> <td>'+ease+'</td> <td>'+privacy+'</td> <td>'+speed+'</td> <td>'+fee+'</td> <td>'+reputation+'</td> <td>'+limit+'</td>');

                }

            },
        });
    });
</script>