<!DOCTYPE html> 
<html> 
  
<head> 
    <title> 
        How to detect browser or tab closing 
    </title> 
</head> 
  
<body> 
    <h1 style="color: green"> 
        GeeksforGeeks 
    </h1> 
      
    <b>Detect browser or tab closing</b> 
      
    <p> 
        The beforeunload function is triggered 
        just before the browser or tab is to be 
        closed or the page is to be reloaded. 
        Modern browsers require some interaction 
        with the page, otherwise the dialog box 
        is not shown. 
    </p> 
      
    <form> 
        <textarea placeholder = "Trigger an  
         interaction by writing something here"> 
        </textarea> 
    </form> 
      
    <script type="text/javascript"> 
        window.addEventListener('beforeunload', function (e) { 
            e.preventDefault(); 
            e.returnValue = ''; 
        }); 
    </script> 
</body> 
  
</html>   