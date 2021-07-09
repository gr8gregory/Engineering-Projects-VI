function myFunction_CD() {

    var CD;
    if(document.getElementById("CD").src == 'http://142.156.193.130:50000/gui/img/CallButtonDownLit.png'){
        document.getElementById("CD").src="http://142.156.193.130:50000/gui/img/CallButtonDown.png";
        CD = "http://142.156.193.130:50000/gui/img/CallButtonDown.png";
    }
    else{
        document.getElementById("CD").src="http://142.156.193.130:50000/gui/img/CallButtonDownLit.png";
	    CD = "http://142.156.193.130:50000/gui/img/CallButtonDownLit.png";    
	}
	localStorage.setItem("CD", CD);
}
function myFunction_CUD_U() {
    var CUD;
    if(document.getElementById("CUD").src == "http://142.156.193.130:50000/gui/img/call_button_lit_up.png"){
        document.getElementById("CUD").src="http://142.156.193.130:50000/gui/img/CallButtonUpDown.png";
        CUD="http://142.156.193.130:50000/gui/img/CallButtonUpDown.png"
    }
    else{
        document.getElementById("CUD").src="http://142.156.193.130:50000/gui/img/call_button_lit_up.png";
        CUD="http://142.156.193.130:50000/gui/img/call_button_lit_up.png"
    }
    localStorage.setItem("CUD", CUD);
}
function myFunction_CUD_D() {
    var CDD;
    if(document.getElementById("CUD").src == "http://142.156.193.130:50000/gui/img/call_button_lit_down.png"){
        document.getElementById("CUD").src="http://142.156.193.130:50000/gui/img/CallButtonUpDown.png";
        CDD="http://142.156.193.130:50000/gui/img/CallButtonUpDown.png"
    }
    else{
        document.getElementById("CUD").src="http://142.156.193.130:50000/gui/img/call_button_lit_down.png";
        CDD="http://142.156.193.130:50000/gui/img/call_button_lit_down.png"
    }
    localStorage.setItem("CDD", CDD);
}
function myFunction_CU() {
    var CU;
    if(document.getElementById("CU").src == "http://142.156.193.130:50000/gui/img/CallButtonLitUp.png"){
        document.getElementById("CU").src="http://142.156.193.130:50000/gui/img/CallButtonUp.png";
        CU="http://142.156.193.130:50000/gui/img/CallButtonUp.png";
    }
    else{
        document.getElementById("CU").src="http://142.156.193.130:50000/gui/img/CallButtonLitUp.png";
        CU="http://142.156.193.130:50000/gui/img/CallButtonLitUp.png";
    }
    localStorage.setItem("CU", CU);
}
function myFunction_I3() {
	var I3;
    if(document.getElementById("INO").src == "http://142.156.193.130:50000/gui/img/Panel_3.png"){
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/none_lit_up.png";
	    I3="http://142.156.193.130:50000/gui/img/none_lit_up.png"
    }
    else{
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/Panel_3.png";
        I3="http://142.156.193.130:50000/gui/img/Panel_3.png"
	}
    localStorage.setItem("I3", I3);
}
function myFunction_I2() {
    var I2;
    if(document.getElementById("INO").src == "http://142.156.193.130:50000/gui/img/Panel_2.png"){
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/none_lit_up.png";
        I2="http://142.156.193.130:50000/gui/img/none_lit_up.png";
    }
    else{
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/Panel_2.png";
        I2="http://142.156.193.130:50000/gui/img/Panel_2.png";
    }
    localStorage.setItem("I2", I2);
}
function myFunction_I1() {
    var I1;
    if(document.getElementById("INO").src == "http://142.156.193.130:50000/gui/img/Panel_1.png"){
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/none_lit_up.png";
        I1="http://142.156.193.130:50000/gui/img/none_lit_up.png";
    }
    else{
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/Panel_1.png";
        I1="http://142.156.193.130:50000/gui/img/Panel_1.png";
    }
    localStorage.setItem("I1", I1);
}
function myFunction_IC() {
    var IC;
    if(document.getElementById("INO").src == "http://142.156.193.130:50000/gui/img/Panel_O.png"){
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/none_lit_up.png";
        IC="http://142.156.193.130:50000/gui/img/none_lit_up.png";
    }
    else{
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/Panel_O.png";
        IC="http://142.156.193.130:50000/gui/img/Panel_O.png";
    }
    localStorage.setItem("IC", IC);
}
function myFunction_IO() {
    var IO;
    if(document.getElementById("INO").src == "http://142.156.193.130:50000/gui/img/Panel_C.png"){
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/none_lit_up.png";
        IO="http://142.156.193.130:50000/gui/img/none_lit_up.png";
    }
    else{
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/Panel_C.png";
        IO="http://142.156.193.130:50000/gui/img/Panel_C.png";
    }
    localStorage.setItem("IO", IO);
}
function myFunction_IF() {
    var IF;
    if(document.getElementById("INO").src == "http://142.156.193.130:50000/gui/img/Panel_F.png"){
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/none_lit_up.png";
        IF="http://142.156.193.130:50000/gui/img/none_lit_up.png";
    }
    else{
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/Panel_F.png";
        IF="http://142.156.193.130:50000/gui/img/Panel_F.png";
    }
    localStorage.setItem("IF", IF);
}
function myFunction_IB() {
    var IB;
    if(document.getElementById("INO").src == "http://142.156.193.130:50000/gui/img/Panel_B.png"){
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/none_lit_up.png";
        IB="http://142.156.193.130:50000/gui/img/none_lit_up.png";
    }
    else{
        document.getElementById("INO").src="http://142.156.193.130:50000/gui/img/Panel_B.png";
        IB="http://142.156.193.130:50000/gui/img/Panel_B.png";
    }
    localStorage.setItem("IB", IB);
}

function imginit(){
    var IB, IF, IO, IC, I1, I2, I3, CU, CDD, CUD, CD;

    if ( localStorage.getItem('CD')) {
        CD = localStorage.getItem('CD');
    }
    else {
        CD = "http://142.156.193.130:50000/gui/img/CallButtonDown.png";
    }
    document.getElementById("CD").src= CD;

    if ( localStorage.getItem('CUD')) {
        CD = localStorage.getItem('CUD');
    }
    else {
        CUD = "http://142.156.193.130:50000/gui/img/CallButtonUpDown.png";
    }
    document.getElementById("CUD").src= CUD;

    if ( localStorage.getItem('CDD')) {
        CDD = localStorage.getItem('CDD');
    }
    else {
        CDD="http://142.156.193.130:50000/gui/img/CallButtonUpDown.png"
    }
    document.getElementById("CDD").src= CDD;

    if ( localStorage.getItem('CU')) {
        CU = localStorage.getItem('CU');
    }
    else {
        CU="http://142.156.193.130:50000/gui/img/CallButtonUp.png";
    }
    document.getElementById("CU").src= CU;

    if ( localStorage.getItem('I3')) {
        I3 = localStorage.getItem('I3');
    }
    else {
        I3="http://142.156.193.130:50000/gui/img/none_lit_up.png"
    }
    document.getElementById("I3").src= I3;

    if ( localStorage.getItem('I2')) {
        I2 = localStorage.getItem('I2');
    }
    else {
        I2="http://142.156.193.130:50000/gui/img/none_lit_up.png";
    }
    document.getElementById("I2").src= I2;

    if ( localStorage.getItem('I1')) {
        I1 = localStorage.getItem('I1');
    }
    else {
        I1="http://142.156.193.130:50000/gui/img/none_lit_up.png";
    }
    document.getElementById("I1").src= I1;

    if ( localStorage.getItem('IO')) {
        IO = localStorage.getItem('IO');
    }
    else {
        IO="http://142.156.193.130:50000/gui/img/none_lit_up.png";
    }
    document.getElementById("IO").src= IO;

    if ( localStorage.getItem('IC')) {
        IC = localStorage.getItem('IC');
    }
    else {
        IC="http://142.156.193.130:50000/gui/img/Panel_O.png";
    }
    document.getElementById("IC").src= IC;

    if ( localStorage.getItem('IB')) {
        IB = localStorage.getItem('IB');
    }
    else {
        IB="http://142.156.193.130:50000/gui/img/none_lit_up.png";
    }
    document.getElementById("IB").src= IB;

    if ( localStorage.getItem('IF')) {
        IF = localStorage.getItem('IF');
    }
    else {
        IF="http://142.156.193.130:50000/gui/img/Panel_F.png";
    }
    document.getElementById("IF").src= IF;

}

