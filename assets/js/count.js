const counters = document.querySelectorAll('.counter');
const speed = 97;

counters.forEach((counter)=>{
    function upDate(){
        const target = +(counter.getAttribute('data-target'));
        const count= +counter.innerText;

        const inc = target / speed ;

        if(count < target){
            counter.innerText = count + inc;
            setTimeout(upDate,1)

        }

        else{
            count.innerText = target;
        }



    }
    upDate()
})