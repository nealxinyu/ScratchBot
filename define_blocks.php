<!-- define new blocks -->
<script>
//user input
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

//sendback
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

//address
Blockly.Blocks['address'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Address");
    this.setOutput(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.JavaScript['address'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
  var code = '...';
  // TODO: Change ORDER_NONE to the correct strength.
  return [code, Blockly.JavaScript.ORDER_NONE];
};

//name
Blockly.Blocks['name'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Name");
    this.setOutput(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.JavaScript['name'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
  var code = '...';
  // TODO: Change ORDER_NONE to the correct strength.
  return [code, Blockly.JavaScript.ORDER_NONE];
};

//answer
Blockly.Blocks['answer'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Answer");
    this.setOutput(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.JavaScript['answer'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
  var code = '...';
  // TODO: Change ORDER_NONE to the correct strength.
  return [code, Blockly.JavaScript.ORDER_NONE];
};

//set name
Blockly.Blocks['setname'] = {
  init: function() {
    this.appendValueInput("NAME")
        .setCheck("String")
        .appendField("set")
        .appendField(new Blockly.FieldVariable("name"), "name")
        .appendField("to");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(315);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.JavaScript['setname'] = function(block) {
  var variable_name = Blockly.JavaScript.variableDB_.getName(block.getFieldValue('name'), Blockly.Variables.NAME_TYPE);
  var value_name = Blockly.JavaScript.valueToCode(block, 'NAME', Blockly.JavaScript.ORDER_ATOMIC);
  // TODO: Assemble JavaScript into code variable.
  var code = '...;\n';
  return code;
};

//ask
Blockly.Blocks['ask'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("ask")
        .appendField(new Blockly.FieldTextInput("Hey! What's your name?"), "Welcome sentence")
        .appendField("and wait");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(230);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.JavaScript['ask'] = function(block) {
  var text_welcome_sentence = block.getFieldValue('Welcome sentence');
  // TODO: Assemble JavaScript into code variable.
  var code = '...;\n';
  return code;
};

//say
Blockly.Blocks['say'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("Say")
        .appendField(new Blockly.FieldTextInput("Hello, welcome to my restaurant."), "hello");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(330);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.JavaScript['say'] = function(block) {
  var text_hello = block.getFieldValue('hello');
  // TODO: Assemble JavaScript into code variable.
  var code = '...;\n';
  return code;
};

//repeat
Blockly.Blocks['repeat'] = {
  init: function() {
    this.appendValueInput("NAME")
        .setCheck(null)
        .appendField("repeat until");
    this.appendStatementInput("NAME")
        .setCheck(null);
    this.setInputsInline(true);
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(45);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.JavaScript['repeat'] = function(block) {
  var value_name = Blockly.JavaScript.valueToCode(block, 'NAME', Blockly.JavaScript.ORDER_ATOMIC);
  var statements_name = Blockly.JavaScript.statementToCode(block, 'NAME');
  // TODO: Assemble JavaScript into code variable.
  var code = '...;\n';
  return code;
};

</script>


<!-- define blocks -->
<xml id="toolbox" style="display:none">
    <block type="ask"></block>
    <block type="say"></block>

    <block type="repeat"></block>

    <!-- <block type="user_input"></block> -->
    <!-- <block type="send_back"></block> -->
    <block type="address"></block>
    <block type="name"></block>
    <block type="answer"></block>
    <block type="setname"></block>

    <block type="text">
      <field name="TEXT"></field>
    </block>
    <block type="controls_if"></block>
    <block type="logic_compare"></block>
</xml>

<!-- default blocks -->
<xml id="startBlocks" style="display: none"><variables><variable type="" id="9xw-6s}e4::%/{eR7t{$">name</variable></variables><block type="say" id="9wM-akoi!fFWhzkK;(E0" x="56" y="55"><field name="hello">Hello, welcome to my restaurant.</field><next><block type="ask" id="yR?wp(3:VHNztrfjmFAd"><field name="Welcome sentence">Hey! What's your name?</field><next><block type="setname" id="V5L7OMIGGtRW=uDPv*@m"><field name="name" id="9xw-6s}e4::%/{eR7t{$" variabletype="">name</field><value name="NAME"><block type="answer" id="!gBfo/[$0p$;=PIWm+-$"></block></value><next><block type="repeat" id="dHV9A9;2-aA8[V=f6Do^"><value name="NAME"><block type="logic_compare" id="^6]3U0S;z4B*}tiq*zr|"><field name="OP">EQ</field><value name="A"><block type="answer" id="b%d)yAxx8/k:)sPDH5t~"></block></value><value name="B"><block type="text" id="o@dJ1r?m.uv1VVV~tpnE"><field name="TEXT">no</field></block></value></block></value><statement name="NAME"><block type="ask" id="=8!p^){;(B@Ss.P`SRJ8"><field name="Welcome sentence">Here is our menu</field><next><block type="ask" id="k|Z;146Aff05)P@BR[pD"><field name="Welcome sentence">Do you want to add more?</field></block></next></block></statement></block></next></block></next></block></next></block></xml>
