
document.addEventListener('DOMContentLoaded',function(){
   
    var next = document.getElementById('nextPicture');
    var prev = document.getElementById('prevPicture');
    var li = Array.from(document.getElementsByTagName('li'));
    var image = 0;
    li[image].className+='visible';
    
    next.addEventListener('click', function(event) {
        li[image].className-='visible';
        image+=1;
        if(image >= li.length){
            image=li.length-1;
        }
        li[image].className='visible';
    });
    
    prev.addEventListener('click', function(event) {
        li[image].className-='visible';
        image-=1;
        if(image<0) {
            image=0;
        }
        li[image].className='visible';
    });
    //problemem jest znikanie wszystkich obrazków po przekroczeniu górnego lub dolnego elementu tablicy
});