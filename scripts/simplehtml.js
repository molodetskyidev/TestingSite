
function setValue(id,newValue) {
var s= document.getElementById(id);
s.value=newValue;
}
function getName(id){
var name= document.getElementById(id).value;
console.log("name="+name);
return name;
}
function openWindow(){
var params = 'scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no, width=900,height=600,left=100,top=100';
window.open("https://www.w3schools.com", "_blank", params); 
}
function openTab(){
window.open("https://www.w3schools.com", "_blank");
}
function showAlert() {
name=getName('name');
window.alert('Hello, '+name);
}
function showMsg() {
window.alert('Frame message');
}
function showConfirm(){
name=getName('name');
window.confirm('Hello, '+name);
}
function setDates() {
//there can be a problem in case if month is changed between today and tomorrow
//TODO fix it
var currentDate = new Date();
var day = currentDate.getDate();
var month = currentDate.getMonth() + 1;
var year = currentDate.getFullYear();
var today=year + "-" + month + "-" + day;
var day2=day+1;
var nextday=year + "-" + month + "-" + day2;
var i;
for (i = 0; i < 4; i++) { 
    setValue('from'+i,today);
    setValue('to'+i,nextday);
}
}

function calcPrice(index) {
var fromDate=new Date(document.getElementById('from'+index).value);
var toDate=new Date(document.getElementById('to'+index).value);
var number=document.getElementById('number'+index).value;
var price=10;
switch(index) {
    case 0:
        price=10;
        break;
    case 1:
        price=40;
        break;
    case 2:
        price=300;
        break;
    case 3:
        price=50;
        break;
    default:
        price=10;
         }
var numberDays=toDate.getDate()-fromDate.getDate(); 
//there is a problem while from and to dates are in different months
//TODO fix it
document.getElementById('price'+index).innerHTML=number*numberDays*price+'$';
}