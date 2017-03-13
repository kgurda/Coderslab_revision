

document.addEventListener('DOMContentLoaded',function(){
    
    var elementsLi = document.querySelectorAll('.nav>ul>li');
    
    for(var i = 0; i<elementsLi.length; i++) {
        
        elementsLi[i].addEventListener('mouseover', function(){ 
            var thisElementLi = this.querySelectorAll('li');
            if(thisElementLi.length>0) {
                thisElementLi[0].parentElement.style.display='block';
            }
        });
        
        elementsLi[i].addEventListener('mouseout', function(){
            var thisElementLi = this.querySelectorAll('li');
            if(thisElementLi.length>0) {
                thisElementLi[0].parentElement.style.display='none';
            }
        });
        
    }
});