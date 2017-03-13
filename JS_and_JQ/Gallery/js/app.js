
document.addEventListener('DOMContentLoaded',function(){
    var li = Array.from(document.getElementsByTagName('li'));
    var body = document.getElementsByTagName('body');
    
    for(var i=0; i<li.length; i++){
        li[i].addEventListener('click', function(event) {
            event.preventDefault();
            var imageSrc = this.querySelector('img').src;
            var newDiv = document.createElement('div');
            newDiv.className="fullScreen";
            newDiv.innerHTML='<img src="'+imageSrc+'"><button class="close">Close</button>';
            document.body.appendChild(newDiv);
            var button = document.querySelector('.fullScreen button');
            
            button.addEventListener('click', function(event) {
                newDiv.className+='close';
                var lastDiv = document.getElementsByClassName('fullScreenclose');
                lastDiv[0].parentNode.removeChild(lastDiv[0]);
            });

        });

    }
});
