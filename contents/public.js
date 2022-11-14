

document.addEventListener('DOMContentLoaded',function(){
    
    var btnCollapse = document.getElementById('collapse-button');
    btnCollapse.addEventListener('click',function(e){
        e.preventDefault();
        
        var sidebar = document.getElementById('sidebar-menu');
        sidebar.classList.toggle('collapsed');
        
        return true;
    });
    
});