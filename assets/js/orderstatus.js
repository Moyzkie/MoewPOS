const all = document.querySelector('.all');
const pending = document.querySelector('.pending');
const toPack = document.querySelector('.toPack');
const completed = document.querySelector('.completed');
const cancelled = document.querySelector('.cancelled');
const toReceive = document.querySelector('.toReceive');
const noItem = document.querySelector('.noItem');
const itemStatus = document.querySelector('.itemStatus');


all.addEventListener('click',()=> {
   all.style.borderColor="#ee4d2d";
   pending.style.borderColor="rgb(232 232 232)";
   toPack.style.borderColor="rgb(232 232 232)";
   toReceive.style.borderColor="rgb(232 232 232)";
   completed.style.borderColor="rgb(232 232 232)";
   cancelled.style.borderColor="rgb(232 232 232)";
   noItem.style.display="none";
   itemStatus.style.display ="block";
})

pending.addEventListener('click',()=> {
    all.style.borderColor="rgb(232 232 232)";
    pending.style.borderColor="#ee4d2d";
    toPack.style.borderColor="rgb(232 232 232)";
    toReceive.style.borderColor="rgb(232 232 232)";
    completed.style.borderColor="rgb(232 232 232)";
    cancelled.style.borderColor="rgb(232 232 232)";
    noItem.style.display="block";
    itemStatus.style.display ="none";
   
 })

toPack.addEventListener('click',()=> {
    all.style.borderColor="rgb(232 232 232)";
    pending.style.borderColor="rgb(232 232 232)";
    toPack.style.borderColor="#ee4d2d";
    toReceive.style.borderColor="rgb(232 232 232)";
    completed.style.borderColor="rgb(232 232 232)";
    cancelled.style.borderColor="rgb(232 232 232)";
   
})
toReceive.addEventListener('click',()=> {
    all.style.borderColor="rgb(232 232 232)";
    pending.style.borderColor="rgb(232 232 232)";
    toPack.style.borderColor="rgb(232 232 232)";
    toReceive.style.borderColor="#ee4d2d";
    completed.style.borderColor="rgb(232 232 232)";
    cancelled.style.borderColor="rgb(232 232 232)";
   
})


completed.addEventListener('click',()=> {
    all.style.borderColor="rgb(232 232 232)";
    pending.style.borderColor="rgb(232 232 232)";
    toPack.style.borderColor="rgb(232 232 232)";
    toReceive.style.borderColor="rgb(232 232 232)";
    completed.style.borderColor="#ee4d2d";
    cancelled.style.borderColor="rgb(232 232 232)";
   
})

cancelled.addEventListener('click',()=> {
    all.style.borderColor="rgb(232 232 232)";
    pending.style.borderColor="rgb(232 232 232)";
    toPack.style.borderColor="rgb(232 232 232)";
    toReceive.style.borderColor="rgb(232 232 232)";
    completed.style.borderColor="rgb(232 232 232)";
    cancelled.style.borderColor="#ee4d2d";
   
})

 