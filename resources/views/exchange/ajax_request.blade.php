<script>
    $('#search').click( function(event){
        event.preventDefault();

        let currency = $("input[name=currency]").val();
        let country  = $("input[name=country]").val();
        let payment_method = $("input[name=payment_method]").val();

        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url : "getexchanges",
            type: "POST",
            data: {
                "currency": currency,
                "country" : country,
                "payment_method": payment_method,
                "_token" : _token
            },
            success: function(response){
                // console.log(response.exchanges);
                let exchanges = response.exchanges;
                $("tbody").html("");
                $(".separator").html("Search Result");
                for (let count=0 ; count < exchanges.length ; count++){
                    let exchange = exchanges[count];
                    // console.log(exchange);
                    let name = exchange["name"];
                    let slug_name = name.replace(" ", "_");
                    let logo = exchange["logo"];
                    let bitcoin_only = exchange["bitcoin_only"];
                    let recurring_buys = exchange["recurring_buys"];
                    let lightning = exchange["lightning"];
                    let liquid = exchange["liquid"];
                    let kyc = exchange["kyc"];
                    let ease = exchange["ease"];
                    let privacy = exchange["privacy"];
                    let speed = exchange["speed"];
                    let fee = exchange["fee"];
                    let reputation = exchange["reputation"];
                    let limit = exchange["limit"];

                    let image = '{{asset("images/") . "/" . ":logo"}}';
                    image = image.replace(':logo', logo);
                    let path = '{{route("cryptoexchange.show", ":slug")}}';
                    path = path.replace(':slug', slug_name);
                    $('tbody').append('<tr class="table-row"><td class="td-name"><a href="'+path+'" class="text-dark text-nowrap"> <img src="'+image+'" class="rounded-circle" width="15%" alt="Exchange Logo"> '+name+' </a></td> <td>'+bitcoin_only+'</td> <td>'+recurring_buys+'</td> <td>'+lightning+'</td> <td>'+liquid+'</td> <td>'+kyc+'</td> <td>'+ease+'</td> <td>'+privacy+'</td> <td>'+speed+'</td> <td>'+fee+'</td> <td>'+reputation+'</td> <td>'+limit+'</td>');

                }

            },
        });
    });
</script>