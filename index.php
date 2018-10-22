<?php include 'header.php';?>

<script src="blockly/blockly_compressed.js"></script>
<script src="blockly/blocks_compressed.js"></script>
<script src="blockly/msg/js/en.js"></script>
<script src="blockly/javascript_compressed.js"></script>

<link rel="stylesheet" type="text/css" href="chatbox-media/chatbox_style.css">

<div class="container">
  <div class="row">
    <div class="col-sm-8">
        <div id="blocklyDiv" style="height:500px;width:100%;"></div>
        </br>
        <button onclick="saveXml()">Save</button>
        <button onclick="resetWorkspeace()">Reset</button>
        <button onclick="showCode()">Show JavaScript</button>
        <p id="codeViewer"></p>
    </div>
    <div class="col-sm-4">
        <div class="chatbox">
          <div class="chatcontent">
            <div class="content owner">
              <div class="user-photo"><img src="./chatbox-media/food.png"></div>
              <p class="message">Welcome. How can I help you today? </p>
            </div>
          </div>
          <div class="chat-input">
            <textarea id="chatbox-user-input" onkeydown="pressed(event)" placeholder="Please type your input."></textarea>
            <button onclick="sendMsg()">SEND</button>
          </div>
        </div>
    </div>
  </div>
</div>

<?php include 'define_blocks.php';?>

<script>
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
    } catch (e) {
      alert(e);
    }
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

    document.getElementsByClassName("chatcontent")[0].appendChild(botdiv);
    document.getElementsByClassName("chatcontent")[0].lastElementChild.appendChild(botinnerdiv);
    document.getElementsByClassName("chatcontent")[0].lastElementChild.getElementsByClassName("user-photo")[0].appendChild(botimg);
    document.getElementsByClassName("chatcontent")[0].lastElementChild.appendChild(botp);
    var contentbox = document.getElementsByClassName("chatcontent")[0];
    contentbox.scrollTop = contentbox.scrollHeight;
  }
  function pressed(e) {
    if (e.keyCode == 13 && !e.shiftKey) {
        sendMsg();
        // prevent default behavior
        e.preventDefault();
    }
  }
</script>

<?php include 'footer.php';?>
