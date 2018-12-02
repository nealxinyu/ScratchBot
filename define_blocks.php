<!-- define new blocks -->
<script>
Blockly.Blocks['say'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("say")
        .appendField(new Blockly.FieldTextInput("Hello, welcome to my restaurant."), "content");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(330);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['ask'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("ask")
        .appendField(new Blockly.FieldTextInput("How are you?"), "content");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(330);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['send_menu'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("send menu");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(0);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['send_order'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("send order details");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(0);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['save_order'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("push order to restaurant");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(0);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['ask_name'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("ask for name");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(210);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['ask_address'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("ask for address");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(210);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['ask_order'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("ask \"What would you like to order?\"");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(210);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['ask_phone'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("ask for phone");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(210);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['ask_email'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("ask for email");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(210);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.Blocks['ask_type'] = {
  init: function() {
    this.appendDummyInput()
        .appendField("ask for type of order (dilivery/pickup)");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(210);
 this.setTooltip("");
 this.setHelpUrl("");
  }
};

Blockly.JavaScript['say'] = function(block) {
  var content = block.getFieldValue('content');
  // TODO: Assemble JavaScript into code variable.
  var code = 'if(exitStep <= currentStep){\
                botReply("'+content+'");\
              }';
  return code;
};

Blockly.JavaScript['ask'] = function(block) {
  var content = block.getFieldValue('content');
  // TODO: Assemble JavaScript into code variable.
  var code =  'currentStep++;\
              if(exitStep < currentStep){\
                botReply("'+content+'");\
                exitStep = currentStep;\
                throw("wait for user confirm");\
              }else if(exitStep == currentStep){\
              }';
  return code;
};

Blockly.JavaScript['send_menu'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
  var code = 'if(exitStep <= currentStep){\
                botReply(fullmenu);\
              }';
  return code;
};

Blockly.JavaScript['send_order'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
  var code = 'if(exitStep <= currentStep){\
                sendOrder();\
              }';
  return code;
};

Blockly.JavaScript['save_order'] = function(block) {
  // TODO: Assemble JavaScript into code variable.
  var code = 'if(exitStep <= currentStep){\
                saveOrder();\
              }';
  return code;
};

Blockly.JavaScript['ask_name'] = function(block) {
  totalStep++;
  // TODO: Assemble JavaScript into code variable.
  var code = 'currentStep++;\
              if(exitStep < currentStep){\
                botReply("What is your name?");\
                exitStep = currentStep;\
                throw("wait for user name");\
              }else if(exitStep == currentStep){\
                orderName = userInput;\
              }';
  return code;
};

Blockly.JavaScript['ask_address'] = function(block) {
  totalStep++;
  // TODO: Assemble JavaScript into code variable.
  var code = 'currentStep++;\
              if(exitStep < currentStep){\
                botReply("What is your address?");\
                exitStep = currentStep;\
                throw("wait for user address");\
              }else if(exitStep == currentStep){\
                orderAddress = userInput;\
              }';
  return code;
};

Blockly.JavaScript['ask_order'] = function(block) {
  totalStep++;
  // TODO: Assemble JavaScript into code variable.
  var code = 'currentStep++;\
              if(exitStep < currentStep){\
                botReply("What would you want to order?");\
                exitStep = currentStep;\
                throw("wait for user order");\
              }else if(exitStep == currentStep){\
                orderFood = userInput;\
              }';
  return code;
};

Blockly.JavaScript['ask_phone'] = function(block) {
  totalStep++;
  // TODO: Assemble JavaScript into code variable.
  var code = 'currentStep++;\
              if(exitStep < currentStep){\
                botReply("What is your phone number?");\
                exitStep = currentStep;\
                throw("wait for user phone");\
              }else if(exitStep == currentStep){\
                orderPhone = userInput;\
              }';
  return code;
};

Blockly.JavaScript['ask_email'] = function(block) {
  totalStep++;
  // TODO: Assemble JavaScript into code variable.
  var code = 'currentStep++;\
              if(exitStep < currentStep){\
                botReply("What is your email address?");\
                exitStep = currentStep;\
                throw("wait for user email");\
              }else if(exitStep == currentStep){\
                orderEmail = userInput;\
              }';
  return code;
};

Blockly.JavaScript['ask_type'] = function(block) {
  totalStep++;
  // TODO: Assemble JavaScript into code variable.
  var code = 'currentStep++;\
              if(exitStep < currentStep){\
                botReply("Dilivery or Pickup?");\
                exitStep = currentStep;\
                throw("wait for user order type");\
              }else if(exitStep == currentStep){\
                orderType = userInput;\
              }';
  return code;
};
</script>


<!-- define blocks -->
<xml id="toolbox" style="display:none">
    <block type="say"></block>
    <block type="ask"></block>
    <block type="ask_order"></block>
    <block type="ask_name"></block>
    <block type="ask_address"></block>
    <block type="ask_phone"></block>
    <block type="ask_email"></block>
    <block type="ask_type"></block>
    <block type="send_order"></block>
    <block type="send_menu"></block>
    <block type="save_order"></block>
    <!--<block type="controls_if"></block> -->
</xml>

<!-- default blocks -->
<xml id="startBlocks" style="display: none"><block type="say" id="$`ZnWVgoJ%Wrag/K5y59" x="98" y="20"><field name="content">Hello, welcome to my restaurant.</field><next><block type="ask" id="FsU8q20$keq27F6R^;Df"><field name="content">How are you?</field><next><block type="send_menu" id="GCz-DL|5a9WOv@+/)0c9"><next><block type="ask_order" id="hlZN_@kS:V{)gJbr6Re%"><next><block type="ask_name" id="PvneV[XQq4u*vjn)?z3."><next><block type="ask_address" id="rGE1eEl38~O2Hs2S02rO"><next><block type="ask_type" id=";]~kb?{:jTl5TWaR|sfQ"><next><block type="save_order" id=":Bn/2F@nZyV-EHy%[wGq"></block></next></block></next></block></next></block></next></block></next></block></next></block></next></block></xml>
