$(document).ready(function() {
    $("#access").hide();
    $("#Type").change(function() {
        var Type = $("#Type").val();
        if (Type == "Admin") {
            $("#access").hide();
        } else {
            $("#access").show();
        }
    })
    $("#new_pwd").click(function() {
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            type: 'get',
            url: '/admin/check-pwd',
            data: { current_pwd: current_pwd },
            success: function(resp) {
                //alert(resp);
                if (resp == "false") {
                    $("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
                } else if (resp == "true") {
                    $("#chkPwd").html("<font color='green'>Current Password is Correct</font>");
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });





    // Edit Category validation
    // $("#edit_category").validate({
    // 	rules:{
    // 		category_name_edit:{
    // 			required:true
    // 		},
    // 		description_edit:{
    // 			required:true,
    // 		},
    // 		url_edit:{
    // 			required:true,
    // 		}
    // 	},
    // 	errorClass: "help-inline",
    // 	errorElement: "span",
    // 	highlight:function(element, errorClass, validClass) {
    // 		$(element).parents('.control-group').addClass('error');
    // 	},
    // 	unhighlight: function(element, errorClass, validClass) {
    // 		$(element).parents('.control-group').removeClass('error');
    // 		$(element).parents('.control-group').addClass('success');
    // 	}
    // });





    $("#delCat").click(function() {
        if (confirm('Are you sure you want to delete this category?')) {
            return true;
        }
        return false;

    });

    // $("#delTour").click(function(){
    // 	if(confirm('Are you sure you want to delete this tourPackage?')){
    // 		return true;
    // 	}
    //     return false;

    // });

    $(".deleteRecord").click(function() {
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            },
            function() {
                window.location.href = "/admin/" + deleteFunction + "/" + id;
            });

    });

    //OFFERINGS percentage
    //connexion offering percentage
    var $offering_total = $("input[name='offering_total']"),
        $discount = $("input[name='discount']").on("input", calculateCost),

        $offering_connexion = $("input[name='offering_connexion']");


    function calculateCost() {
        var discount = $(this).val();
        var offering_total = $offering_total.val();
        var calcost = ((discount / 100) * offering_total).toFixed(2);
        $offering_connexion.val(calcost);

    }
    //diocese offering percentage
    var $offering_total = $("input[name='offering_total']"),
        $diocesediscount = $("input[name='diocesediscount']").on("input", calculateDiocese),

        $offering_diocese = $("input[name='offering_diocese']");

    function calculateDiocese() {
        var diocesediscount = $(this).val();
        var offering_total = $offering_total.val();
        var caldio = ((diocesediscount / 100) * offering_total).toFixed(2);
        $offering_diocese.val(caldio);
    }

    //society offering percentage
    var $offering_total = $("input[name='offering_total']"),
        $societydiscount = $("input[name='societydiscount']").on("input", calculateSociety),

        $offering_society = $("input[name='offering_society']");

    function calculateSociety() {
        var societydiscount = $(this).val();
        var offering_total = $offering_total.val();
        var calso = ((societydiscount / 100) * offering_total).toFixed(2);
        $offering_society.val(calso);
    }

    //circuit offering percentage
    var $offering_total = $("input[name='offering_total']"),
        $circuitdiscount = $("input[name='circuitdiscount']").on("input", calculateCircuit),

        $offering_circuit = $("input[name='offering_circuit']");

    function calculateCircuit() {
        var circuitdiscount = $(this).val();
        var offering_total = $offering_total.val();
        var calcir = ((circuitdiscount / 100) * offering_total).toFixed(2);
        $offering_circuit.val(calcir);
    }

    //TITHES percentage
    //connexion tithe percentage
    var $tithe_total = $("input[name='tithe_total']"),
        $discount = $("input[name='discount']").on("input", calculatetitheCost),

        $tithe_connexion = $("input[name='tithe_connexion']");


    function calculatetitheCost() {
        var discount = $(this).val();
        var tithe_total = $tithe_total.val();
        var caltithecost = ((discount / 100) * tithe_total).toFixed(2);
        $tithe_connexion.val(caltithecost);

    }
    //diocese tithe percentage
    var $tithe_total = $("input[name='tithe_total']"),
        $diocesediscount = $("input[name='diocesediscount']").on("input", calculatetitheDiocese),

        $tithe_diocese = $("input[name='tithe_diocese']");

    function calculatetitheDiocese() {
        var diocesediscount = $(this).val();
        var tithe_total = $tithe_total.val();
        var caltithedio = ((diocesediscount / 100) * tithe_total).toFixed(2);
        $tithe_diocese.val(caltithedio);
    }

    //society tithe percentage
    var $tithe_total = $("input[name='tithe_total']"),
        $societydiscount = $("input[name='societydiscount']").on("input", calculatetitheSociety),

        $tithe_society = $("input[name='tithe_society']");

    function calculatetitheSociety() {
        var societydiscount = $(this).val();
        var tithe_total = $tithe_total.val();
        var caltitheso = ((societydiscount / 100) * tithe_total).toFixed(2);
        $tithe_society.val(caltitheso);
    }

    //circuit tithe percentage
    var $tithe_total = $("input[name='tithe_total']"),
        $circuitdiscount = $("input[name='circuitdiscount']").on("input", calculatetitheCircuit),

        $tithe_circuit = $("input[name='tithe_circuit']");

    function calculatetitheCircuit() {
        var circuitdiscount = $(this).val();
        var tithe_total = $tithe_total.val();
        var caltithecir = ((circuitdiscount / 100) * tithe_total).toFixed(2);
        $tithe_circuit.val(caltithecir);
    }



    //MONTHLY HARVEST percentage
    //connexion monthlyharvest percentage
    var $monthlyharvest_total = $("input[name='monthlyharvest_total']"),
        $discount = $("input[name='discount']").on("input", calculatemonthlyharvestCost),

        $monthlyharvest_connexion = $("input[name='monthlyharvest_connexion']");


    function calculatemonthlyharvestCost() {
        var discount = $(this).val();
        var monthlyharvest_total = $monthlyharvest_total.val();
        var calmonthlyharvestcost = ((discount / 100) * monthlyharvest_total).toFixed(2);
        $monthlyharvest_connexion.val(calmonthlyharvestcost);

    }
    //diocese monthlyharvest percentage
    var $monthlyharvest_total = $("input[name='monthlyharvest_total']"),
        $diocesediscount = $("input[name='diocesediscount']").on("input", calculatemonthlyharvestDiocese),

        $monthlyharvest_diocese = $("input[name='monthlyharvest_diocese']");

    function calculatemonthlyharvestDiocese() {
        var diocesediscount = $(this).val();
        var monthlyharvest_total = $monthlyharvest_total.val();
        var calmonthlyharvestdio = ((diocesediscount / 100) * monthlyharvest_total).toFixed(2);
        $monthlyharvest_diocese.val(calmonthlyharvestdio);
    }

    //society monthlyharvest percentage
    var $monthlyharvest_total = $("input[name='monthlyharvest_total']"),
        $societydiscount = $("input[name='societydiscount']").on("input", calculatemonthlyharvestSociety),

        $monthlyharvest_society = $("input[name='monthlyharvest_society']");

    function calculatemonthlyharvestSociety() {
        var societydiscount = $(this).val();
        var monthlyharvest_total = $monthlyharvest_total.val();
        var calmonthlyharvestso = ((societydiscount / 100) * monthlyharvest_total).toFixed(2);
        $monthlyharvest_society.val(calmonthlyharvestso);
    }

    //circuit monthlyharvest percentage
    var $monthlyharvest_total = $("input[name='monthlyharvest_total']"),
        $circuitdiscount = $("input[name='circuitdiscount']").on("input", calculatemonthlyharvestCircuit),

        $monthlyharvest_circuit = $("input[name='monthlyharvest_circuit']");

    function calculatemonthlyharvestCircuit() {
        var circuitdiscount = $(this).val();
        var monthlyharvest_total = $monthlyharvest_total.val();
        var calmonthlyharvestcir = ((circuitdiscount / 100) * monthlyharvest_total).toFixed(2);
        $monthlyharvest_circuit.val(calmonthlyharvestcir);
    }




    //THANKSGIVING percentage
    //connexion thanksgiving percentage
    var $thanksgiving_total = $("input[name='thanksgiving_total']"),
        $discount = $("input[name='discount']").on("input", calculatethanksgivingCost),

        $thanksgiving_connexion = $("input[name='thanksgiving_connexion']");


    function calculatethanksgivingCost() {
        var discount = $(this).val();
        var thanksgiving_total = $thanksgiving_total.val();
        var calthanksgivingcost = ((discount / 100) * thanksgiving_total).toFixed(2);
        $thanksgiving_connexion.val(calthanksgivingcost);

    }
    //diocese thanksgiving percentage
    var $thanksgiving_total = $("input[name='thanksgiving_total']"),
        $diocesediscount = $("input[name='diocesediscount']").on("input", calculatethanksgivingDiocese),

        $thanksgiving_diocese = $("input[name='thanksgiving_diocese']");

    function calculatethanksgivingDiocese() {
        var diocesediscount = $(this).val();
        var thanksgiving_total = $thanksgiving_total.val();
        var calthanksgivingdio = ((diocesediscount / 100) * thanksgiving_total).toFixed(2);
        $thanksgiving_diocese.val(calthanksgivingdio);
    }

    //society thanksgiving percentage
    var $thanksgiving_total = $("input[name='thanksgiving_total']"),
        $societydiscount = $("input[name='societydiscount']").on("input", calculatethanksgivingSociety),

        $thanksgiving_society = $("input[name='thanksgiving_society']");

    function calculatethanksgivingSociety() {
        var societydiscount = $(this).val();
        var thanksgiving_total = $thanksgiving_total.val();
        var calthanksgivingso = ((societydiscount / 100) * thanksgiving_total).toFixed(2);
        $thanksgiving_society.val(calthanksgivingso);
    }

    //circuit thanksgiving percentage
    var $thanksgiving_total = $("input[name='thanksgiving_total']"),
        $circuitdiscount = $("input[name='circuitdiscount']").on("input", calculatethanksgivingCircuit),

        $thanksgiving_circuit = $("input[name='thanksgiving_circuit']");

    function calculatethanksgivingCircuit() {
        var circuitdiscount = $(this).val();
        var thanksgiving_total = $thanksgiving_total.val();
        var calthanksgivingcir = ((circuitdiscount / 100) * thanksgiving_total).toFixed(2);
        $thanksgiving_circuit.val(calthanksgivingcir);
    }


    //OTHERS percentage
    //connexion others percentage
    var $others_total = $("input[name='others_total']"),
        $discount = $("input[name='discount']").on("input", calculateothersCost),

        $others_connexion = $("input[name='others_connexion']");


    function calculateothersCost() {
        var discount = $(this).val();
        var others_total = $others_total.val();
        var calotherscost = ((discount / 100) * others_total).toFixed(2);
        $others_connexion.val(calotherscost);

    }
    //diocese others percentage
    var $others_total = $("input[name='others_total']"),
        $diocesediscount = $("input[name='diocesediscount']").on("input", calculateothersDiocese),

        $others_diocese = $("input[name='others_diocese']");

    function calculateothersDiocese() {
        var diocesediscount = $(this).val();
        var others_total = $others_total.val();
        var calothersdio = ((diocesediscount / 100) * others_total).toFixed(2);
        $others_diocese.val(calothersdio);
    }

    //society others percentage
    var $others_total = $("input[name='others_total']"),
        $societydiscount = $("input[name='societydiscount']").on("input", calculateothersSociety),

        $others_society = $("input[name='others_society']");

    function calculateothersSociety() {
        var societydiscount = $(this).val();
        var others_total = $others_total.val();
        var calothersso = ((societydiscount / 100) * others_total).toFixed(2);
        $others_society.val(calothersso);
    }

    //circuit others percentage
    var $others_total = $("input[name='others_total']"),
        $circuitdiscount = $("input[name='circuitdiscount']").on("input", calculateothersCircuit),

        $others_circuit = $("input[name='others_circuit']");

    function calculateothersCircuit() {
        var circuitdiscount = $(this).val();
        var others_total = $others_total.val();
        var calotherscir = ((circuitdiscount / 100) * others_total).toFixed(2);
        $others_circuit.val(calotherscir);
    }


    $('.all').each(function() {
        var sum = 0;
        $('.all').each(function() {
            sum += Number($(this).val());
        });
        $('#firstservice_total').val(sum);
    });

    $('.sec').each(function() {
        var sum = 0;
        $('.sec').each(function() {
            sum += Number($(this).val());
        });
        $('#secondservice_total').val(sum);
    });

    $('.thr').each(function() {
        var sum = 0;
        $('.thr').each(function() {
            sum += Number($(this).val());
        });
        $('#grand_total').val(sum);
    });

    $('.for').keyup(function() {
        var sum = 0;
        $('.for').each(function() {
            sum += Number($(this).val());
        });
        $('#connexion_total').val(sum);
    });

    $('.fiv').keyup(function() {
        var sum = 0;
        $('.fiv').each(function() {
            sum += Number($(this).val());
        });
        $('#diocese_total').val(sum);
    });

    $('.six').keyup(function() {
        var sum = 0;
        $('.six').each(function() {
            sum += Number($(this).val());
        });
        $('#circuit_total').val(sum);
    });

    $('.sev').keyup(function() {
        var sum = 0;
        $('.sev').each(function() {
            sum += Number($(this).val());
        });
        $('#society_total').val(sum);
    });








    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="field_wrapper" style="margin-top:5px;" ><input type="text" name="SKU[]" id="SKU" placeholder="SKU" style="width:120px; margin-left:100px;" /><input type="text" name="TourTypeSize[]" id="TourTypeSize" placeholder="TourTypeSize" style="width:120px; margin-left:3px;" /><input type="text" name="TourTypeName[]" id="TourTypeName" placeholder="TourTypeName" style="width:120px; margin-left:3px;" /><input type="text" name="PackagePrice[]" id="PackagePrice" placeholder="PackagePrice" style="width:120px; margin-left:3px;" /><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });

    //for transport
    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button_trans'); //Add button selector
        var wrapper = $('.field_wrapper_transport'); //Input field wrapper
        var fieldHTML = '<div class="field_wrapper" style="margin-top:5px;" ><input type="text" name="TransportName[]" id="TransportName" placeholder="TransportName" style="width:120px; margin-left:100px;" /><input type="text" name="TransportCost[]" id="TransportCost" placeholder="TransportCost" style="width:120px; margin-left:3px;" /><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });

    //for Tour include
    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button_include'); //Add button selector
        var wrapper = $('.field_wrapper_include'); //Input field wrapper
        var fieldHTML = '<div class="field_wrapper" style="margin-top:5px;" ><input type="text" name="IncludeName[]" id="IncludeName" placeholder="IncludeName" style="width:120px; margin-left:100px;" /><input type="text" name="TourIncludeInfo[]" id="TourIncludeInfo" placeholder="TourIncludeInfo" style="width:120px; margin-left:3px;" /><input type="text" name="TourExcludeName[]" id="TourExcludeName" placeholder="TourExcludeName" style="width:120px; margin-left:3px;" /><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });



});