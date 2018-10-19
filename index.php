<?php include 'header.php';?>

<div class="container">
	<div id="blocklyDiv" style="height:400px;width:100%;"></div>
	<p>
		<button onclick="showCode()">Show JavaScript</button>
		<button onclick="runCode()">Run JavaScript</button>
		</p>
	<p id="codeViewer"></p>
</div>

	<xml id="toolbox" style="display:none">
	<block type="controls_if"></block>
	<block type="logic_compare"></block>
	<block type="math_number"></block>
	<block type="math_arithmetic"></block>
</xml>

<xml id="startBlocks" style="display: none">
<block type="controls_if" inline="false" x="20" y="20">
  <mutation else="1"></mutation>
  <value name="IF0">
    <block type="logic_compare" inline="true">
      <field name="OP">EQ</field>
      <value name="A">
        <block type="math_number">
          <field name="NUM">42</field>
        </block>
      </value>
      <value name="B">
        <block type="math_number">
          <field name="NUM">42</field>
        </block>
      </value>
    </block>
  </value>
  <statement name="DO0">
    <block type="text_print" inline="false">
      <value name="TEXT">
        <block type="text">
          <field name="TEXT">Don't panic</field>
        </block>
      </value>
    </block>
  </statement>
  <statement name="ELSE">
    <block type="text_print" inline="false">
      <value name="TEXT">
        <block type="text">
          <field name="TEXT">Panic</field>
        </block>
      </value>
    </block>
  </statement>
</block>
</xml>
<script>
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

function runCode() {
  // Generate JavaScript code and run it.
  window.LoopTrap = 1000;
  Blockly.JavaScript.INFINITE_LOOP_TRAP =
      'if (--window.LoopTrap == 0) throw "Infinite loop.";\n';
  var code = Blockly.JavaScript.workspaceToCode(workspace);
  Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
  try {
    eval(code);
    // document.getElementById("codeViewer").innerHTML = result;
  } catch (e) {
    alert(e);
  }
}
</script>

<?php include 'footer.php';?>
