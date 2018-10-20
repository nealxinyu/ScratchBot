<?php include 'header.php';?>

<script src="blockly/blockly_compressed.js"></script>
<script src="blockly/blocks_compressed.js"></script>
<script src="blockly/msg/js/en.js"></script>
<script src="blockly/javascript_compressed.js"></script>

<div class="container">
	<div id="blocklyDiv" style="height:400px;width:100%;"></div>
	<p>
		<button onclick="showCode()">Show JavaScript</button>
		<button onclick="runCode()">Run JavaScript</button>
		</p>
	<p id="codeViewer"></p>
  Input:<br>
  <input type="text" name="userInput" id="user_input"><br>
  <button onclick="sendMessage()">Send</button>

  <button onclick="saveXml()">Save</button>

</div>

<?php
// $server = "";
// $username = "scratchbot";
// $password = "qaz123wsx";
// $dbname = "scratchbot";

// // Create connection
// $conn = new mysqli($server, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $sql = "INSERT INTO blocks
// VALUES ('1', 'Doe', '23')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
?>

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

var runCode;

function runCode() {
  // Generate JavaScript code and run it.
  window.LoopTrap = 1000;
  Blockly.JavaScript.INFINITE_LOOP_TRAP =
      'if (--window.LoopTrap == 0) throw "Infinite loop.";\n';
  runCode = Blockly.JavaScript.workspaceToCode(workspace);

  Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
  try {
    //get user input
    var userInput = "asd";
    eval(runCode);
  } catch (e) {
    alert(e);
  }
}

function sendMessage() {
  // Generate JavaScript code and run it.
  window.LoopTrap = 1000;
  Blockly.JavaScript.INFINITE_LOOP_TRAP =
      'if (--window.LoopTrap == 0) throw "Infinite loop.";\n';
  runCode = Blockly.JavaScript.workspaceToCode(workspace);

  Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
  try {
    //get user input
    var userInput = document.getElementById('user_input').value;
    eval(runCode);
  } catch (e) {
    alert(e);
  }
}

function saveXml() {
 var xml = Blockly.Xml.workspaceToDom(workspace);
 console.log(xml);
}

</script>

<?php include 'footer.php';?>
