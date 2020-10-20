<script>
    $('#search').click( function(event){
        event.preventDefault();

        let currency = $("input[name=currency]").val();
        let country  = $("input[name=country]").val();
        let collateral = $("input[name=collateral]").val();

        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url : "getloans",
            type: "POST",
            data: {
                "currency": currency,
                "country" : country,
                "collateral": collateral,
                "_token" : _token
            },
            success: function(response){
                console.log(response.loans);
                let loans = response.loans;
                $("tbody").html("");
                $(".separator").html("Search Result");
                for (let count=0 ; count < loans.length ; count++){
                    let loan = loans[count];
                    // console.log(loan);
                    let name = loan["name"];
                    let slug_name = name.replace(" ", "_");
                    let logo = loan["logo"];
                    let btc_only = loan["btc_only"];
                    let fiat_loan = loan["fiat_loan"];
                    let crypto_loan = loan["crypto_loan"];
                    let term = loan["term"];
                    let interest = loan["interest"];
                    let ease = loan["ease"];
                    let privacy = loan["privacy"];
                    let speed = loan["speed"];
                    let fee = loan["fee"];
                    let reputation = loan["reputation"];
                    let limit = loan["limit"];

                    let image = '{{asset("images/") . "/" . ":logo"}}';
                    image = image.replace(':logo', logo);
                    let path = '{{route("cryptoloan.show", ":slug")}}';
                    path = path.replace(':slug', slug_name);
                    $('tbody').append('<tr class="table-row"><td class="td-name"><a href="'+path+'" class="text-dark text-nowrap"> <img src="'+image+'" class="rounded-circle" width="15%" alt="Exchange Logo"> '+name+' </a></td> <td>'+btc_only+'</td> <td>'+fiat_loan+'</td> <td>'+crypto_loan+'</td> <td>'+term+'</td> <td>'+interest+'</td> <td>'+ease+'</td> <td>'+privacy+'</td> <td>'+speed+'</td> <td>'+fee+'</td> <td>'+reputation+'</td> <td>'+limit+'</td>');
                }

            },
        });
    });
</script>