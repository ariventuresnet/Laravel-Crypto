<script>
    $('#search').click( function(event){
        event.preventDefault();

        let currency = $("input[name=currency]").val();
        let country  = $("input[name=country]").val();
        let card_method = $("input[name=card_method]").val();

        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url : "getcards",
            type: "POST",
            data: {
                "currency": currency,
                "country" : country,
                "card_method": card_method,
                "_token" : _token
            },
            success: function(response){
                // console.log(response.cards);
                let cards = response.cards;
                $("tbody").html("");
                $(".separator").html("Search Result");
                for (let count=0 ; count < cards.length ; count++){
                    let card = cards[count];
                    // console.log(card);
                    let name = card["name"];
                    let slug_name = name.replace(" ", "_");
                    let logo = card["logo"];
                    let ease = card["ease"];
                    let privacy = card["privacy"];
                    let speed = card["speed"];
                    let fee = card["fee"];
                    let reputation = card["reputation"];
                    let limit = card["limit"];
                    let price = card["price"];
                    let delivery_fees = card["delivery_fees"];
                    let coverage = card["coverage"];
                    let monthly_fees = card["monthly_fees"];
                    let atm_fees = card["atm_fees"];
                    let atm_limit = card["monthly_atm_limit"];
                    let online_purchases = card["online_purchases"];
                    let monthly_purchases = card["monthly_purchases"];
                    
                    let image = '{{asset("images/") . "/" . ":logo"}}';
                    image = image.replace(':logo', logo);
                    let path = '{{route("cryptocard.show", ":slug")}}';
                    path = path.replace(':slug', slug_name);
                    $('tbody').append('<tr class="table-row"><td class="td-name"><a href="'+path+'" class="text-dark text-nowrap"> <img src="'+image+'" class="rounded-circle" width="15%" alt="Exchange Logo"> '+name+' </a></td> <td>'+ease+'</td> <td>'+privacy+'</td> <td>'+speed+'</td> <td>'+fee+'</td> <td>'+reputation+'</td> <td>'+limit+'</td> <td>'+price+'</td> <td>'+delivery_fees+'</td> <td>'+coverage+'</td> <td>'+monthly_fees+'</td> <td>'+atm_fees+'</td> <td>'+atm_limit+'</td> <td>'+online_purchases+'</td> <td>'+monthly_purchases+'</td>');

                }

            },
        });
    });
</script>