<script>

    (function(){ try{
        
        // Ko cho chuột phải
        document.oncontextmenu = document.body.oncontextmenu = function() {return false;};	
        // Không cho bôi đen
        var css = "body {-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}";
        var style = document.createElement('style');
        style.innerHTML = css;
        var head = document.head || document.getElementsByTagName('head')[0];
        head.appendChild( style );
        
        // Không cho copy
        document.oncopy = function() {return false;};
        
        // Không cho nhấn Ctrl + S
        document.onkeydown = function(e){
        if( e.keyCode == 83 || e.keyCode == 115 )
        {
            if( e.ctrlKey )
            {
                return false;
            }
        }
    }; 
    
    }catch(e){}})();
    
    
</script> 