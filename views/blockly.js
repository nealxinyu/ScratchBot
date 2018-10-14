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