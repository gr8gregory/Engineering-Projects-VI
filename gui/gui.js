/*function myFunction_CD() {

    var CD;
    document.getElementById("CD").src == 'http://142.156.193.130:50000/gui/img/CallButtonDownLit.png';
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
        document.getElementById("up").play();
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
        document.getElementById("down").play();
    }
    localStorage.setItem("CUD", CDD);
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
        document.getElementById("up").play();
    }
    localStorage.setItem("CU", CU);
}*/




function myFunction_CD() {

    var CD = document.getElementById("CD");
    
    if(CD.style.display === "none"){
        CD.style.display="block";
	    CD=document.getElementById("CD");
        console.log("True");
    }
    else{
        CD.style.display="none";
        CD="";
        console.log("False");
	}
    localStorage.setItem("CD", CD);
   
}
function myFunction_CUD_U() {
    var CUD = document.getElementById("CUD_U");
    
    if(CUD.style.display === "none"){
        CUD.style.display="block";
	    CUD=document.getElementById("CUD_U");
        console.log("True");
    }
    else{
        CUD.style.display="none";
        CUD="";
        console.log("False");
	}
    localStorage.setItem("CUD_U", CUD);
}
function myFunction_CUD_D() {

    var CDD = document.getElementById("CUD_D");
    
    if(CDD.style.display === "none"){
        CDD.style.display="block";
	    CDD=document.getElementById("CUD_D");
        console.log("True");
    }
    else{
        CDD.style.display="none";
        CDD="";
        console.log("False");
	}
    localStorage.setItem("CUD_D", CDD);
}
function myFunction_CU() {
    var CU = document.getElementById("CUP");
    
    if(CU.style.display === "none"){
        CU.style.display="block";
	    CU=document.getElementById("CUP");
        console.log("True");
    }
    else{
        CU.style.display="none";
        CU="";
        console.log("False");
	}
    localStorage.setItem("CUP", CU);
}





function myFunction_I3() {
	var I3 = document.getElementById("three");

    if(I3.style.display === "none"){
        I3.style.display="block";
	    I3=document.getElementById("three");
    }
    else{
        I3.style.display="none";
        I3="";
	}
    localStorage.setItem("I3", I3);
}
function myFunction_I2() {
    var I2 = document.getElementById("two");
    
    if(I2.style.display === "none"){
        I2.style.display="block";
	    I2=document.getElementById("two");
    }
    else{
        I2.style.display="none";
        I2="";
	}
    localStorage.setItem("I2", I2);
}
function myFunction_I1() {
    var I1 = document.getElementById("one");
    
    if(I1.style.display === "none"){
        I1.style.display="block";
	    I1=document.getElementById("one");
    }
    else{
        I1.style.display="none";
        I1="";
	}
    localStorage.setItem("I1", I1);
}
function myFunction_IC() {
    var IC = document.getElementById("C");
    
    if(IC.style.display === "none"){
        IC.style.display="block";
	    IC=document.getElementById("C");
    }
    else{
        IC.style.display="none";
        IC="";
	}
    localStorage.setItem("IC", IC);
}

function myFunction_IO() {
    var IO = document.getElementById("O");
    
    if(IO.style.display === "none"){
        IO.style.display="block";
	    IO=document.getElementById("O");
    }
    else{
        IO.style.display="none";
        IO="";
	}
    localStorage.setItem("IO", IO);
}
function myFunction_IF() {
    var IF = document.getElementById("F");
    console.log("HelloF");
    if(IF.style.display === "none"){
        IF.style.display="block";
	    IF=document.getElementById("F");
    }
    else{
        IF.style.display="none";
        IF="";
	}
    localStorage.setItem("IF", IF);
}
function myFunction_IB() {
    var IB = document.getElementById("A");
    console.log("HelloB");
    if(IB.style.display === "none"){
        IB.style.display="block";
	    IB=document.getElementById("A");
    }
    else{
        IB.style.display="none";
        IB="";
	}
    localStorage.setItem("IB", IB);
}

function imginit(){

    if ( localStorage.getItem('CD')) {
        document.getElementById("CD").style.display="block";
        console.log("block");
    }
    else {
        document.getElementById("CD").style.display="none";
        console.log("none");
    }

    if ( localStorage.getItem('CUD_D')) {
        document.getElementById("CUD_D").style.display="block";
        console.log("block");
    }
    else {
        document.getElementById("CUD_D").style.display="none";
        console.log("none");
    }

    if ( localStorage.getItem('CUD_U')) {
        document.getElementById("CUD_U").style.display="block";
        console.log("block");
    }
    else {
        document.getElementById("CUD_U").style.display="none";
        console.log("none");
    }

    if ( localStorage.getItem('CUP')) {
        document.getElementById("CUP").style.display="block";
        console.log("block");
    }
    else {
        document.getElementById("CUP").style.display="none";
        console.log("none");
    }


    if ( localStorage.getItem('I3')) {
        document.getElementById("three").style.display="block";
    }
    else {
        document.getElementById("three").style.display="none";
    }

    if ( localStorage.getItem('I2')) {
        document.getElementById("two").style.display="block";
    }
    else {
        document.getElementById("two").style.display="none";
    }

    if ( localStorage.getItem('I1')) {
        document.getElementById("one").style.display="block";
    }
    else {
        document.getElementById("one").style.display="none";
    }

    if ( localStorage.getItem('IO')) {
        document.getElementById("O").style.display="block";
    }
    else {
        document.getElementById("O").style.display="none";
    }

    if ( localStorage.getItem('IC')) {
        document.getElementById("C").style.display="block";
    }
    else {
        document.getElementById("C").style.display="none";
    }

    if ( localStorage.getItem('IF')) {
        document.getElementById("F").style.display="block";
    }
    else {
        document.getElementById("F").style.display="none";
    }

    if ( localStorage.getItem('IB')) {
        document.getElementById("A").style.display="block";
    }
    else {
        document.getElementById("A").style.display="none";
    }

}

/************** Indicator Reset functions ****************/


function CD_reset() {

    var CD = document.getElementById("CD");
    CD.style.display="none";
    CD="";
    localStorage.setItem("CD", CD);
}

function CU_reset() {
    var CUP = document.getElementById("CUP");
    CUP.style.display="none";
    CUP="";
    localStorage.setItem("CUP", CUP);
}

function CUD_U_reset() {
    var CUD = document.getElementById("CUD_U");
    CUD.style.display="none";
    CUD="";
    localStorage.setItem("CUD_U", CUD);
}

function CUD_D_reset() {
    var CDD = document.getElementById("CUD_D");
    CDD.style.display="none";
    CDD="";
    localStorage.setItem("CUD_D", CDD);
}



function I3_reset() {
    var I3 = document.getElementById("three");
    I3.style.display="none";
    I3="";
    localStorage.setItem("I3", I3);
}
function I2_reset() {
    var I2 = document.getElementById("two");
    I2.style.display="none";
    I2="";
    localStorage.setItem("I2", I2);
}
function I1_reset() {
    var I1 = document.getElementById("one");
    I1.style.display="none";
    I1="";
    localStorage.setItem("I1", I1);
}