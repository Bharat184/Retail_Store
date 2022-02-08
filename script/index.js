let visible=document.getElementById("visible");
setInterval(()=>{
    visible.style.display="none";
},10000);
let sum=0
let iprice=document.getElementsByClassName("iprice");
let iquantity=document.getElementsByClassName("iquantity");
let itotal=document.getElementsByClassName("itotal");
for(let i=0;i<iprice.length;i++)
{
   sum+=iprice[i].value*iquantity[i].value; 
   itotal[i].innerText=iprice[i].value*iquantity[i].value; 
}
let total=document.getElementById("total");
let totall=document.getElementById("totall");
if(total && totall)
{
    total.innerText=sum;
    totall.value=sum;
}