<?php
if (isset($_GET['botId'])) {
  $server = "db4free.net";
  $username = "scratchbot";
  $password = "qaz123wsx";
  $dbname = "scratchbot";

  // Create connection
  $conn = new mysqli($server, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT content, user_id FROM `blocks` WHERE botId=".$_GET['botId'];
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $xml = $row["content"];
          $user_id = $row["user_id"];
      }
  } else {
      echo "0 results";
  }
  $conn->close();
} else {
    echo "please post";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>ScratchBot</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>

<script src="blockly/blockly_compressed.js"></script>
<script src="blockly/blocks_compressed.js"></script>
<script src="blockly/msg/js/en.js"></script>
<script src="blockly/javascript_compressed.js"></script>

<link rel="stylesheet" type="text/css" href="chatbox-media/chatbox_style.css">

<div class="col-sm-8" style="display:none;">
    <div id="blocklyDiv" style="height:500px;width:100%;"></div>
    </br>
    <button onclick="saveXml()">Save</button>
    <button onclick="resetWorkspeace()">Reset</button>
    <button onclick="showCode()">Show JavaScript</button>
    <p id="codeViewer"></p>
</div>
<style type="text/css">
  .chatbox{
    width: 400px;
    min-width: 400px;
    max-width: 400px;
    height: 530px;
    min-height: 530px;
    max-height: 530px;
    margin: auto;
  }
</style>

<div class="chatbox">
  <div class="chatcontent">
    <div class="content owner">
      <div class="user-photo"><img src="./chatbox-media/food.png"></div>
      <p class="message">Welcome!</p>
    </div>
  </div>
  <div class="chat-input">
    <textarea id="chatbox-user-input" onkeydown="pressed(event)" placeholder="Please type your input."></textarea>
    <button id="chatbox-send" onclick="sendMsg()">SEND</button>
  </div>
</div>

<?php include 'define_blocks.php';?>

<script>
  // global var
  var orderName;
  var orderAddress;
  var orderFood;
  var orderType;
  var orderPhone;
  var orderEmail;

  var totalStep = 0;
  var currentStep = 0;
  var exitStep = -1;

  // initial
  var workspace = Blockly.inject('blocklyDiv',
      {media: 'media/',
       toolbox: document.getElementById('toolbox')});

  Blockly.Xml.domToWorkspace(document.getElementById('startBlocks'),workspace);

  function showCode() {
    // Generate JavaScript code and display it.
    Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
    var code = Blockly.JavaScript.workspaceToCode(workspace);
    document.getElementById("codeViewer").innerHTML = code;
  }

  function runCode(input) {
    // Generate JavaScript code and run it.
    window.LoopTrap = 1000;
    Blockly.JavaScript.INFINITE_LOOP_TRAP =
        'if (--window.LoopTrap == 0) throw "Infinite loop.";\n';
    var runCode = Blockly.JavaScript.workspaceToCode(workspace);

    Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
    try {
      //get user input
      var userInput = input;
      eval(runCode);
      exitStep = -1;
    } catch (e) {
      console.log(e);
    }
    totalStep = 0;
    currentStep = 0;
  }

  function saveXml() {
    var xml = Blockly.Xml.workspaceToDom(workspace);
    console.log(xml);
    var xmlText = new XMLSerializer().serializeToString(xml);
    //var xmlTextNode = document.createTextNode(xmlText);

    $.ajax({
      url: "db_save_xml.php",
      type: "POST",
      data: ({"xml":xmlText}),
      success: function(data) {
          alert("Saved");
      },
    });
    //   Show to homepage
    // var parentDiv = document.getElementById('xml_saved');
    // parentDiv.appendChild(xmlTextNode);
  }

  function resetWorkspeace() {
    Blockly.mainWorkspace.clear();
  }

</script>

<script>
  var jsonmenu;
  var fullmenu = "";

  var restaurantName;
  var restaurantPhone;
  var restaurantAddress;

  function sendMsg(){
    /*Start of User Input*/
    var userInput = document.getElementById('chatbox-user-input').value;
    document.getElementById('chatbox-user-input').value = "";

    var userdiv = document.createElement("div");
    userdiv.setAttribute("class", "content customer");

    var userinnerdiv = document.createElement("div");
    userinnerdiv.setAttribute("class", "user-photo");

    var userimg = document.createElement("img");
    userimg.setAttribute("src", "./chatbox-media/you.png");

    var userp = document.createElement("p");
    userp.setAttribute("class", "message");
    userp.innerHTML = userInput;

    document.getElementsByClassName("chatcontent")[0].appendChild(userdiv);
    document.getElementsByClassName("chatcontent")[0].lastElementChild.appendChild(userinnerdiv);
    document.getElementsByClassName("chatcontent")[0].lastElementChild.getElementsByClassName("user-photo")[0].appendChild(userimg);
    document.getElementsByClassName("chatcontent")[0].lastElementChild.appendChild(userp);
    var contentbox = document.getElementsByClassName("chatcontent")[0];
    contentbox.scrollTop = contentbox.scrollHeight;
    /*End of User Input*/

    /*Start of Bot Reply*/
    runCode(userInput);
    /*End of Bot Reply*/
  }

  function botReply(replyMsg){
    var botdiv = document.createElement("div");
    botdiv.setAttribute("class", "content owner");

    var botinnerdiv = document.createElement("div");
    botinnerdiv.setAttribute("class", "user-photo");

    var botimg = document.createElement("img");
    botimg.setAttribute("src", "./chatbox-media/food.png");

    var botp = document.createElement("p");
    botp.setAttribute("class", "message");
    botp.innerHTML = replyMsg;/*INSERT BOT REPLY VALUE HERE!*/

    // delay reply
    setTimeout(function(){
      document.getElementsByClassName("chatcontent")[0].appendChild(botdiv);
      document.getElementsByClassName("chatcontent")[0].lastElementChild.appendChild(botinnerdiv);
      document.getElementsByClassName("chatcontent")[0].lastElementChild.getElementsByClassName("user-photo")[0].appendChild(botimg);
      document.getElementsByClassName("chatcontent")[0].lastElementChild.appendChild(botp);
      var contentbox = document.getElementsByClassName("chatcontent")[0];
      contentbox.scrollTop = contentbox.scrollHeight;
    }, 1000);
  }

  function pressed(e) {
    if (e.keyCode == 13 && !e.shiftKey) {
        sendMsg();
        // prevent default behavior
        e.preventDefault();
    }
  }

  function isAnswerPositive(answer){
    return true;
  }

  function isAnswerNegative(answer){
    return false;
  }

  function sendOrder(){
    orderDetail = "";
    orderDetail += "Type: "+orderType+"<br>";
    orderDetail += "Food ordered: "+getFoodNameByList(orderFood)+"<br>";
    orderDetail += "Name: "+orderName+"<br>";
    orderDetail += "Address: "+orderAddress;
    botReply(orderDetail);
  }

  function getFoodNameByList(orderFood){
    orderFoodList = orderFood.split(",");
    orderFoodString = "";
    for (var i = 0; i < orderFoodList.length; i++){
      if((orderFoodList[i]-1)< jsonmenu.length){
        orderFoodString += "[";
        orderFoodString += jsonmenu[orderFoodList[i]-1].name;
        orderFoodString += "] ";
      }
    }
    return orderFoodString;
  }

  function saveOrder(){
    console.log("saving");
    $.ajax({
      url: "db_save_order.php",
      type: "POST",
      data: {"orderType":orderType,
             "orderFood":getFoodNameByList(orderFood),
             "orderName":orderName,
             "orderPhone":orderPhone,
             "orderEmail":orderEmail,
             "orderAddress":orderAddress
              },
      success: function(data) {
          alert("Saved");
      },
    });
  }

  window.onload = function getMenu(){
    $.ajax({
    url: "db_get_menu.php",
    type: "POST",
    data: {"user_id":<?php echo $user_id ?>},
    success: function(data) {
      obj = JSON.parse(data);
      jsonmenu = JSON.parse(data);
      for (var i = 0; i < obj.length; i++) {
          fullmenu += i+1;
          fullmenu += " : ";
          fullmenu += obj[i].name;
          fullmenu += " , ";
          fullmenu += obj[i].price;
          fullmenu += "<br>";
      }
      console.log(fullmenu);
    },
    error: function(){
      alert("fail to get menu");
    }
   });

    $.ajax({
      url: "db_get_restaurant.php",
      type: "POST",
      data: {"user_id":<?php echo $user_id ?>},
      success: function(data) {
        restaurantName = data.split(",")[0];
        restaurantPhone = data.split(",")[1];
        restaurantAddress = data.split(",")[2];
        console.log(data);
      },
      error: function(){
        alert("fail to get restaurant info");
      }
    });
  }
</script>
<script>

</script>
<?php include 'footer.php';?>
