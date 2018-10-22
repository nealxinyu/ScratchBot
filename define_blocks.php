<!-- define new blocks -->
<script>
Blockly.Blocks['user_input'] = {
  init: function() {
    this.setNextStatement(false);
    this.setPreviousStatement(false);
    this.appendDummyInput()
        .appendField('input');
    this.setOutput(true, null);
    this.setColour(165);
    this.setTooltip("");
    this.setHelpUrl("");
  }
};

Blockly.JavaScript['user_input'] = function(block) {
  return ["userInput", Blockly.JavaScript.ORDER_MEMBER];
};

Blockly.Blocks['send_back'] = {
  init: function() {
    this.appendValueInput("send_back")
        .setCheck(null)
        .appendField("send back");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(165);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};


Blockly.JavaScript['send_back'] = function(block) {
  var value_send_back = Blockly.JavaScript.valueToCode(block, 'send_back', Blockly.JavaScript.ORDER_ATOMIC);
  value_send_back = value_send_back.replace(/\'/g, "");
  // TODO: Assemble JavaScript into code variable.
  //var code = 'alert('+value_send_back+');\n';
  var code = 'botReply("'+value_send_back+'");\n';
  return code;
};

</script>

<!-- define blocks -->
<xml id="toolbox" style="display:none">
    <block type="user_input"></block>
    <block type="send_back"></block>
    <block type="text">
      <field name="TEXT"></field>
    </block>
    <block type="controls_if"></block>
    <block type="logic_compare"></block>
</xml>

<!-- default blocks -->
<xml id="startBlocks" style="display: none"><block type="controls_if" id="2O;0N;1:%8QNV/c7yo)^" inline="false" x="27" y="25"><mutation elseif="1" else="1"></mutation><value name="IF0"><block type="logic_compare" id=".SDMgfPU{WMCu@9-lY=c"><field name="OP">EQ</field><value name="A"><block type="user_input" id="L1N@@8c^teXeziJWOj2t"></block></value><value name="B"><block type="text" id="fYP4bHyT|vFG!lI{E:f#"><field name="TEXT">1</field></block></value></block></value><statement name="DO0"><block type="send_back" id="rC}k1OlLm*A5b3(SHaCq" inline="false"><value name="send_back"><block type="text" id="I64qlUEpR^A([G8zSM14"><field name="TEXT">Menu1: pizza</field></block></value></block></statement><value name="IF1"><block type="logic_compare" id="_v|R-*RP)xPepu7KSQVt"><field name="OP">EQ</field><value name="A"><block type="user_input" id="d#i5}965M6Z_vck]AnL]"></block></value><value name="B"><block type="text" id="PHe=R18]3+e[KCapuE-J"><field name="TEXT">2</field></block></value></block></value><statement name="DO1"><block type="send_back" id="4T|~b,WDadc*}h0?^Z^V" inline="false"><value name="send_back"><block type="text" id="LVb}?nJ1+`mx:.F%6_F9"><field name="TEXT">Menu2: burger</field></block></value></block></statement><statement name="ELSE"><block type="send_back" id=",hVZDpQvfspg:x0$9QK-" inline="false"><value name="send_back"><block type="text" id="gjHNqt+WRx3[zi6ugjW%"><field name="TEXT">welcome</field></block></value></block></statement></block></xml>
