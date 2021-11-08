let dateObj = new Date();
let myDate = ((dateObj.getMonth() + 1)+ "/" + (dateObj.getUTCDate()+"/"+dateObj.getUTCFullYear()));
document.getElementById("date").innerHTML = myDate;
food_date = []
$.ajax({
    url: "data.json",
    dataType: 'json',
    
    success: function(data){
        var food_data = '';
        $.each(data,function(key, value){
            food_data += '<tr id="hvr-grow-shadow">';
            food_data += '<td>' + value.food+ '</td>';
            
            
           
            food_data += '<td>' + value.purchase_date + '</td>';
            food_data += '<td>'+ value.expiration_date + '</td>';
            food_data +=  '<td>'+ value.opened + '</td>';
            p_date = value.purchase_date
            var_status = set_status(myDate, p_date);
         
            if(var_status >= 5){
              

  
               food_data += '<td>'+ '<button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#warning_modal">VIEW MORE</button>' + '</td>';



            
              }else{
              food_data += '<td>'+ '<button type="button" class="btn btn-success" data-toggle = "modal" data-target = "#success_modal">VIEW MORE</button>' + '</td>';
            }
            food_data += '</tr>';
  
        });
  
        $("#food_table").append(food_data);
  
      }
    });

    function set_status(currDate, purchase_date) {
        const date1 = new Date(purchase_date);
        const date2 = new Date(currDate);
    
        // One day in milliseconds
        const oneDay = 1000 * 60 * 60 * 24;
    
        // Calculating the time difference between two dates
        const diffInTime = date2.getTime() - date1.getTime();
    
        // Calculating the no. of days between two dates
        const diffInDays = Math.round(diffInTime / oneDay);
    
        return diffInDays;
      }
      

   

