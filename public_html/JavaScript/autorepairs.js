$(document).ready(function() {
    $('#defaltDataTable').DataTable();

    $('.table-edit button').on('click', function(){
        var rowID = $(this).attr('data-rowid');
        var getURL = $(this).attr('data-geturl');
        $.get(getURL, { id: rowID }, function(data){
            //console.log(data);
            $('#EditModalLabel #mechanic-name').val(data.name);
            $('#EditModalLabel #mechanic-phone').val(data.phone);
            $('#EditModalLabel #mechanic-description').val(data.description);
            $('#EditModalLabel #mechanic-id').val(data.id);
        }, 'json');
    });
    $('#EditModalLabel #sendButton').on('click', function(){

        var rowName=$('#EditModalLabel #mechanic-name').val();
        var rowPhone=$('#EditModalLabel #mechanic-phone').val();
        var rowDescription=$('#EditModalLabel #mechanic-description').val();
        var ID=$('#EditModalLabel #mechanic-id').val();
        var url='/mechanics/edit';
        $.post(url,{id:ID, name:rowName, phone:rowPhone, description:rowDescription}, function(data){
            if (data.status == 'success'){
                location.reload();
            } else {

            }
        }, 'json');

    });
    $(' #submitAddMechanics').on('click', function(){


        var rowName=$('#AddModalLabel #mechanic-name').val();
        var rowPhone=$('#AddModalLabel #mechanic-phone').val();
        var rowDescription=$('#AddModalLabel #mechanic-description').val();
        var ID=$('#AddModalLabel #mechanic-id').val();
        var url='/mechanics/add';
        $.post(url,{id:ID, name:rowName, phone:rowPhone, description:rowDescription}, function(data){
            if (data.status == 'success'){
                location.reload();
            } else {

            }
        }, 'json');

    });

    $(' .table-remove button').on('click', function(){
        var id=$(this).attr('data-rowid');
        var yesbutton=$('#removeRow');
        $('#removeRow').attr("data-rowid", id);
        console.log(id);
        $('#removeRow').on('click', function(){
            var url='/mechanics/remove'
            $.get(url,{id:id}, function(data){
                if (data.status=='success') {
                    location.reload();

                }else {

                }
            },'json');
        });


    });

    /*
    $( "#RemoveModal" ).on('shown.bs.modal', function(){
        alert("I want this to appear after the modal has opened!");
    });
    */
    $(' #submitAddCars').on('click', function(){


        var carName=$('#AddCarsModal #car-name').val();
        var carMark=$('#AddCarsModal #car-mark').val();
        var carModel=$('#AddCarsModal #car-model').val();
        var regNumber=$('#AddCarsModal #reg-number').val();
        var carYear=$('#AddCarsModal #car-year').val();
        var carImg=$('#AddCarsModal #car-img').val();
        //var ID=$('#AddCarsModal #car-id').val();
        var url='/cars/add';
        $.post(url,{ name:carName, mark:carMark, model:carModel, number:regNumber, year:carYear, img:carImg}, function(data){
            if (data.status == 'success'){
                location.reload();
            } else {

            }
        }, 'json');
    });
    /*$('#addProbegButton').on('click', function(){
        var rowId = $(this).attr('data-rowid');
        var getURL = $(this).attr('data-geturl');
        $.get(getURL, { id: rowId }, function(data){
            console.log(data);
            $(' #newDate').val(data.newDate);
            $(' #actualProbeg').val(data.actualProbeg);
            $(' #carId').val(data.carId);
        }, 'json');
        console.log('Hi');
        console.log(rowId);
    });*/

    $('#submitAddProbeg').on('click', function(){
        console.log("Is it working?");
        var newData=$('#newDate').val();
        var actualProbeg=$('#actualProbeg').val();
        var url=$(this).attr('data-geturl');
        console.log("URL is: " + url);
        $.post(url,{ date:newData, probeg:actualProbeg }, function(data){
            if (data.status=='success'){
                location.reload();
            } else{

            }
        }, 'json');
    });

    $('.buttonEditProbeg').on('click', function(){
        var id=$(this).attr('data-rowid');
        console.log(id);
        var getURL=$(this).attr('data-geturl');
        console.log(getURL);
        $.get(getURL, {id:id}, function(data){
            console.log("Why isn't working?");
            var ani=$('#editProbeg').val(data.probeg);
            console.log(ani);
            $('#editDate').val(data.date);
            $('#ProbegID').val(data.id);
        }, 'json');
    })

    $('#submitAddCost').on('click', function(){
        var costName=$('#cost-name').val();
        var url='/administrativeCost/add';
        $.post(url,{ name:costName}, function(data){
            if (data.status == 'success'){
                location.reload();
            } else {

            }
        }, 'json');
    });

    $('.editCost').on('click', function(){
        console.log('heloo');
        var costID = $(this).attr('data-rowid');
        var getURL = $(this).attr('data-geturl');
        //console.log({rowID:'data-rowid', getURL:'data-geturl'});
        console.log(getURL);
        $.get(getURL, { id: costID }, function(data){
            console.log('Data Info');
            console.log(data);
            $('#editCostName').val(data.costName);
            $('#costId').val(data.id);
        }, 'json');
    });

    $('#sendButton').on('click', function(){

        var costName=$('#editCostName').val();
        var ID=$('#costId').val();
        var url='/administrativeCost/edit';
        $.post(url,{id:ID, costName:costName}, function(data){
            if (data.status == 'success'){
                location.reload();
            } else {

            }
        }, 'json');

    });

    $(' .removeCost').on('click', function(){
        var id=$(this).attr('data-rowid');
        var yesbutton=$('#removeCostRow');
        $('#removeCostRow').attr("data-rowid", id);
        $('#removeCostRow').on('click', function(){
            var url='/administrativeCost/remove';
            $.get(url,{id:id}, function(data){
                if (data.status=='success') {
                    location.reload();

                }else {

                }
            },'json');
        });
        });

        $('#successAddButon').on('click', function(){
            var costID=$('#costID').val();
            var nextPayment=$('#nextPayment').val();
            console.log(nextPayment);
            var price=$('#price').val();
            var url=$(this).attr('data-geturl');
            $.post(url,{costID:costID, nextPayment:nextPayment, price:price }, function(data){
                if (data.status=='success'){
                    location.reload();
                } else{

                }
            }, 'json');
        });
        $(' .removeCostOfCar').on('click', function(){
            var id=$(this).attr('data-rowid');
            var yesbutton=$('#removeCostOfCars');
            $('#removeCostOfCars').attr("data-rowid", id);
            console.log(id);
            $('#removeCostOfCars').on('click', function(){
                var url=$(this).attr('data-geturl');
                console.log('Give me url');
                console.log(url);
                $.get(url,{id:id}, function(data){
                    if (data.status=='success') {
                        location.reload();

                    }else {

                    }
                },'json');
            });


        });

        $('.editCostOfCar'). on ('click', function(){
            var id=$(this).attr('data-rowid');
            var getURL=$(this).attr('data-geturl');
            console.log(id)
            console.log(getURL);
            $.get(getURL,{id: id}, function(data){
                console.log('Data Info');
            console.log(data);
            $('#EditNextPayment'). val(data.nextPayment);
            $('#editPrice').val(data.price);
            $('#costOfCarId').val(data.id);
        }, 'json');

        })

        $('#sendEditCostButton').on ('click', function(){
            var nextPayment=$('#EditNextPayment').val();
            console.log('Check');
            console.log(nextPayment);
            var price=$('#editPrice').val();
            var id=$('#costOfCarId').val();
            console.log(id);
            var url=$(this).attr('data-geturl');
            console.log(url);
            $.post(url, {id:id, nextPayment:nextPayment, price: price}, function(data){
                if (data.status=='success'){
                    location.reload();
                }else{

                }
            }, 'json');

        });

        $('.payCostOfCar').on('click', function(){
            console.log("Hello Anni");
            $(this).css('color', 'red');
            //var dateOfPayment=moment().format('MMMM Do YYYY, h:mm:ss a'); // November 7th 2018, 7:23:32 am
            var id=$(this).attr('data-rowid');
            console.log(id);
            var url=$(this).attr('data-geturl');
            console.log(url);
            $.post(url, {id:id}, function(data){
                if (data.status=='success'){
                    location.reload();
                }else{

                }
            }, 'json');

        })

        $('#addTipeParts').on('click', function(){
            console.log('It is working');
            var namePart=$('#namePart').val();
            var parentID=$('#parentID').val();
            var url='parts/add';
            console.log(url);
            $.post(url, {namePart:namePart, parentID: parentID}, function(data){
                if (data.status=='success') {
                    location.reload();
                }else {

                }
            }, 'json');

        })
        $('.editParts').on('click', function(){
            var id=$(this).attr('data-rowid');
            var getURL=$(this).attr('data-geturl');
            $.get(getURL,{id: id}, function(data){
            $('#editNamePart'). val(data.namePart);
            $('#editParentID').val(data.parentID);
            $('#tipePartID').val(data.id);

            }, 'json');
        })

        $('#sendEditTypePart').on('click', function(){
            console.log('Heloo');
            var namePart=$('#editNamePart').val();
            console.log("Name part: "+ namePart);
            var parent=$('#editParentID').val();
            console.log("Parent: " + parent);
            var id=$('#tipePartID').val();
            console.log("ID: " + id);
            var url='/parts/edit';
            console.log("URL: " + url);
            $.post(url,{id:id, namePart:namePart, parentID:parent}, function(data){
                if (data.status=='success'){
                    location.reload();
                }else {

                }
            }, 'json');
        });

        $('.removeParts').on('click', function(){
            console.log('Работи ли изобщо???');
            var id=$(this).attr('data-rowid');
            console.log('Remove function ID: '+id);
            var sendbutton=$('#sendRemoveTipePart');
            $('#sendRemoveTipePart').attr('data-rowid', id);
            $('#sendRemoveTipePart').on('click', function(){
                var url='/parts/remove';
                console.log("Remove url" +url);
                $.get(url,{id:id}, function(data){
                    if(data.status=='success'){
                        location.reload();
                    }else {

                    }
                }, 'json');
            });
        });

        $('#addPart').on('click', function(){
            console.log('Здравей, ти влезе във функцията!');
            var nameOfPart=$('#nameOfPart').val();
            var categoriesID=$('#categoriesID').val();
            var url='/parts/addPart';
            console.log(categoriesID);
            $.post(url, {nameOfPart:nameOfPart, categoriesID:categoriesID}, function(data){
                if (data.status=='success'){
                    location.reload();
                }else{

                }
            }, 'json');
        })

        $('.buttonEditPart').on('click', function(){
            var id=$(this).attr('data-rowid');
            var getURL=$(this).attr('data-geturl');
            $.get(getURL, {id:id}, function(data){
                $('#editNameOfPart').val(data.nameOfPart);
                $('#editCategoryId').val(data.categoriesID);
                $('#partID').val(data.id);
            },'json');
        })

        $('#submitEditPart').on('click', function(){
            console.log('The button is working:)');
            var nameOfPart=$('#editNameOfPart').val();
            console.log(nameOfPart);
            var categoryId=$('#editCategoryId').val();
            console.log(categoryId);
            var id=$('#partID').val();
            console.log("Id е : " + id);
            var url="/parts/editPart";
            $.post(url, {id:id, nameOfPart:nameOfPart, categoryId:categoryId}, function(data){
                if (data.status=='success') {
                    location.reload();
                }else {
                    //return 404
                }
            }, 'json');
        })

        $('.buttonRemovePart').on('click', function(){
            var id=$(this).attr('data-rowid');
            var sendbutton=$('#submitRemovePart');
            $('#submitRemovePart').attr('data-rowId', id);
            $('#submitRemovePart').on('click', function(){
                var url='/parts/removePart';
                console.log('What is url?'+ url);
                $.get(url, {id:id}, function(data){
                    if(data.status=='success'){
                        location.reload();
                    }else {

                    }
                }, 'json');
            })
        })


} );
