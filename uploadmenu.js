var i = 0;
var jsonArr = [];
var jsonString;
var jsonStrBef = "[";
var jsonStrAft = "]";
var jsonFormatt = "";
var counter = 0;

function updateMenu() {
    var menuString = document.getElementById("menu"+counter.toString()).value;
    var priceString = document.getElementById("price"+counter.toString()).value;
    if (menuString == "" || priceString == "") {
        alert("Please input valid Dish and Price...");
        return;
    }

    var menuString;
    var priceString;
    if (i == 0) {
        menuString = document.getElementById("menu"+i.toString()).value;
        priceString = document.getElementById("price"+i.toString()).value;
        jsonString = "{\"name\": " + "\"" + menuString + "\"" + "," + "\"price\": " + "\"$" + priceString + "\"" + "}";
        jsonArr.push(jsonString);
        jsonStrBef += jsonArr[i];
        jsonFormatt = jsonStrBef + jsonStrAft;
        i++;
    }
    for (i; i <= counter; i++) {
        menuString = document.getElementById("menu"+i.toString()).value;
        priceString = document.getElementById("price"+i.toString()).value;
        console.log("jsonArr length: " + jsonArr.length);

        jsonString = ", {\"name\": " + "\"" + menuString + "\"" + "," + "\"price\": " + "\"$" + priceString + "\"" + "}";

        console.log(i);
        jsonArr.push(jsonString);
        jsonStrBef += jsonArr[i];
        jsonFormatt = jsonStrBef + jsonStrAft;
    }

    $.ajax({
      url: "db_save_xml.php",
      type: "POST",
      data: ({"menu":jsonFormatt}),
      success: function(data) {
          alert(data);
          document.location.href="viewmenu.php";
      },
    });

};



function addRow() {
    var menuString = document.getElementById("menu"+counter.toString()).value;
    var priceString = document.getElementById("price"+counter.toString()).value;
    if (menuString == "" || priceString == "") {
        alert("Please input valid Dish and Price...");
    } else {
        var newRow = $("<tr>");
        var cols = "";

        counter++;

        cols += '<td class="menu"><input id="menu'+counter+'" class="form-control" placeholder="Item Name" name="menu"/></td>';
        cols += '<td class="price"><input id="price'+counter+'" class="form-control" placeholder="Price" name="price"/></td>';


        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);

    }
}


$(document).ready(function () {
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
