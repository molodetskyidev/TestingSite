
function setValue(id,newValue) {
var s= document.getElementById(id);
s.value=newValue;
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
    console.log(today + ' '+i);
    setValue('from'+i,today);
    setValue('to'+i,nextday);
}
}
function sayBooked() {
window.alert('Booked!');
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