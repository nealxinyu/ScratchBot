var i = 0;
var jsonArr = []; 
var jsonString; 
var jsonStrBef = "[";
var jsonStrAft = "]";
var jsonFormatt = "";
var counter = 0;

$(document).ready(function () {
    $("#submit").on("click", function () {
        //var menuString;
        //var priceString;
            /*
            if (i == 0) {
                //var counter = 0;
                menuString = document.getElementById("menu"+i.toString()).value;
                priceString = document.getElementById("price"+i.toString()).value;
                jsonString = "{\"name\": " + "\"" + menuString + "\"" + "," + "\"price\": " + "\"" + priceString + "\"" + "}";    
                jsonArr.push(jsonString)
                jsonStrBef += jsonArr[i];
                jsonFormatt = jsonStrBef + jsonStrAft;
                //counter++;
                i++;
                } else {
                    for (i; i < jsonArr.length; i++) {
                        menuString = document.getElementById("menu"+i.toString()).value;
                        priceString = document.getElementById("price"+i.toString()).value;
                        jsonString = "{\"name\": " + "\"" + menuString + "\"" + "," + "\"price\": " + "\"" + priceString + "\"" + "}";    
                        jsonArr.push(jsonString);

                }
                */
        var menuString;
        var priceString;
        if (i == 0) {
            menuString = document.getElementById("menu"+i.toString()).value;
            priceString = document.getElementById("price"+i.toString()).value;
            jsonString = "{\"name\": " + "\"" + menuString + "\"" + "," + "\"price\": " + "\"" + priceString + "\"" + "}";
            jsonArr.push(jsonString);
            jsonStrBef += jsonArr[i];
            jsonFormatt = jsonStrBef + jsonStrAft;    
            i++;
            //console.log(jsonArr.length);
        }
        for (i; i <= counter; i++) {
            menuString = document.getElementById("menu"+i.toString()).value;
            priceString = document.getElementById("price"+i.toString()).value;
            console.log("jsonArr length: " + jsonArr.length);
            //if (i == 0) {
            //    jsonString = "{\"name\": " + "\"" + menuString + "\"" + "," + "\"price\": " + "\"" + priceString + "\"" + "}";    
            //    console.log(jsonString);
            //} else {
                jsonString = ", {\"name\": " + "\"" + menuString + "\"" + "," + "\"price\": " + "\"" + priceString + "\"" + "}";    

            //}
            console.log(i);
            jsonArr.push(jsonString);
            jsonStrBef += jsonArr[i];
            jsonFormatt = jsonStrBef + jsonStrAft;
            

        }
        
        alert("Json format is: " + jsonFormatt);
    });
});

$(document).ready(function () {
    //var counter = 0;

    $("#addrow").on("click", function () {
        var menuString = document.getElementById("menu"+counter.toString()).value;
        var priceString = document.getElementById("price"+counter.toString()).value;
        if (menuString == "" || priceString == "") {
            alert("Please input valid Dish and Price...");
            
        } else {
            var newRow = $("<tr>");
            var cols = "";     
            //var yet = document.getElementsByClassName('price')[0].value;
            //var myt = document.getElementById("myRow");
            //var myt1 = myt.cells[0].lastChild.value;
            //var myt2 = myt.cells[1].nodeName;
            //var tym = myt.getElementsByTagName("tr")[0];  
            //var tey = tym.lastChild.nodeName;
            //.previousSilbling.getElementsByTagName("input")[0];
            //var yet = tym.lastChild.getElementsByTagName("input")[0];

            
            counter++;

            cols += '<td class="menu"><input id="menu'+counter+'" class="form-control" placeholder="Item Name" name="menu"/></td>';
            cols += '<td class="price"><input id="price'+counter+'" class="form-control" placeholder="Price" name="price"/></td>';
            

            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.order-list").append(newRow);
            //console.log(counter);
            //console.log(menuCounter);
            //console.log(priceCounter);
            //jsonString = "{\"name\": " + "\"" + menuString + "\"" + "," + "\"price\": " + "\"" + priceString + "\"" + "}";    
            //console.log(jsonString);

            //jsonArr.push(jsonString);
            //jsonArr.toString();

            //console.log(jsonArr); 
            //jsonStrBef = jsonStrBef + jsonArr[0];
            //for (i; i < jsonArr.length; i++) {
                
                
            //        jsonStrBef += ", " + jsonArr[i];
                

            //}
            //jsonFormatt = jsonStrBef + jsonStrAft;

            //console.log("Json: " + jsonFormatt);
            }   
    });


    /*
    jsonStrBef = jsonStrBef + jsonArr[0];
    for (var i = 1; i < jsonArr.length; i++) {
        jsonStrBef = jsonStrBef + ", " + jsonArr[i];

    }
    jsonFormatt = jsonStrBef + jsonStrAft;

    //console.log(jsonFormatt);
*/
    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter--;
    });


});



function calculateRow(row) {
    var price = +row.find('input[menu^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[menu^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}