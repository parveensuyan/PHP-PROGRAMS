    $(document).ready(function() {

        $('.delete-anchor-nn').click(function(e){
        var contact_id =  $(this).data('id')
            e.preventDefault();
        var confirm_status =  confirm("Are you sure?");
        // console.log(confirm_status);

        if(confirm_status == true) {
        $.ajax({
                    type: "POST", //we are using post method to get data from server side
                    url: 'delete.php', // get the route value
                    data: {contact_id:contact_id}, //set data
                    success: function (response) {//once the request successfully process to the server side it will return result here
                    $('#customers').html(''); //delete everthing inside the table with id customer
                    $('#customers').html(response); //insert the  response  into the table id called customer
                    }
                });
            }
        });

        $('.submit-search-btn').click(function(e){
            e.preventDefault();
            var search_keyword =  $('#search-id-nn').val();
            console.log(search_keyword);
        
            $.ajax({
                        type: "POST", //we are using post method to get data from server side
                        url: 'search.php', // get the route value
                        data: {search_keyword:search_keyword}, //set data
                        success: function (response) {//once the request successfully process to the server side it will return result here
                        // $('#customers').html(''); //delete everthing inside the table with id customer
                        // $('#customers').html(response); //insert the  response  into the table id called customer
                        }
                    });
            });
    
    });
